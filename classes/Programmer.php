<?php
// 19.3
//
require_once 'Employee.php';
//require_once 'User.php';
class Programmer extends Employee{
	private $lang = [];

	public function setLang($lang) {
		$this->lang[] = $lang;
	}

	public function getLang() {
		$langs = '';
		foreach ($this->lang as $elem) {
			$langs .= $elem.', ';
		}
		return $langs;
	}
}

$programmer = new Programmer();
$programmer->setName('anton');
$programmer->setAge(34);
$programmer->setSalary(2000);
$programmer->setLang('php');
$programmer->setLang('html');

echo $programmer->getName().'<br>';
echo $programmer->getAge().'<br>';
echo $programmer->getSalary().'<br>';
echo $programmer->getLang();
