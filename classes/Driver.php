<?php
// 19.4
//
require_once 'Employee.php';

class Driver extends Employee{
	private $drivingExperience;
	private $category = [];

	public function setDrivingExperience($drivingExperience) {
		$this->drivingExperience = $drivingExperience;
	}

	public function getDrivingExperience() {
		return $this->drivingExperience;
	}

	public function setCategory($category) {
		$posibleCategories = ['A', 'B', 'C', 'D'];
		if (in_array($category, $posibleCategories)) {
			$this->category[] = $category;
		}
	}

	public function getCategory() {
		return $this->category;
	}
}

$driver = new Driver();
$driver->setCategory('A');
$driver->setCategory('B');
var_dump($driver->getCategory());


