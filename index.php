<?php
    class bankAccount{
        private $balance;
        public function getBalance(){
            return $this->balance;
        }
        public function deposit($amount){
            if($amount > 0){
                $this->balance += $amount;
            }
            return $this;
        }
        public function isGreaterThanOneYear(){
            $givenDateTime = new DateTime($this->givenDate);
            $currentDateTime = new DateTime();
            $interval =  $currentDateTime->diff($givenDateTime);
            // the logic 
            if($interval->y > 1 || ($interval->y == 1 && $interval->m > 0) || ($interval->y == 1 || $interval->m == 0 || $interval->d > 0)){
                return true;
            }else{
                return false;
            }
        }
    }
    class savingsAccount extends bankAccount{
        private $interestRate;
        public $givenDate = "2024-08-5";
        
        public function calculateAnualFee(){
            if($this->isGreaterThanOneYear()){
                if($this->getBalance() > 200){
                    echo "Taka 200 BDT adjasted for your annual fee ";
                    $newBalance =  ($this->getBalance() - 200);
                    echo "your current balance is : ".$newBalance;
                }
            }
        }
    }
?>