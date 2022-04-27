<?php
$data = array(array("Name", "Start", "End"));

eachFerien(function($name, $startDate, $endDate) use (&$data){
	$data[] = array($name, $startDate->format("Y-m-d"), $endDate->format("Y-m-d"));
});

$csv = new CSVWriter();
$csv->separator = array_read_key("separator", $_GET, ",");
return $csv->writeToString($data);