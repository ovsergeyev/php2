<?php

abstract class goods {
    public $price;
    public function __construct($price){
        $this->price = $price;
    }
    abstract function getAmount();
}

class digital extends goods {
    public function getAmount()
    {
        return $this->price;
    }
}

class pieceGoods extends goods {
    private $quantity;

    public function __construct($price, $quantity)
    {
        parent::__construct($price);
        $this->set_quantity($quantity);
    }

    public function set_quantity($quantity){
        //... дополнительная обработка и проверка полученного значения
        $this->quantity = $quantity;
    }

    public function getAmount()
    {
        return $this->quantity * $this->price;
    }
}

class weightGoods extends goods {
    private $weight;

    public function __construct($price, $weight)
    {
        parent::__construct($price);
        $this->set_weight($weight);
    }

    public function set_weight($weight){
        //... дополнительная обработка и проверка полученного значения
        $this->weight = $weight;
    }

    public function getAmount()
    {
        return $this->weight * $this->price;
    }
}

$d = new digital(250);
$p = new pieceGoods(250,2);
$w = new weightGoods(250, 4);

echo $d->getAmount() . PHP_EOL;
echo $p->getAmount() . PHP_EOL;
echo $w->getAmount() . PHP_EOL;

//Singleton
trait SingletonSecure {
    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}
}

class Singleton {
    private static $instance;

    use SingletonSecure;

    public static function getInstance(){
        if(empty(self::$instance)){
            self::$instance = new self();
            echo "Создан экземпляр класса" . PHP_EOL;
        }

        return self::$instance;
    }

    public function doAction(){}
}

$a = Singleton::getInstance();
$b = Singleton::getInstance();