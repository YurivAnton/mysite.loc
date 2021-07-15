<?php
// 13.1 - 13.2
/*
class Arr{
	private $numbers = [];

	public function add($num) {
		$newNumbers = array_merge($this->numbers, $num);
		$this->numbers = $newNumbers;
	}

	public function getSum() {
		return array_sum($this->numbers) / count($this->numbers);
	}
}

$arr = new Arr();
$arr->add([1, 2, 3]);
echo $arr->getSum();
 */

// 16.1
/*
class Arr{
	private $numbers = [];

	public function __construct($numbers) {
		$this->numbers = $numbers;
	}

	public function add($numb) {
		$this->numbers[] = $numb;
	}

	public function getSum() {
		return array_sum($this->numbers);
	}
}

echo (new Arr([1, 2, 3]))->getSum();
 */

// 17.1 - 17.2
//
class Arr{
	private $numbers = [];

	public function __construct($numbers) {
		$this->numbers = $numbers;
	}

	public function add($numb) {
		$this->numbers[] = $numb;
		return $this;
	}

	public function uppend($numbers) {
		$newArr = array_merge($this->numbers, $numbers);
		$this->numbers = $newArr;
		return $this;
	}

	public function getSum() {
		return array_sum($this->numbers);
	}
}

echo (new Arr([5, 6]))->add(1)->uppend([2, 3])->add(4)->getSum();
