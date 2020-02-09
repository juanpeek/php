<?php
abstract class Account {
    protected $balance;
    protected $number;
    protected $interest;

    function __construct($balance,$interest){
        $this->setBalance($balance);
        $this->setInterest($interest);
        $this->setNumber();
    }

    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    public function setInterest($interest)
    {
        $this->interest = $interest;
    }

    public function setNumber()
    {
        $country = "ES";
        $cd = rand(10,99);
        $number = $country.$cd." ".rand(1000,9999)." ".rand(1000,9999)." ".rand(10,99)." ".rand(1000000000,9999999999);
        $this->number = $number;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getInterest()
    {
        return $this->interest;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function moneyIn($money)
    {
        $this->setBalance($this->balance + $money);
    }

    public function moneyOut($money)
    {
        if($this->balance - $money<0){

        }else{
            $this->setBalance($this->balance - $money);
        }
    }
    /*
    abstract public function calculaInteres();
    public function __toString(){
        return "Numero de cuenta: ".$this->number." Saldo: ".$this->balance;
    }
    */
}