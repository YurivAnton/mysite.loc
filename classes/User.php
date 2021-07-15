<?php
// 14.3
/*
class User{
	public $surname;
	public $name;
	public $patronymic;

	public function __construct($surname, $name, $patronymic) {
		$this->surname = $surname;
		$this->name = $name;
		$this->patronymic = $patronymic;
	}
}

$user = new User('anton', 'tony', 'tonovych');

$props = ['surname', 'name', 'patronymic'];

echo $user->{$props[0]}.' ';
echo $user->{$props[1]}.' ';
echo $user->{$props[2]};
 */

// 15.1
/*
class User{
	private $name;
	private $age;

	public function __construct($name, $age) {
		$this->name = $name;
		$this->age = $age;
	}

	public function getName() {
		return $this->name;
	}

	public function getAge() {
		return $this->age;
	}
}

$user = new User('anton', 34);

$methods = ['method1' => 'getName', 'method2' => 'getAge'];

echo $user->{$methods['method1']}().' ';
echo $user->{$methods['method2']}();
 */

// 17.3
/*
class User{
	private $surname;
	private $name;
	private $patronymic;

	public function setSurname($surname) {
		$this->surname = $surname;
		return $this;
	}

	public function setName($name) {
		$this->name = $name;
		return $this;
	}

	public function setPatronymic($patronymic) {
		$this->patronymic = $patronymic;
		return $this;
	}

	public function getFullName() {
		return $this->surname[0].$this->name[0].$this->patronymic[0];
	}
}

echo (new User())->setSurname('Yuriv')->setName('Anton')->setPatronymic('Volod')->getFullName();
 */

// 19.1
//
class User{
	private $name;
	private $age;

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getAge() {
		return $this->age;
	}

	public function setAge($age) {
		$this->age = $age;
	}
}

