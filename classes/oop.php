<?php

// 1
/*
class Employee{
	public $name;
	public $age;
	public $salary;
}
 */

// 2.2
/*
$employee = new Employee();

$employee->name = 'Іван';
$employee->age = 25;
$employee->salary = 1000;
 */

// 2.3
/*
$employee2 = new Employee();

$employee2->name = 'Вася';
$employee2->age = 26;
$employee2->salary =2000;
 */

// 2.4
/*
echo 'сума віку івана і васі '.$employee->age + $employee2->age;
echo '<br>';
echo 'сума зарплат івана і васі '.$employee->salary + $employee2->salary;
echo '<br>';
 */

// 3.1
/*
class User{
	public $name;
	public $age;

	public function show(){
		return '!!!';
	}
}
$user = new User();
$user->name = 'vasya';
$user->age = 35;

echo $user->show();
 */
// 3.2
/*
class User{
	public $name;
	public $age;

	public function show($str){
		return $str . '!!!';
	}
}
$user = new User();
$user->name = 'anton';
$user->age = 35;

echo $user->show('hello');
 */

//4.1 - 4.6
/*
class Employee{
	public $name;
	public $age;
	public $salary;

	public function getName(){
		return $this->name;
	}

	public function getAge(){
		return $this->age;
	}

	public function getSalary(){
		return $this->salary;
	}

	public function checkAge(){
		if($this->age > 18){
			return true;
		} else {
			return false;
		}
	}
}

$employee1 = new Employee();
$employee1->name = 'anton';
$employee1->age = 35;
$employee1->salary = 2000;

$employee2 = new Employee();
$employee2->name = 'asd';
$employee2->age =10;
$employee2->salary = 10;

echo $employee1->getSalary() + $employee2->getSalary();
 */

// 4.7 -4.10
/*
class User{
	public $name;
	public $age;

	public function setAge($age){
		if($age >= 18){
			$this->age = $age;
		}
	}
}

$user = new User();
$user->name = 'anton';
$user->age = 30;
$user->setAge(10);

echo $user->age;
 */

// 4.11
/*
class Employee{
	public $name;
	public $salary;

	public function doubleSalary(){
		$this->salary *= 2;
	}
}

$employee = new Employee();
$employee->name = 'anton';
$employee->salary = 1500;
echo $employee->salary;
$employee->doubleSalary();
echo $employee->salary;
 */

// 4.12 - 4.14
/*
class Rectangle{
	public $width;
	public $height;

	public function getSquare(){
		return $this->width * $this->height;
	}

	public function getPerimeter(){
		return $this->width + $this->height;
	}
}

$rectangle = new Rectangle();
$rectangle->width = 2;
$rectangle->height = 4;

echo 'площа '.$rectangle->getSquare();
echo '<br>';
echo 'периметер '.$rectangle->getPerimeter();
 */

// 5.1 - 5.3
/*

class User{
	public $age;

	public function isAgeCorrect($age){
		return $age >= 18 and $age < 60;
	}

	public function setAge($age){
		if ($this->isAgeCorrect($age)) {
			$this->age = $age;
		}
	}

	public function addAge($years) {
		$newAge = $this->age + $years;

		if ($this->isAgeCorrect($newAge)) {
			$this->age = $newAge;
		}
	}

	public function subAge($years) {
		$newAge = $this->age - $years;

		if ($this->isAgeCorrect($newAge)) {
			$this->age = $newAge;
		}
	}
}

$user = new User();
$user->setAge(19);
echo $user->age;
$user->addAge(20);
echo ' - '.$user->age;
$user->subAge(4);
echo ' - '.$user->age;
 */

// 6.1 - 6.2
/*
class User{
	public $name;
	public $age;

	public function setName($name) {
		$this->name = $name;
	}

	public function setAge($age) {
		if ($this->isAgeCorrect($age)) {
			$this->age = $age;
		}
	}

	public function addAge($years) {
		$newAge = $this->age + $years;

		if ($this->isAgeCorrect($newAge)) {
			$this->age = $newAge;
		}
	}

	private function isAgeCorrect($age) {
		return $age >= 18 and $age <=60;
	}
}

$user = new User();
$user->setName('anton');
$user->setAge(30);
echo 'user - '.$user->name.'  '.'age - '.$user->age;
echo '<br>';
$user->addAge(5);
echo 'user - '.$user->name.'  '.'age - '.$user->age;
//echo $user->isAgeCorrect();
 */

// 6.3 -6.6 
/*
class Student{
	public $name;
	public $course;

	public function transferToNextCourse(){
		if ($this->isCourseCorrect()) {
			$this->course ++;
		}
	}

	private function isCourseCorrect() {
		return $this->course >= 1 and $this->course < 5;
	}
}

$student = new Student();
$student->name = 'anton';
$student->course = 1;
echo $student->course;
$student->transferToNextCourse();
echo $student->course;
$student->transferToNextCourse();                       echo $student->course;
$student->transferToNextCourse();                       echo $student->course;
$student->transferToNextCourse();                       echo $student->course;
$student->transferToNextCourse();                       echo $student->course;
 */

// 7.1 -7.4
/*
class Employee{
	public $name;
	public $age;
	public $salary;

	public function __construct($name, $age, $salary) {
		$this->name = $name;
		$this->age = $age;
		$this->salary = $salary;
	}
}

$employee1 = new Employee('vasya', 25, 1000);
$employee2 = new Employee('petro', 30, 2000);
echo $employee1->salary + $employee2->salary;
 */
// 8.1 - 8.4
/*
class Employee {
	private $name;
	private $age;
	private $salary;
	
	public function setName($name) {
		$this->name = $name;
	}

	public function setAge($age) {
		if ($this->isAgeCorrect($age)) {
			$this->age = $age;
		}
	}

	public function setSalary($salary) {
		$this->salary = $salary;
	}

	public function getName() {
		return $this->name;
	}

	public function getAge() {
		return $this->age;
	}

	public function getSalary() {
		return $this->salary.' $';
	}

	private function isAgeCorrect($age) {
		return $age >=1 and $age <=100;
	}
}

$employee1 = new Employee();
$employee1->setName('anton');
$employee1->setAge(350);
$employee1->setSalary(2000);
echo $employee1->getName();
echo'<br>';
echo $employee1->getAge();
echo '<br>';
echo $employee1->getSalary();
 */

// 9.1 -9.2
/*
class Employee{
	private $name;
	private $surname;
	private $salary;

	public function __construct($name, $surname, $salary) {
		$this->name = $name;
		$this->surname = $surname;
		$this->salary = $salary;
	}

	public function getName() {
		return $this->name;
	}

	public function getSurname() {
		return $this->surname;
	}

	public function getSalary() {
		return $this->salary;
	}

	public function setSalary($salary) {
		$this->salary = $salary;
	}
}
 */

