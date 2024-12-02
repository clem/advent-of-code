<?php

declare(strict_types=1);

namespace App\Command;

use App\Exception\DayNotFoundException;
use App\UseCase\DayProcessorInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:day:process',
    description: 'Process a day.',
    aliases: ['app:process-day'],
    hidden: false
)]
final class DayProcessorCommand extends Command
{
    private SymfonyStyle $io;

    protected function configure(): void
    {
        $this->addArgument(
            'day',
            InputArgument::REQUIRED,
            'Day to process.'
        )
             ->addArgument(
                 'year',
                 InputArgument::OPTIONAL,
                 'Day related year.',
                 date('Y')
             );
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->io = new SymfonyStyle($input, $output);
        $day = $this->getIntArgument($input, 'day');
        $year = $this->getIntArgument($input, 'year');
        if ($year === 0) {
            $year = (int) date('Y');
        }

        try {
            $this->processDay($day, $year);
        } catch (\Throwable $exception) {
            $this->io->error($exception->getMessage());
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }

    private function getIntArgument(InputInterface $input, string $argumentName): int
    {
        $argument = $input->getArgument($argumentName);
        if (!is_string($argument) || !ctype_digit($argument)) {
            return 0;
        }

        return (int) $argument;
    }

    private function processDay(int $day, int $year): void
    {
        try {
            $processor = $this->getProcessor($day, $year);
        } catch (\RuntimeException) {
            throw new DayNotFoundException($day);
        }

        $this->io->title(sprintf('Day %02d/%d process output', $day, $year));
        $input = $this->getInputFileContents($day, $year);

        $startTime = microtime(true);

        $this->processDayPart($processor, $input, 'one');
        $this->io->newLine();
        $this->processDayPart($processor, $input, 'two');

        $this->io->info(sprintf(
            'Day %02d processed in %.2f seconds',
            $day,
            microtime(true) - $startTime
        ));
    }

    private function getProcessor(int $day, int $year): DayProcessorInterface
    {
        /** @var class-string $processorClass */
        $processorClass = sprintf('App\UseCase\Year%2$d\Day%1$02d\Day%1$02dProcessor', $day, $year);
        if (!class_exists($processorClass)) {
            throw new \RuntimeException(sprintf(
                'Processor class %s does not exist!',
                $processorClass
            ));
        }

        $processor = new $processorClass();
        if (!$processor instanceof DayProcessorInterface) {
            throw new \RuntimeException(sprintf(
                'Processor class %s does not implement DayProcessorInterface!',
                $processorClass
            ));
        }

        return $processor;
    }

    private function processDayPart(DayProcessorInterface $processor, string $input, string $part): void
    {
        if (!in_array($part, ['one', 'two'])) {
            throw new \InvalidArgumentException(sprintf('Invalid part %s!', $part));
        }

        $startTime = microtime(true);
        $partResult = $processor->{'processPart'.ucfirst($part)}($input);
        $this->io->writeln('Part '.$part.': '.$partResult);
        $this->io->writeln(
            sprintf(
                'Processed in %.2f seconds',
                microtime(true) - $startTime
            )
        );
    }

    private function getInputFileContents(int $day, int $year): string
    {
        $inputFolder = realpath(sprintf('%s/../../input', __DIR__));
        $inputFile = sprintf('%s/%s/day%02d.txt', $inputFolder, $year, $day);
        if (!file_exists($inputFile)) {
            throw new \RuntimeException(sprintf('Input file %s does not exist!', $inputFile));
        }

        $content = file_get_contents($inputFile);
        if ($content === false) {
            throw new \RuntimeException(sprintf('Could not read input file %s!', $inputFile));
        }

        return trim($content);
    }
}
