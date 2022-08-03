<?php
$calendar = new Calendar();
CalendarTimezone::addGermanTimezone($calendar);

$nowString = (new DateTime())->format("Ymd\THis");

eachFerien(function($name, $startDate, $endDate) use ($calendar, $nowString){
	$event = new CalendarEvent();
	$event->uid = preg_replace("/[^0-9a-z]/i", "_", $name) . "@kkapsner.de";
	$event->dtstamp = $nowString;
	$event->dtstamp->tzid = "Europe/Berlin";
	$event->dtstart = $startDate->format("Ymd");
	$event->dtstart->VALUE = "DATE";
	$event->dtstart->tzid = "Europe/Berlin";
	$event->dtend = $endDate->format("Ymd");
	$event->dtend->VALUE = "DATE";
	$event->dtend->tzid = "Europe/Berlin";
	$event->summary = $name;
	$event->categories = "Ferien";
	$calendar->addChild($event);
});

return $calendar->view(false, false);