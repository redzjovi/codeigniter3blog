<?php
function pr($data)
{
	if (is_array($data))
	{
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}
	else
		var_dump($data);
}

function datetime_from_format($datetime, $format_from, $format_to = 'Y-m-d H:i:s')
{
	$datetime_new = DateTime::createFromFormat($format_from, $datetime);
	return $datetime_new->format($format_to);
}
?>