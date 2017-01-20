<?php

require __DIR__."/../src/visitor.php";

class VisitorTest extends PHPUnit_Framework_TestCase
{


	/** @test */
	public function it_should_return_remove_white_spaces()
	{
		$input  =  ">> > >> >";

		$output  =  ">>>>>>";

		$visitor =  new Visitor($input);

		$this->assertEquals($output, $visitor->getInput());
	}

	public function it_cut_from_0_index_to_given_index()
	{
		$input  =  ">> < >> >";


		$visitor =  new Visitor($input);

		$this->assertEquals(">", $visitor->atState(1));
		$this->assertEquals(">><>>", $visitor->atState(5));

	}
	/** @test */
	public function it_returns_array_of_locations()
	{
		$input  =  ">><";

		$visitor =  new Visitor($input);

		$this->assertEquals([
			["right"=>0,"left" =>0, "north"=>0, "south"=>0],
			["right"=>1,"left" =>0, "north"=>0, "south"=>0],
			["right"=>2,"left" =>0, "north"=>0, "south"=>0],
		], $visitor->getLocations());
	}

	/** @test */
	public function it_returns_3_as_numbers_of_home()
	{
		$input  =  ">><";

		$visitor =  new Visitor($input);

		$this->assertEquals(3, $visitor->getNumberOfHomes());
	}

}
