function BucketSort(&$data)
{
	$minValue = $data[0];
	$maxValue = $data[0];
	$dataLength = count($data);

	for ($i = 1; $i < $dataLength; $i++)
	{
		if ($data[$i] > $maxValue)
			$maxValue = $data[$i];
		if ($data[$i] < $minValue)
			$minValue = $data[$i];
	}

	$bucket = array();
	$bucketLength = $maxValue - $minValue + 1;
	
	for ($i = 0; $i < $bucketLength; $i++)
	{
		$bucket[$i] = array();
	}

	for ($i = 0; $i < $dataLength; $i++)
	{
		array_push($bucket[$data[$i] - $minValue], $data[$i]);
	}
	
	$k = 0;
	for ($i = 0; $i < $bucketLength; $i++)
	{
		$bucketCount = count($bucket[$i]);
		
		if ($bucketCount > 0)
		{
			for ($j = 0; $j < $bucketCount; $j++)
			{
				$data[$k] = $bucket[$i][$j];
				$k++;
			}
		}
	}
}
