<?php
include_once "config.php";
$url = 'https://' . $user . ':' . $password . '@mobilevikings.com/api/2.0/basic/points/referrals.json?msisdn=' . $msisdn;
$contents = file_get_contents($url);
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
echo('<ul>' . PHP_EOL);
?>
