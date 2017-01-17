<?php

require_once  __DIR__."/../src/box.php";

class BoxTest extends PHPUnit_Framework_TestCase{
	/** @test */
	public function it_should_have_length()
	{
		$box1 = new Box("20x3x11");

		$this->assertEquals(20, $box1->getLength());

		$box2 = new Box("11x3x11");

		$this->assertEquals(11, $box2->getLength());
	}

	/** @test */
	public function it_should_have_width()
	{
		$box1 = new Box("20x3x11");

		$this->assertEquals(3, $box1->getWidth());
	}

	/** @test */
	public function it_should_have_height()
	{
		$box1 = new Box("20x3x11");

		$this->assertEquals(11, $box1->getHeight());
	}

	/** @test */
	public function it_should_return_the_box_area()
	{
		$box1 = new Box("2x3x4");

		$this->assertEquals(52,$box1->getArea());
	}

	/** @test */
	public function it_should_return_smallest_surface_area()
	{
		$box1 = new Box("2x3x4");

		$this->assertEquals(6,$box1->getSmallestArea());

		$box2 = new Box("5x3x4");

		$this->assertEquals(12,$box2->getSmallestArea());
	}

	/** @test */
	public function it_should_return_area_of_paper_wrapper()
	{
		$box1 = new Box("2x3x4");

		$this->assertEquals(58,$box1->getAreaOfPaperWrapper());
	}
}
