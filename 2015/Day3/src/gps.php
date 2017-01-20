<?php

class GPS
{
	private $map;
	private $currentLocation  = ["right"=>0, "left" => 0, "north"=> 0, "south"=>0];

	public function __construct($map = null)
	{
		$this->map = $map;
		$this->currentLocation =  !is_null($this->map) ? $this->parseMap() : $this->currentLocation;
	}

	public function getCurrentLocation()
	{
		return $this->currentLocation;
	}

	public function getMap()
	{
		return $this->map;
	}

	protected function parseMap()
	{
		foreach( str_split($this->map)  as $direction){
			$this->updateLocation($direction);
		} 
		$this->sanatizeHorizontalLocation();
		$this->sanatizeVerticalLocation();
		return $this->currentLocation;
	}

	protected function updateLocation($direction)
	{
		if($direction == ">") $this->currentLocation['right'] +=  1;
		if($direction == "<") $this->currentLocation['left'] +=  1;
		if($direction == "^") $this->currentLocation['north'] +=  1;
		if($direction == "v") $this->currentLocation['south'] +=  1;
	}

	protected function sanatizeHorizontalLocation()
	{
		if(	$this->currentLocation["right"] == $this->currentLocation["left"] ){ 
			$this->currentLocation["right"] = $this->currentLocation["left"] = 0;
			return;
		}

		if($this->currentLocation["right"] > $this->currentLocation["left"]){
			$this->currentLocation["right"] -= $this->currentLocation["left"];
			$this->currentLocation["left"] = 0;
			return;
		}

		if($this->currentLocation["left"] > $this->currentLocation["right"]){
			$this->currentLocation["left"] -= $this->currentLocation["right"];
			$this->currentLocation["right"] = 0;
		}
	}

	protected function sanatizeVerticalLocation()
	{
		if(	$this->currentLocation["north"] == $this->currentLocation["south"] ){ 
			$this->currentLocation["north"] = $this->currentLocation["south"] = 0;
			return;
		}

		if($this->currentLocation["north"] > $this->currentLocation["south"]){
			$this->currentLocation["north"] -= $this->currentLocation["south"];
			$this->currentLocation["south"] = 0;
			return;
		}

		if($this->currentLocation["south"] > $this->currentLocation["north"]){
			$this->currentLocation["south"] -= $this->currentLocation["north"];
			$this->currentLocation["north"] = 0;
		}
	}
}
