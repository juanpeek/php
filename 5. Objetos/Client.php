<?php
class Client {
    private $name;
    private $card;
    private $accounts;
    public function __construct(string $name, $card){
        $this->name = $name;
        $this->card = $card;
        $this->accounts = [];
    }
    public function getCard(){
        return $this->card;
    }
    public function setCard($card){
        $this->card = $card;
    }
    public function getName(){
        return $this->name;
    }
    public function getAccounts(){
        return $this->accounts;
    }
    public function addAccount($acc){
        if(sizeof($this->getAccounts())<10){
            array_push($this->accounts,$acc);
            return true;
        }
        return false;
    }
    public function __toString():string {
        $str = "Cliente: ".$this->name." - ".$this->card."<br>"."Cuentas: <br>";
        $accs = $this->accounts;
        foreach ($accs as $acc){
            $str = $str.$acc."<br>";
        }
        return $str;
    }

    
}