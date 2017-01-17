<?php
require __DIR__."/parser.php";

require __DIR__."/elevator.php";

$input =  file_get_contents(__DIR__."/input.txt");

$parser =  new Parser($input);

$elevator   = new Elevator($parser);

echo $elevator->getCurrentFloor();
