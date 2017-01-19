<?php
require __DIR__."/box.php";

class Elves {

	private $listOfDimensions;
	private $neededAreaOfPaper  = 0;
	private $neededRibbonOfAllBows  = 0;

	public function __construct($dimensions)
	{
		$arr = explode("\n",$dimensions);
		$this->listOfDimensions =  $this->trimLastLine($arr);
	}

	private function trimLastLine($arr)
	{
		if($arr[count($arr) -1] == "") array_pop($arr);
		return $arr;
	}

	public function listOfDimensions()
	{
		return $this->listOfDimensions;		
	}

	public function neededAreaOfPaper()
	{
		foreach( $this->listOfDimensions as $dimension) {
			$box =  new Box($dimension);
			$this->neededAreaOfPaper +=  $box->getAreaOfPaperWrapper();
		}	
		return $this->neededAreaOfPaper;
	}

	public function neededRibbonOfAllBows()
	{
		foreach( $this->listOfDimensions as $dimension) {
			$box =  new Box($dimension);
			$this->neededRibbonOfAllBows +=  $box->getNeededRibbonOfBow();
		}	
		return $this->neededRibbonOfAllBows;
	}
}

