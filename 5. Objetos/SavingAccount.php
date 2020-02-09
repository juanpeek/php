<?php

class SavingAccount extends Account{
    private $minBalance;

    function __construct($balance,$interest,$minBalance){
        parent::__construct($balance,$interest);
        $this->minBalance = $minBalance;
    }

    public function calculaInterest(){
        if($this->getBalance()>$this->minBalance){
            $this->setBalance($this->getBalance()+(($this->getBalance()*($this->getInterest()*2))/100));
        }else{
            $this->setBalance($this->getBalance()+(($this->getBalance()*($this->getInterest()*0.5))/100));
        }
    }
    //toString
    public function __toString()
    {
        $str = "Numero de cuenta: ".$this->getNumber()." Saldo: ".$this->balance." Tipo: Cuenta de Ahorro "." Interes: ".$this->getInterest()." MinBalance: ".$this->minBalance;
        return $str;
    }

}