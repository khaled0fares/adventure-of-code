<?php
class Parser{
	private $symbolsList;

	public function __construct($symbols)
	{
		$this->symbolsToList($symbols);
	}

	private function symbolsToList($symbols)
	{
		$this->symbolsList =  str_split($symbols);
	}
	public function getSymbolsList()
	{
		return $this->symbolsList;
	}
	public function openPar($symbol)
	{
		return $symbol == "(";
	}
	public function closePar($symbol)
	{
		return $symbol == ")";
	}
}
