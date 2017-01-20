<?php

require __DIR__."/src/visitor.php";

$input  =  file_get_contents(__DIR__."/input.txt");

$visitor  =  new Visitor($input);
echo $visitor->getNumberOfHomes();


