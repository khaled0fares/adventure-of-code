<?php

require_once __DIR__.'/../src/elves.php';

class ElvesTest extends PHPUnit_Framework_TestCase {

	/** @test */
	public function it_should_return_list_of_dimensions()
	{
		$input = "1x2x3\n4x5x6\n7x8x9";
		
		$elves  =  new Elves($input);
		
		$output =  ["1x2x3", "4x5x6","7x8x9"];

		$this->assertEquals($output,$elves->listOfDimensions());
	}

	/** @test */
	public function it_should_return_needed_area_of_paper()
	{
		$input = "1x2x3\n4x5x6\n7x8x9";
		
		$elves  =  new Elves($input);
	
		$output  = 630;
	
		$this->assertEquals($output, $elves->neededAreaOfPaper());
	}
	
	/** @test */
	public function it_should_return_lowest_length_of_ribbon()
	{
		
		$input = "1x2x3\n4x5x6\n7x8x9";
		
		$elves  =  new Elves($input);
		
		$output  = 684;
		
		$this->assertEquals($output, $elves->neededRibbonOfAllBows());
	}
}  
