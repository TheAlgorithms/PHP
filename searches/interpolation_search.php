function Search($list, $data) {
	$lo = 0;
	$mid = -1;
	$hi = count($list) - 1;
	$index = -1;

	while ($lo <= $hi) {
		$mid = (int)($lo + (((double)($hi - $lo) / ($list[$hi] - $list[$lo])) * ($data - $list[$lo])));

		if ($list[$mid] == $data) {
			$index = $mid;
			break;
		}
		else {
			if ($list[$mid] < $data)
				$lo = $mid + 1;
			else
				$hi = $mid - 1;
		}
	}

	return $index;
}
