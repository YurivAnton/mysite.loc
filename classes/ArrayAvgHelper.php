<?php
// 18.1
//
class ArrayAvgHelper{
	public function getAvg1($arr) {
		return $this->getSum($arr, 1);
	}

	public function getAvg2($arr) {
		return $this->calcSqrt($this->getSum($arr, 2), 2);
	}

	public function getAvg3($arr) {
		return $this->calcSqrt($this->getSum($arr, 3), 3);
	}

	public function getAvg4($arr) {
		return $this->calcSqrt($this->getSum($arr, 4), 4);
	}

	private function getSum($arr, $power) {
		$sum = 0;

		foreach ($arr as $elem) {
			$sum += pow($elem, $power);
		}
		return $sum;
	}

	private function calcSqrt($num, $power) {
		return pow($num, 1/$power);
	}
}

$arr = [1, 2, 3];
 echo (new ArrayAvgHelper())->getAvg1($arr);

$arr = [6, 8];
echo (new ArrayAvgHelper())->getAvg2($arr);

$arr = [1, 2, 2, 1, 1, 2];
echo (new ArrayAvgHelper())->getAvg3($arr);

$arr = [2];
echo (new ArrayAvgHelper())->getAvg4($arr);
