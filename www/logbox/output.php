<!doctype html>
<meta charset="utf-8" />
<meta http-equiv="refresh" content="1;url=/output.php" />

<?php
$cfgFile = __DIR__ . "/cfg.dat";
if(!is_file($cfgFile)) {
	die("Please save your settings to see output levels");
}

$cfg = file_get_contents($cfgFile);
$cfg = unserialize($cfg);

$serialDir = "/home/logbox/serial";
$files = scandir($serialDir, SCANDIR_SORT_DESCENDING);
$latest = $files[0];
$content = file_get_contents("$serialDir/$latest");
$rawLines = explode("\n", $content);

echo "<pre>";
foreach($rawLines as $l) {
	$l = trim($l);
	list($key, $value) = explode("\t", $l);
	$lowerKey = strtolower($key);
	$name = $cfg["{$lowerKey}_name"];

	if(empty($name)) {
		continue;
	}

	$mins = $cfg["{$lowerKey}_mins"] ?: 0;
	if($mins > 0) {
		$value = getValueOverTime($key, $mins);
	}

	$formula = $cfg["{$lowerKey}_formula"] ?: "x";

	$formula = str_replace("x", $value, $formula);
	$calcValue = exec("echo \"$formula\" | bc");

	echo "$name\t$calcValue" . PHP_EOL;
}
echo "</pre>";


function getValueOverTime(string $key, float $minutes) {
	global $serialDir;
	global $files;
	$t = time();
	$t -= $minutes * 60;
	$i = 0;
	$valueCurrent = null;

	$contentCurrent = file_get_contents($serialDir . "/" . $files[0]);
	$lines = explode("\n", $contentCurrent);
	foreach($lines as $l) {
		list($keyCurrent, $value) = explode("\t", $l);
		if(strtolower($keyCurrent) !== strtolower($key)) {
			continue;
		}

		$valueCurrent = $value;
	}

	do {
		$fileT = substr($files[$i], 0, strpos($files[$i], "."));
		$i++;
	} while($t < $fileT);

	$contentOld = file_get_contents($serialDir . "/" . $files[$i]);
	$lines = explode("\n", $contentOld);

	foreach($lines as $l) {
		list($keyOld, $value) = explode("\t", $l);
		if(strtolower($keyOld) !== strtolower($key)) {
			continue;
		}

		$valueOld = $value;
	}

	return $valueCurrent - $valueOld;
}
