<?php
//echo date('d'); // Day
//echo date('m'); // Month
//echo date('y'); // Year
//echo date('l'); // Day of the week

//echo date('y/m/d');
//echo date('m/d/y');

//echo date('h'); // Hour
//echo date('i'); // Min
//echo date('s'); // Seconds
//echo date('a'); // AM or PM

// Set time zone
date_default_timezone_set('America/Los_Angeles');

//echo date('h:i:sa');

/*
Unix timestamp is a long integer containing the nunber of seconds betwee the Unix Epch
(January 1 1970 00:00:00 GMT) and the time specified
*/

$timestamp = mktime(10, 14, 54, 9, 10, 1981);
//echo $timestamp;
//echo date('m/d/y h:i:sa', $timestamp);
$timestamp2 = strtotime('7:00pm March 22 2016');
$timestamp3 = strtotime('tomorrow');
$timestamp4 = strtotime('next sunday');
$timestamp5 = strtotime('+3 Months');
//echo $timestamp2;
echo date('m/d/y h:i:sa', $timestamp5);
