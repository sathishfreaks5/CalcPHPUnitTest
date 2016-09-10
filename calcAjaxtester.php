<?php
 /*
Website  : rmgmortgagegroup.com
Company  : Tecfreaks
Developer: Sathishkumar.A
Emp.Code : TF003
Created  : 16-Aug-2016
 */
 
 
class Calculator {
    
    private $amountBorrowed = 0; 
    private $interestRate = 0; 
    public $years = 0;
    public $taxes = 300;
    public $insurance = 67;
    public $PMIValue = 0.0017;
    public $PMI = 0;

    public function __construct() {} 

    public function calculateInterestOnlyPayment()
    {
        $payment = ( $this->amountBorrowed * $this->interestRate ) / 12;
        return round($payment,2);
    }

     public function calculateRepayment()
    {
        $payment = ( $this->amountBorrowed * $this->interestRate ) / ( 1 - pow( ( 1 + $this->interestRate ), -$this->years ) ) ; 
       
        $payment = $payment / 12;
         $payment += $this->Others();

        return round($payment,2);
    }

     public function calculatePINT()
    {
       $payment = ( $this->amountBorrowed * $this->interestRate ) / ( 1 - pow( ( 1 + $this->interestRate ), -$this->years ) ) ;  
        $payment = $payment / 12;   
        return round($payment,2);
    } 
    public function setAmountBorrowed( $amount )
    {
        $this->amountBorrowed = $amount;
    } 
    public function setInterestRate( $rate )
    {
        $this->interestRate = ( $rate / 100 );
    } 
    public function setYears( $years )
    {
        $this->years = $years;
    } 
    private function numberOfPayments()
    {
        return $this->years / 12;
    } 
    public function calculateRemainingAmount( $monthsLeft )
    {
        return $this->calculateRepayment() * $monthsLeft;
    } 
    private function Others()
    {
        $otherPayment = $this->insurance + $this->taxes + $this->PMI;
        return $otherPayment;
    }

    public function setPMI($pmi,$inputPriciple,$inputDownPaymentPrecent)
    {
    	if($pmi >= 20) {
    		 $this->PMI = 0; 
    	}
    	else{
    		$downPayment = ($this->CalcDownPayment($inputPriciple,$inputDownPaymentPrecent) * 0.0017) / 12; 
    		$this->PMI = number_format($downPayment,2);
    	}        
        
    }      
    public function CalcDownPayment($inputPriciple,$inputDownPaymentPrecent)
    {
       return $inputPriciple - (number_format( (($inputPriciple * $inputDownPaymentPrecent) / 100), 2));
        
    }

    public function CalcInterestRate($inputYear)
    {
         	if($inputYear == 30) $inputIntRate = 1.53; 
		else if($inputYear == 15) $inputIntRate = 0.01;
		else $inputIntRate = 0.1;

		return $inputIntRate; 
    }

    public function setTaxCalc( $inputPriciple){
    		return $this->taxes = ($inputPriciple / 1000);

    }
}
 $calculator = new Calculator(); 

?> 