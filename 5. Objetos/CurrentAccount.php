<?php
class CurrentAccount extends Account{

    function __construct($balance,$interest){
        parent::__construct($balance, $interest);
        $this->balance = parent::getBalance();
    }

    public function getBalance(){
        return $this->balance;
    }
    public function calculaInterest(){
        $this->setBalance($this->getBalance()+(($this->getBalance()*$this->getInterest())/100));
    }
    //toString
    public function __toString()
    {
        $str = "Numero de cuenta: ".$this->getNumber()." Saldo: ".$this->balance." Tipo: Cuenta Corriente "." Interes: ".$this->getInterest();
        return $str;
    }
}