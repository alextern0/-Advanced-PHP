<?php

/*У
Урок 2. ООП в PHP. Расширенное изучение
2. *Реализовать паттерн Singleton при помощи traits.
*/

trait Test {

	static protected $self;

	final private function __construct() {

	}

	public static function getInstance() {
		
		if (self::$self === null) {
			self::$self = new self;
		}
		return self::$self;
	}

}

class Singleton {

	use Test;

	private static $some_value = '';

	public function setSettings($value) {
		self::$some_value = $value;
	}

	public function getSettings() {
		return self::$some_value;
	}
}

$value = "It's Singleton";

Singleton::getInstance()->setSettings($value);

var_dump(Singleton::getInstance()->getSettings());