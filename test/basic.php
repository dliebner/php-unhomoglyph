<?php

$root_path = '../';

require_once($root_path . 'Unhomoglyph.php');

Unhomoglyph::init($root_path . 'homoglyphCharmaps/extended.php');

$str1 = 'google.com';
$str2 = 'gοοgle.com'; // o's are actually u+03BF (lowercase omicron)
if( $str1 !== $str && Unhomoglyph::skeleton($str1) === Unhomoglyph::skeleton($str2) ) {

	echo "WARNING! $str1 looks like $str2 but they are NOT the same";

}
