#!/usr/bin/php
<?php
$ch = curl_init("http://localhost/output.php");

curl_setopt_array($ch, [
	CURLOPT_RETURNTRANSFER => true,
]);
$html = curl_exec($ch);
$html = strip_tags($html);
$html = trim($html);

echo $html . PHP_EOL;
