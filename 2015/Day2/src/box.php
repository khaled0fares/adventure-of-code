<?php

class Box{
	private $length;
	private $width;
	private $height;
	private $area;
	private $littleExtraPaper;
	private $smallestPerimeter;
	private $neededRibbonOfBow;

	public function __construct($dimensions)
	{
		$this->length = explode("x", $dimensions)[0];
		$this->width = explode("x", $dimensions)[1];
		$this->height = explode("x", $dimensions)[2];
	}

	public function getLength()
	{
		return $this->length;	
	}

	public function getWidth()
	{
		return $this->width;	
	}

	public function getHeight()
	{
		return $this->height;	
	}

	public function getArea()
	{
		$this->area =  2 * ( $this->getWidth() * $this->getLength()
			+ $this->getHeight() * $this->getWidth()
			+ $this->getLength() * $this->getHeight()
		);

		return $this->area;
	}

	public function getSmallestArea()
	{
		$firstSurface =  $this->getAreaOfSurface($this->getWidth(), $this->getLength());
		$secondSurface =  $this->getAreaOfSurface($this->getHeight(), $this->getWidth());
		$thirdSurface =  $this->getAreaOfSurface($this->getLength(), $this->getHeight());

		$this->littleExtraPaper  = min([$firstSurface, $secondSurface, $thirdSurface]);

		return $this->littleExtraPaper;
	}
	public function getSmallestPerimeter()
	{
		$perimeterOne = $this->getperimeterOfSurface($this->getWidth(), $this->getLength());
		$perimeterTwo = $this->getperimeterOfSurface($this->getHeight(), $this->getWidth());
		$perimeterThree = $this->getperimeterOfSurface($this->getLength(), $this->getHeight());

		$this->smallestPerimeter  = min([$perimeterOne, $perimeterTwo, $perimeterThree]);
		return $this->smallestPerimeter;
	}
	
	protected function getAreaOfSurface($dimension1, $dimension2)
	{
		return $dimension1 * $dimension2;
	}

	protected function getPerimeterOfSurface($dimension1, $dimension2)
	{
		return 2 * ($dimension1 + $dimension2);
	}	
	public function getAreaOfPaperWrapper()
	{
		return $this->getArea() + $this->getSmallestArea(); 
	}

	public function getAreaOfBow()
	{
		$this->areaOfBow =  $this->getLength() * $this->getWidth() * $this->getHeight();
		return $this->areaOfBow;
	}

	public function getNeededRibbonOfBow()
	{
		$this->neededRibbonOfBow = $this->getsmallestPerimeter() + $this->getAreaOfBow();
		return $this->neededRibbonOfBow;
	}
}
