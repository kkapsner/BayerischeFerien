<?php
$data = array();

eachFerien(function($name, $startDate, $endDate) use (&$data){
	$data[] = array("name" => $name, "start" => $startDate->format("Y-m-d"), "end" => $endDate->format("Y-m-d"));
});

return json_encode($data);