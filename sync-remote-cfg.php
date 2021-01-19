#!/usr/bin/php
<?php
$id = gethostname();
$id = substr($id, strpos($id, "-") + 1);
$ch = curl_init("http://config.logbox.cloud/remote/cfg.php?id=$id");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$result = curl_exec($ch);
$json = json_decode($result);

$cfgPath = __DIR__ . "/www/logbox/cfg.dat";
$remoteNeedsUpdate = false;
$sourceNeedsUpdate = false;

if(isset($json->error)) {
        $remoteNeedsUpdate = true;
}
if(file_exists($cfgPath)) {
        echo "Source file exists." . PHP_EOL;

        $mtime = filemtime($cfgPath);
        if($json->mtime > $mtime + 5) {
                echo "Server has been modified." . PHP_EOL;
                $sourceNeedsUpdate = true;
        }
        elseif($json->mtime < $mtime - 240) {
                echo "Source has been modified." . PHP_EOL;
                $remoteNeedsUpdate = true;
        }
}
else {
        echo "Source file does not exist." . PHP_EOL;
        $sourceNeedsUpdate = true;
}

if($remoteNeedsUpdate) {
        echo "Updating remote..." . PHP_EOL;
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
                "cfg-$id" => new CURLFile($cfgPath, "text/plain", "cfg-$id"),
        ]);
        echo curl_exec($ch);
}

if($sourceNeedsUpdate) {
        echo "Updating source..." . PHP_EOL;
	copy($cfgPath, $cfgPath . ".old");
        file_put_contents($cfgPath, $json->serialized);
}

if(!$remoteNeedsUpdate
&& !$sourceNeedsUpdate) {
        echo "Everything up to date." . PHP_EOL;
}
