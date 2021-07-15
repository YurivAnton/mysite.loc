<?php
// 10.1
/*
class Employee{
	public $name;
	public $surname;
	public $patronymic;
	public $salary;

	public function __construct($name, $surname, $patronymic, $salary) {
		$this->name = $name;
		$this->surname = $surname;
		$this->$patronymic = $patronymic;
		$this->salary = $salary;
	}
}
 */

// 19.1
//
require_once 'User.php';
class Employee extends User{
	private $salary;

	public function getSalary() {
		return $this->salary;
	}

	public function setSalary($salary) {
		$this->salary = $salary;
	}
}
