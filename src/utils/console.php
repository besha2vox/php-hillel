<?php

use ConsoleMessenger\ConsoleMessenger;
use Symfony\Component\Console\Output\ConsoleOutput;

$output = new ConsoleOutput();
$console = new ConsoleMessenger($output);