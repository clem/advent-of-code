#!/usr/bin/env php
<?php

require __DIR__.'/../vendor/autoload.php';

use App\Command\DayProcessorCommand;
use Symfony\Component\Console\Application;

$application = new Application('advent-of-code', '1.0.0');
$command = new DayProcessorCommand();

$application->add($command);

$application->setDefaultCommand((string) $command->getName(), true);
$application->run();
