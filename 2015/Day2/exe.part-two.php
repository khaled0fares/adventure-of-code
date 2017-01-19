<?php

require __DIR__."/src/elves.php";

$input  = file_get_contents(__DIR__.'/input.txt');

$elves =  new Elves($input);

echo $elves->neededRibbonOfAllBows();
