<?php
require('calcAjaxtester.php');  

class CalculatorTest extends PHPUnit_Framework_TestCase { 
    protected $r;  
	public function __construct() {  
		$this->r = new Calculator; 
		$this->testCalcDownPayment(); 		
	} 
    public function testCalcDownPayment() {   
    	 $this->assertEquals($this->r->CalcDownPayment(100000,20), 99980);
    	 $this->assertEquals($this->r->CalcDownPayment(100000,10), 99990);  
    	 $this->testCalcInterestRate();
    }
    public function testCalcInterestRate(){
    	 $this->assertEquals($this->r->CalcInterestRate(30), 1.53); 
    	 $this->assertEquals($this->r->CalcInterestRate(15), 0.01); 
    	 $this->assertEquals($this->r->CalcInterestRate(10), 0.1); 
    	 $this->assertEquals($this->r->CalcInterestRate(8), 0.1); 
    	 $this->testsetTaxCalc();
    }
    public function testsetTaxCalc(){
    	   $this->assertEquals($this->r->setTaxCalc(1000), 1);  
    	   $this->assertEquals($this->r->setTaxCalc(100000), 100);  
    	   $this->assertEquals($this->r->setTaxCalc(300000), 300);  
    	   $this->assertEquals($this->r->setTaxCalc(450000), 450);  
    }
    public function testsetInterestRate(){
    	$this->assertNull($this->r->setInterestRate(10)); 
    }
 }  

 $test = new CalculatorTest(); 
  ?>

 