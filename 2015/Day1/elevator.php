<?php 

class Elevator{
	private $parser;
	private $currentFloor = 0;

	public function __construct($parser)
	{
		$this->parser  = $parser;
		$this->calcCurrentFloor();
	}

	public function getCurrentFloor()
	{
		return "You are now in the floor number ".$this->currentFloor;
	}

	private function calcCurrentFloor()
	{
		foreach($this->parser->getSymbolsList() as $floor){
			$this->moveTo($floor);
		}
	}

	private function moveTo($floor)
	{
		if($this->parser->openPar($floor) ){
			$this->moveUp();
		}else{
			//if($this->notInTheGround()) 
			$this->moveDown();
		}
	}

	private function moveUp()
	{
		$this->currentFloor += 1;
	}

	private function moveDown()
	{
		$this->currentFloor -= 1;
	}

	private function notInTheGround()
	{
		return $this->currentFloor != 0;
	}
}

