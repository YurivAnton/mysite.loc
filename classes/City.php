<?php
// 11.1 - 11.3
/*
class City{
	public $name;
	public $population;

	public function __construct($name, $population) {
		$this->name = $name;
		$this->population = $population;
	}

}

$cities = [
	new City('aaa', 111),
	new City('bbb', 222),
	new City('ccc', 333),
	new City('ddd', 444),
	new City('fff', 555)
];
foreach ($cities as $city) {
	echo $city->name.' - '.$city->population;
}
 */


// 14.1 - 14.2
//
class City{
	public $name;
	public $foundation;
	public $population;

	public function __construct($name, $foundation, $population) {
		$this->name = $name;
		$this->foundation = $foundation;
		$this->population = $population;
	}
}

$city = new City('dolyna', 1500, 21000);

$props = ['name', 'foundation', 'population'];

foreach ($props as $prop) {
	echo $city->$prop;
	echo '<br>';
}
