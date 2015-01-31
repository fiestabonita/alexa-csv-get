<?php

$zipfile = "top-1m.csv.zip";
$csvfile = "top-1m.csv";

if (!file_exists($csvfile)) {
	$url = "http://s3.amazonaws.com/alexa-static/top-1m.csv.zip";
	file_put_contents($zipfile, fopen($url, 'r'));
	$zip = new ZipArchive;
	$res = $zip->open($zipfile);
	if ($res === TRUE) {
		$zip->extractTo('.');
		$zip->close();
		grabCsv($csvfile);
		echo $data;
	} else {
		echo 'doh!';
	}
} else {
	grabCsv($csvfile);
}

function grabCsv($csvfile) {
	$row = 1;
	if (($handle = fopen($csvfile, "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
			$row++;
			echo $data[0] . "\t" .  $data[1] . "\n";
		}
		fclose($handle);
	}
}

?>
