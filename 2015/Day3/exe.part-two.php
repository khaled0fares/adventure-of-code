<?php

require __DIR__."/src/visitorWithRobot.php";

$input  =  file_get_contents(__DIR__."/input.txt");

$visitorWithRobot = new VisitorWithRobot($input);
echo $visitorWithRobot->getNumberOfHomes();


