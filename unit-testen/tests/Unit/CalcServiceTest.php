<?php

namespace Tests\Unit;

use App\Services\CalcService;
use PHPUnit\Framework\TestCase;

class CalcServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    // add
    public function test_add_two_number_want_correct()
    {
        $sut = new CalcService;
        $result = $sut->add(5,5);
        $this->assertTrue($result == 10);
    }

    public function test_add_two_number_want_incorrect()
    {
        $sut = new CalcService;
        $result = $sut->add(5,6);
        $this->assertFalse($result == 10);
    }

    // substract
    public function test_substract_two_number_want_correct(){
        $sut = new CalcService;
        $result = $sut->substract(5,1);
        $this->assertTrue($result == 4);
    }

    public function test_substract_two_number_want_incorrect(){
        $sut = new CalcService;
        $result = $sut->substract(5,2);
        $this->assertFalse($result == 4);
    }

    // multiplication
    public function test_multiply_two_number_want_correct(){
        $sut = new CalcService;
        $result = $sut->multiplication(4,4);
        $this->assertTrue($result == 16);
    }

    public function test_multiply_two_number_want_incorrect(){
        $sut = new CalcService;
        $result = $sut->multiplication(4,4);
        $this->assertFalse($result == 12);
    }

    // division
    public function test_division_two_number_want_correct(){
        $sut = new CalcService;
        $result = $sut->division(10, 10);
        $this->assertTrue($result == 1);
    }

    public function test_division_two_number_want_incorrect(){
        $sut = new CalcService;
        $result = $sut->division(10, 10);
        $this->assertFalse($result == 2);
    }

    // percentage
    public function test_percentage_two_number_want_correct(){
        $sut = new CalcService;
        $result = $sut->percentage(100, 25);
        $this->assertTrue($result == 25);
    }

    public function test_percentage_two_number_want_incorrect(){
        $sut = new CalcService;
        $result = $sut->percentage(100, 25);
        $this->assertFalse($result == 30);
    }

    // squareRoot
    public function test_squareRoot_two_number_want_correct(){
        $sut = new CalcService;
        $result = $sut->squareRoot(81);
        $this->assertTrue($result == 9);
    }

    public function test_squareRoot_two_number_want_incorrect(){
        $sut = new CalcService;
        $result = $sut->squareRoot(9);
        $this->assertFalse($result == 9);
    }
}