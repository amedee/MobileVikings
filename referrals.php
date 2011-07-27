<div
	id="inline-list">
	Met dank aan
<?php
include_once 'referrals-list.php';
?>
	om mij een gratis herlading twv €15 te bezorgen!
	<!-- code from https://mobilevikings.com/nl/myviking/points/referral-links/ -->
	<p align="right">
<?php
include_once 'config.php';
echo('		<a' . PHP_EOL);
echo('			href="http://mobilevikings.com/referral/' . $referral . '/"' . PHP_EOL);
echo('			title="Word een Viking"><img' . PHP_EOL);
echo('			src="http://mobilevikings.com/nl/referral/image/' . $referral . '/banner2.jpg/"' . PHP_EOL);
echo('			title="Word een Viking" alt="" /> </a>' . PHP_EOL);
?>
	</p>
</div>
