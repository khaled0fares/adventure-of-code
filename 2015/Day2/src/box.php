<?php

class Box{
	private $length;
	private $width;
	private $height;
	private $area;
	private $littleExtraPaper;

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
		$firstSurface =  $this->getWidth() * $this->getLength();
		$secondSurface =  $this->getHeight() * $this->getWidth();
		$thirdSurface =  $this->getLength() * $this->getHeight();

		$this->littleExtraPaper  = min([$firstSurface, $secondSurface, $thirdSurface]);

		return $this->littleExtraPaper;
	}

	public function getAreaOfPaperWrapper()
	{
		return $this->getArea() + $this->getSmallestArea(); 
	}
}
