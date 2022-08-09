<?php

class Computer // Общий класс 
{
    protected $processor;
    protected $ram;
    protected $graphics;
    protected $memory;
    protected function __construct($processor, $ram, $graphics, $memory){
        $this->memory = $memory;
        $this->processor = $processor;
        $this->ram = $ram;
        $this->graphics = $graphics;
    }

    protected function info(){ // Функция отображает характеристики компьютера
        echo($this->processor . " " . $this->ram . " " . $this->graphics . " " . $this->memory . " "); 
    }
}

class Notebook extends Computer  // Наследование от класса компьютер - ноутбук
{
    protected $screen_diagonal; // Дополнительное свойство - Диагональ экрана
    public $discount; // Дополнительное свойство - скидка
    public $price; // Дополнительное свойство - цена
    public function __construct($price = null, $processor = null, $ram = null, $graphic = null, $memory = null, $screen_diagonal = null, $discount = 0){
        parent::__construct($processor, $ram, $graphic, $memory);
        $this->screen_diagonal = $screen_diagonal;
        $this->discount = $discount;
        $this->price = $price;
    }

    public function info(){ // Отображение всех свойств 
        echo $this->discount($this->price, $this->discount) . " ";
        parent::info();
        echo $this->screen_diagonal . PHP_EOL;
    }

    protected function discount($price,$discount){ // дополнительный метод - скидка
        if($discount < 100 and $discount >= 0)
        {
            return $price * (100 - $discount) / 100 ;
        }
        else
        { 
            return $price;
        }
    }
}

class Desctop extends Computer // Наследование от класса компьютер - Настольный ПК
{
    protected $wifi_adapter; // Дополнительное свойство - наличие/отсутствие Wi-Fi адаптера

    public function __construct($processor = null, $ram = null, $graphic = null, $memory = null, $wifi_adapter = null){
        parent::__construct($processor, $ram, $graphic, $memory);
        $this->wifi_adapter = $wifi_adapter;
    }

    public function info(){ // Отображение всех свойств 
        parent::info();
        echo $this->wifi_adapter . PHP_EOL;
    }
}

$notebook = new Notebook(10000, "Intel Core i7-11800H", 32, "Nvidia GeForce RTX 3060", "SSD 1Tb", '17"');

$pc = new Desctop("Intel Core i7-980X EE", 64, "Nvidia GeForce RTX 3080", "SSD 4Tb");

$notebook->info();
$notebook->discount=50;
$notebook->info();