<?php
include_once("loadFramework.php");

function eachFerien($callback){
	global $dataFile;
	$lines = preg_split("/[\\n\\r]+/", file_get_contents($dataFile), 0, PREG_SPLIT_NO_EMPTY);

	foreach ($lines as $line){
		if (preg_match("/^(.+?):\\s*(.+)/", $line, $m)){
			$name = trim($m[1]);
			$date = $m[2];
			if (preg_match("/(\\d+)\.(\\d+)\.(\\d+)-(\\d+)\.(\\d+)\.(\\d+)/", $date, $m)){
				$startDate = new DateTime($m[3] . "-" . $m[2] . "-" . $m[1]);
				$endDate = new DateTime($m[6] . "-" . $m[5] . "-" . $m[4]);
				$callback($name, $startDate, $endDate);
			}
		}
	}
}

$types = array(
	"ics" => "text/calendar;charset=UTF-8",
	"txt" => "text/plain;charset=UTF-8",
	"json" => "application/json",
	"csv" => "text/csv;charset=UTF-8");

$type = strToLower(array_read_key("type", $_GET, "ics"));

if (!array_key_exists($type, $types)){
	$type = "ics";
}

header("Content-Type: " . $types[$type]);
$dataFile = "Ferien.txt";

if ($type === "txt"){
	echo file_get_contents($dataFile);
	die();
}

$cacheFile = "cache/Ferien." . $type;
$useCache = !array_key_exists("noCache", $_GET);
if (
	$useCache &&
	file_exists($cacheFile) &&
	filemtime($cacheFile) >= filemtime($dataFile)
){
	echo file_get_contents($cacheFile);
	die();
}

$content = include("Ferien." . $type . ".php");
if ($useCache){
	file_put_contents($cacheFile, $content);
}
echo $content;