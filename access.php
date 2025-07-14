<?php
class bankAccount {
    protected $balance = 0;
    private $pin;
    public $accountHolder;
    public $givenDate;
    protected $isAuthenticated = false;

    public function setPin($pin) {
        $this->pin = $pin;
        $this->isAuthenticated = true;
    }

    public function deposit($amount) {
        if ($this->isAuthenticated && $amount > 0) {
            $this->balance += $amount;
        }
        return $this;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function isGreaterThanOneYear() {
        $givenDateTime = new DateTime($this->givenDate);
        $currentDateTime = new DateTime();
        $interval = $currentDateTime->diff($givenDateTime);

        return ($interval->y > 1 || ($interval->y == 1 && ($interval->m > 0 || $interval->d > 0)));
    }
}

class savingsAccount extends bankAccount {
    private $interestRate;
    public $givenDate = "2025-08-10"; // 1 year+ old
    private $interestAdded = 0;
    private $annualFeeApplied = false;

    public function setInterestRate($rate) {
        $this->interestRate = $rate;
    }

    public function addInterest() {
        if ($this->isAuthenticated) {
            $this->interestAdded = $this->balance * $this->interestRate;
            $this->deposit($this->interestAdded);
        }
    }

    public function calculateAnnualFee() {
        if ($this->isAuthenticated && $this->isGreaterThanOneYear()) {
            if ($this->balance > 200) {
                $this->balance -= 200;
                $this->annualFeeApplied = true;
            }
        }
    }

    public function showSummary() {
        echo "💰 Current Balance: {$this->balance} BDT<br>";
        echo "➕ Interest Added: {$this->interestAdded} BDT<br>";
        echo "📆 Annual Fee Applied: " . ($this->annualFeeApplied ? "Yes (200 BDT deducted)" : "No") . "<br>";
    }
}
?>
