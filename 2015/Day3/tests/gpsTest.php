<?php

require __DIR__."/../src/gps.php";

class gpsTest extends PHPUnit_Framework_TestCase 
{
	/** @test */
	public function it_should_be_located_at_start_position()
	{
		$gps = new GPS();
		$output = ["right" => 0, "left" => 0, "north"=>0, "south"=>0];

		$this->assertEquals($output,$gps->getCurrentLocation());
	}

	/** @test */
	public function it_should_have_map()
	{
		$gps = new GPS(">");

		$this->assertEquals(">",$gps->getMap());
	}

	/** @test */
	public function it_should_the_map()
	{
		$gps = new GPS(">");

		$this->assertEquals(">",$gps->getMap());
	}

	/** @test */
	public function location_should_be_array_with_element_right_equals_one()
	{
		$gps = new GPS(">");
		$output = ["right" => 1, "left" => 0, "north"=>0, "south"=>0];
		$this->assertEquals( $output , $gps->getCurrentLocation());
	}
	/** @test */
	public function location_should_be_array_with_element_left_equals_one()
	{
		$gps = new GPS("<");
		$output = ["right" => 0, "left" => 1, "north"=>0, "south"=>0];
		$this->assertEquals( $output , $gps->getCurrentLocation());
	}

	/** @test */
	public function location_should_be_array_with_element_left_equals_2()
	{
		$gps = new GPS("<<");
		$output = ["right" => 0, "left" => 2, "north"=>0, "south"=>0];
		$this->assertEquals( $output , $gps->getCurrentLocation());
	}

	/** @test */
	public function location_should_be_array_with_elements__equal_zero()
	{
		$gps = new GPS("vv^^");
		$output = ["right" => 0, "left" => 0, "north"=>0, "south"=>0];
		$this->assertEquals( $output , $gps->getCurrentLocation());
	}

	/** @test */
	public function location_should_be_array_with_direction_r0l1n0s0()
	{
		$gps = new GPS("<^v><");
		$output = ["right" => 0, "left" => 1, "north"=>0, "south"=>0];
		$this->assertEquals( $output , $gps->getCurrentLocation());
	}

	/** @test */
	public function location_should_be_array_with_direction_r0l0n0s0()
	{
		$gps = new GPS("^>v<");
		$output = ["right" => 0, "left" => 0, "north"=>0, "south"=>0];
		$this->assertEquals( $output , $gps->getCurrentLocation());
	}
}
