<?php

class Product {
    protected $price;
    protected $quantity;
    protected $discount;
    protected $article;
    protected $name;

    public function __construct($article, $name = ""){
        $this->article = $article;
        $this->name = $name;
    }

    public function get_price(){
        return $this->price - $this->price * $this->discount;
    }

    public function set_price($price){
        $this->price = $price;
    }

    public function set_quantity($quantity){
        $this->quantity = $quantity;
    }

    public function set_name($name){
        $this->name = $name;
    }
}

class TShirt extends Product {
    protected $size;
    public function set_size($size){
        $this->set_size($size);
    }
}

//Переменная $x объявлена статической. Она пренадлежит классу A (не конкретному объекту) и функции foo().
//Таким образом при выполнении метода foo в любом объекте класса A будет выполнятся преинкремент общей для всех
//объектов переменной
class A {
    public function foo(){
        static $x = 0;
        echo ++$x;
    }
}

$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

//В данном приемере в классе наследнике создается свои экземпляр
//статической переменной.
class A1 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

class B extends A1 {

}

$a1 = new A1();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

