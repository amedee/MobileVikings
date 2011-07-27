<?php
include_once "config.php";
$url = 'https://' . $user . ':' . $password . '@mobilevikings.com/api/2.0/basic/points/referrals.json';
$cache_file = 'referrals.json';
$cache_life = '14400'; // caching time, in seconds. 14400 seconds = 4 hours
$log_file = 'referrals.log';

// Cheap and dirty way to code a cache
if (!file_exists($cache_file) or (time() - filemtime($cache_file) >= $cache_life)){
	file_put_contents($cache_file, file_get_contents($url));
	error_log("[" . date("Y/m/d h:i:s", mktime()) . "] " . "Referrals updated\n", 3, $log_file);
}

$contents = file_get_contents($cache_file);
if ($contents === false) {
	echo (' verschillende personen ');
	error_log("[" . date("Y/m/d h:i:s", mktime()) . "] " . "Empty referrals file\n", 3, $log_file);
}
else {
	$contents = utf8_encode($contents);
	$results = json_decode($contents, true);
	echo('<ul>' . PHP_EOL);
	$i = 0;
	foreach ($results as $item) {
		echo ('  <li');
		switch ($i) {
			case count($results) - 2:
				echo (' class="beforelast"');
				break;
			case count($results) - 1:
				echo (' class="last"');
				break;
		}
		printf ('>%s</li>' . PHP_EOL, trim($item['name']));
		$i++;
	}
	echo('</ul>' . PHP_EOL);
	error_log("[" . date("Y/m/d h:i:s", mktime()) . "] " . "Referrals displayed\n", 3, $log_file);
}
?>
