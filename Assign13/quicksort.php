<?php
	
	/*
	* This function, quickSortHoarePartition() takes an input of an array of numbers.
	* Then iterating through the loop from both ends, it compares current elements 
	* with pivot element and if the element is greater than pivot element, it is swapped
	* with elements lesser than pivot elements without $low and $high crossing
	* each other. Finally pivot element is placed such that all elements to the 
	* left of pivot element are less than pivot and to the right are greater than
	* pivot element. And the position of pivot element is returned back. 
	*/
	function quickSortHoarePartition(&$list, $low, $high) {
		$pivot = $list[$low];
		$i = $low - 1;
		$j = $high + 1;
		while (true) {
			do { } while ($list[++$i] < $pivot);

			do { } while ($list[--$j] > $pivot);

			if ($i < $j) 
				list($list[$i], $list[$j]) = array($list[$j], $list[$i]);
			else
				return $j;
		}
	}

	/*
	* This function, quickSortLomutoPartition() takes an input of an array of numbers.
	* Then iterating through the loop, it compares current elements with pivot
	* element and if the element is greater than pivot element, it is swapped
	* with element at postition 'i' and value of 'i' is incremented. Finally pivot 
	* element is swapped with element at position 'i' such that all elements to the 
	* left of pivot element are less than pivot and to the right are greater than
	* pivot element. And the position of pivot element is returned back. 
	*/
	function quickSortLomutoPartition(&$list, $low, $high) {
		$pivot = $list[$high];
		$i = $low;
		for ($j = $low; $j < $high; $j++)
			if ($list[$j] <= $pivot) {
				list($list[$i], $list[$j]) = array($list[$j], $list[$i]);
				$i++;
			}
		list($list[$i], $list[$high]) = array($list[$high], $list[$i]);
		return $i;
	}

	function quickSortHoare(&$list, $low, $high) {
		if ($low < $high) {
			$pivot = quickSortHoarePartition($list, $low, $high);
			quickSortHoare($list, $low, $pivot);
			quickSortHoare($list, $pivot + 1 , $high);
		}
	}

	function quickSortLomuto(&$list, $low, $high) {
		if ($low < $high) {
			$pivot = quickSortLomutoPartition($list, $low, $high);
			quickSortLomuto($list, $low, $pivot-1);
			quickSortLomuto($list, $pivot + 1 , $high);
		}
	}
	$listString = readline("\n Enter the elements as comma seperated: ");
	$listHoare = explode(', ', $listString);
	$listLomuto = $listHoare;

	$length = count($listHoare) - 1;
	quickSortHoare($listHoare, 0, $length);
	quickSortHoare($listLomuto, 0, $length);

	echo "\n Hoare Partition: \n ";
	echo implode(', ', $listHoare);
	echo "\n";
	
	echo "\n Lomuto Partition: \n ";
	echo implode(', ', $listLomuto);
  	echo "\n";
?>