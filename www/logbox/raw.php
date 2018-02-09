<!doctype html>
<meta charset="utf-8" />
<meta http-equiv="refresh" content="1;url=/raw.php" />

<?php
$serialDir = "/home/logbox/serial";
$files = scandir($serialDir, SCANDIR_SORT_DESCENDING);
$latest = $files[0];
$content = file_get_contents("$serialDir/$latest");
echo "<pre>";
echo $content;
echo "</pre>";
