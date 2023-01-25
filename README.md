# php-unhomoglpyh

This is an incomplete project. Feel free to fork and develop.

## Usage

```php
require_once('Unhomoglyph.php');

Unhomoglyph::init('homoglyphCharmaps/extended.php');

$str1 = 'google.com';
$str2 = 'gοοgle.com'; // o's are actually u+03BF (lowercase omicron)
if( $str1 !== $str && Unhomoglyph::skeleton($str1) === Unhomoglyph::skeleton($str2) ) {

	echo "WARNING! $str1 looks like $str2 but they are NOT the same";

}
```

## The Character Map
Full lookalike/homoglyph character map is in `homoglyphCharmaps/extended.php`. It's organized into unicode blocks which may help you if you only need to focus on certain ranges. A TODO is to automatically break this into separate files using code generation and only include blocks as needed.

## Donate a Unicode Block!
The base of the character map is originally based on https://github.com/nodeca/unhomoglyph which is based on http://www.unicode.org/Public/security/latest/confusables.txt. However, this map left a lot to be desired, and I've gone through the first 5,000 unicode characters or so manually and updated the mapping. Unicode has over 150,000 characters at the time of this writing. See a Unicode Block that needs improvement? Donate it with a pull request!

## Tools
`Unhomoglyph::exportUpdatedOrganizedCharmap()` - Sorts and re-organizes extended charmap, generating updated `return` array  
`Unhomoglyph::exportInverseGroupedCharmap()` - Generates an array of skeleton character => homoglyphs  
`Unhomoglyph::wikipediaUnicodeBlockTableParserApp()` - Tool to generate `Unhomoglyph::$blockRanges` from Wikipedia
