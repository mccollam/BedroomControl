<?php

require_once('QAPI.php');

$station = new Q('10.1.10.182');

$bulbs = array("MD1AC44200001126", "MD1AC44200000717");

$btn = $_GET['btn'];
$lvl = $_GET['bright'];

if ($lvl == '') $lvl = 255;

// This *should* work with an array of bulbs, and does *sometimes*.
// The Q seems a bit flaky though, so for now we'll loop through them
// all separately.  (Annoying, but meh.)

foreach ($bulbs as $bulb)
{
	switch ($btn)
	{
		case 'on':
			$station->set_on($bulb);
			break;
		case 'off':
			$station->set_off($bulb);
			break;
		case 'fire':
			$station->set_color($bulb, $red=255, $green=0, $blue=0, $bright=$lvl);
			break;
		case 'martini':
			$station->set_color($bulb, $red=140, $green=0, $blue=140, $bright=$lvl);
			break;
		case 'water':
			$station->set_color($bulb, $red=0, $green=0, $blue=255, $bright=$lvl);
			break;
		case 'cloud':
			$station->set_color($bulb, $red=150, $green=125, $blue=125, $bright=$lvl);
			break;
		case 'sun':
			$station->set_color($bulb, $red=255, $green=50, $blue=25, $bright=$lvl);
			break;
		case 'blue':
			$station->set_color($bulb, $red=0, $green=200, $blue=255, $bright=$lvl);
			break;
		case 'bright':
			$station->set_brightness($bulb, $bright=$lvl);
			break;
	}
}
?>
