<?php

/*У
Урок 2. ООП в PHP. Расширенное изучение
1. Создать структуру классов ведения товарной номенклатуры.
а) Есть абстрактный товар.
б) Есть цифровой товар, штучный физический товар и товар на вес.
в) У каждого есть метод подсчета финальной стоимости.
г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза. У штучного товара обычная стоимость, у весового – в зависимости от продаваемого количества в килограммах.
д) Что можно вынести в абстрактный класс, наследование?
*/

abstract class Product {

	protected static $cost = 100;

	abstract public function finalCost();
}

class DigitalProduct extends Product {

	public function finalCost() {
		return self::$cost/2;
	}

}

class PeiceProduct extends Product {

	public function finalCost() {
		return self::$cost;
	}

}

class WeightProduct extends Product {

	private $weight;

    public function __construct()
    {
    	$this->weight = 0;
    }

	public function setWeight($weight) { 
		$this->weight = $weight;
	}

	public function getWeight($weight) {
		$this->weight = $weight;
	}

	public function finalCost() 
	{
		return $this->weight * self::$cost;
	}

}

$prod1 = new DigitalProduct();
$prod2 = new PeiceProduct();
$prod3 = new WeightProduct();

$prod3->setWeight(2.7);

echo "Final cost of the digital product: " . $prod1->finalCost() . "$" . PHP_EOL;
echo "Final cost of the peice product: " . $prod2->finalCost() . "$" . PHP_EOL;
echo "Final cost of the weight product: " . $prod3->finalCost() . "$" . PHP_EOL;