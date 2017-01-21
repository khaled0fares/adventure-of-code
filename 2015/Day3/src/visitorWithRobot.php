<?php

require __DIR__."/visitor.php";

class VisitorWithRobot
{
	protected $visitorMap; 
	protected $robotMap;
	protected $visitorLocations;
	protected $RobotLocations;
	protected $allLocations;
	protected $numberOfHomes;

	public function __construct($dirtyInput)
	{
		$this->sanatize($dirtyInput);
	}
	public function sanatize($dirtyInput)
	{
		$this->input  = str_replace(" ", "", $dirtyInput);
	}

	public function getVisitorMap()
	{
		for($i = 0; $i <  strlen($this->input); $i++){
			if($this->even($i)) $this->visitorMap .= $this->input[$i];
		}

		return $this->visitorMap;
	}


	public function getRobotMap()
	{
		for($i = 0; $i <  strlen($this->input); $i++){
			if($this->odd($i)) $this->robotMap .= $this->input[$i];
		}
		return $this->robotMap;
	}

	protected function odd($index)
	{
		return $index % 2 == 1;	
	}

	protected function even($index)
	{
		return $index % 2 == 0;	
	}

	public function getVisitorLocations()
	{
		$this->visitorLocations  =  (new Visitor($this->getVisitorMap()))->getLocations();	
		return $this->visitorLocations;
	}

	public function getRobotLocations()
	{
		$this->robotLocations  =  (new Visitor($this->getRobotMap()))->getLocations();	
		return $this->robotLocations;
	}

	protected function getAllLocations ()
	{
		$this->allLocations =  $this->getRobotLocations();
		foreach($this->getVisitorLocations() as $location){
			if( !in_array($location, $this->allLocations) ) $this->allLocations[] =  $location;
		}	
		return $this->allLocations;
	}

	public function getNumberOfHomes()
	{
		$this->numberOfHomes =  sizeof($this->getAllLocations());	
		return $this->numberOfHomes;
	}

}
