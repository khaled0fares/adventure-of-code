<?php
require_once __DIR__."/gps.php";
class visitor
{
	protected $input;
	protected $locations = [];
	protected $homes =  0;

	public function __construct($dirtyInput)
	{
		$this->sanatize($dirtyInput);
	}
	public function sanatize($dirtyInput)
	{
		$this->input  = str_replace(" ", "", $dirtyInput);
	}

	public function getInput()
	{
		return $this->input; 		
	}

	public function atState($state)
	{
		return 	substr($this->input , 0, $state);	
	}

	public function getLocations()
	{
		for($i = 0; $i <=  strlen($this->input); $i++){
			$location = $this->addLocation($i);

			if( !$this->exist($location))  $this->locations[] =  $location;
		}
		return $this->locations;	
	}

	protected function addLocation($index)
	{
		$movements  = $this->atState($index);
		$gps =  new GPS($movements); 
		return $gps->getCurrentLocation();	
	}

	protected function exist($location)
	{
		return in_array($location, $this->locations); 
	}

	public function getNumberOfHomes()
	{
		$this->numberOfHomes =  sizeof($this->getLocations());
		return $this->numberOfHomes;
	}
}
