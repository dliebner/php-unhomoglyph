<?php

class Unhomoglyph {

	protected static $charMapDir;
    protected static $data;

	protected static $blockRanges = [
		# 0 BMP
		'basic-latin' => [
			'start' => 0, // u+0000
			'end' => 127, // u+007F
		],
		'latin-1-supplement' => [
			'start' => 128, // u+0080
			'end' => 255, // u+00FF
		],
		'latin-extended-a' => [
			'start' => 256, // u+0100
			'end' => 383, // u+017F
		],
		'latin-extended-b' => [
			'start' => 384, // u+0180
			'end' => 591, // u+024F
		],
		'ipa-extensions' => [
			'start' => 592, // u+0250
			'end' => 687, // u+02AF
		],
		'spacing-modifier-letters' => [
			'start' => 688, // u+02B0
			'end' => 767, // u+02FF
		],
		'combining-diacritical-marks' => [
			'start' => 768, // u+0300
			'end' => 879, // u+036F
		],
		'greek-and-coptic' => [
			'start' => 880, // u+0370
			'end' => 1023, // u+03FF
		],
		'cyrillic' => [
			'start' => 1024, // u+0400
			'end' => 1279, // u+04FF
		],
		'cyrillic-supplement' => [
			'start' => 1280, // u+0500
			'end' => 1327, // u+052F
		],
		'armenian' => [
			'start' => 1328, // u+0530
			'end' => 1423, // u+058F
		],
		'hebrew' => [
			'start' => 1424, // u+0590
			'end' => 1535, // u+05FF
		],
		'arabic' => [
			'start' => 1536, // u+0600
			'end' => 1791, // u+06FF
		],
		'syriac' => [
			'start' => 1792, // u+0700
			'end' => 1871, // u+074F
		],
		'arabic-supplement' => [
			'start' => 1872, // u+0750
			'end' => 1919, // u+077F
		],
		'thaana' => [
			'start' => 1920, // u+0780
			'end' => 1983, // u+07BF
		],
		'nko' => [
			'start' => 1984, // u+07C0
			'end' => 2047, // u+07FF
		],
		'samaritan' => [
			'start' => 2048, // u+0800
			'end' => 2111, // u+083F
		],
		'mandaic' => [
			'start' => 2112, // u+0840
			'end' => 2143, // u+085F
		],
		'syriac-supplement' => [
			'start' => 2144, // u+0860
			'end' => 2159, // u+086F
		],
		'arabic-extended-b' => [
			'start' => 2160, // u+0870
			'end' => 2207, // u+089F
		],
		'arabic-extended-a' => [
			'start' => 2208, // u+08A0
			'end' => 2303, // u+08FF
		],
		'devanagari' => [
			'start' => 2304, // u+0900
			'end' => 2431, // u+097F
		],
		'bengali' => [
			'start' => 2432, // u+0980
			'end' => 2559, // u+09FF
		],
		'gurmukhi' => [
			'start' => 2560, // u+0A00
			'end' => 2687, // u+0A7F
		],
		'gujarati' => [
			'start' => 2688, // u+0A80
			'end' => 2815, // u+0AFF
		],
		'oriya' => [
			'start' => 2816, // u+0B00
			'end' => 2943, // u+0B7F
		],
		'tamil' => [
			'start' => 2944, // u+0B80
			'end' => 3071, // u+0BFF
		],
		'telugu' => [
			'start' => 3072, // u+0C00
			'end' => 3199, // u+0C7F
		],
		'kannada' => [
			'start' => 3200, // u+0C80
			'end' => 3327, // u+0CFF
		],
		'malayalam' => [
			'start' => 3328, // u+0D00
			'end' => 3455, // u+0D7F
		],
		'sinhala' => [
			'start' => 3456, // u+0D80
			'end' => 3583, // u+0DFF
		],
		'thai' => [
			'start' => 3584, // u+0E00
			'end' => 3711, // u+0E7F
		],
		'lao' => [
			'start' => 3712, // u+0E80
			'end' => 3839, // u+0EFF
		],
		'tibetan' => [
			'start' => 3840, // u+0F00
			'end' => 4095, // u+0FFF
		],
		'myanmar' => [
			'start' => 4096, // u+1000
			'end' => 4255, // u+109F
		],
		'georgian' => [
			'start' => 4256, // u+10A0
			'end' => 4351, // u+10FF
		],
		'hangul-jamo' => [
			'start' => 4352, // u+1100
			'end' => 4607, // u+11FF
		],
		'ethiopic' => [
			'start' => 4608, // u+1200
			'end' => 4991, // u+137F
		],
		'ethiopic-supplement' => [
			'start' => 4992, // u+1380
			'end' => 5023, // u+139F
		],
		'cherokee' => [
			'start' => 5024, // u+13A0
			'end' => 5119, // u+13FF
		],
		'unified-canadian-aboriginal-syllabics' => [
			'start' => 5120, // u+1400
			'end' => 5759, // u+167F
		],
		'ogham' => [
			'start' => 5760, // u+1680
			'end' => 5791, // u+169F
		],
		'runic' => [
			'start' => 5792, // u+16A0
			'end' => 5887, // u+16FF
		],
		'tagalog' => [
			'start' => 5888, // u+1700
			'end' => 5919, // u+171F
		],
		'hanunoo' => [
			'start' => 5920, // u+1720
			'end' => 5951, // u+173F
		],
		'buhid' => [
			'start' => 5952, // u+1740
			'end' => 5983, // u+175F
		],
		'tagbanwa' => [
			'start' => 5984, // u+1760
			'end' => 6015, // u+177F
		],
		'khmer' => [
			'start' => 6016, // u+1780
			'end' => 6143, // u+17FF
		],
		'mongolian' => [
			'start' => 6144, // u+1800
			'end' => 6319, // u+18AF
		],
		'unified-canadian-aboriginal-syllabics-extended' => [
			'start' => 6320, // u+18B0
			'end' => 6399, // u+18FF
		],
		'limbu' => [
			'start' => 6400, // u+1900
			'end' => 6479, // u+194F
		],
		'tai-le' => [
			'start' => 6480, // u+1950
			'end' => 6527, // u+197F
		],
		'new-tai-lue' => [
			'start' => 6528, // u+1980
			'end' => 6623, // u+19DF
		],
		'khmer-symbols' => [
			'start' => 6624, // u+19E0
			'end' => 6655, // u+19FF
		],
		'buginese' => [
			'start' => 6656, // u+1A00
			'end' => 6687, // u+1A1F
		],
		'tai-tham' => [
			'start' => 6688, // u+1A20
			'end' => 6831, // u+1AAF
		],
		'combining-diacritical-marks-extended' => [
			'start' => 6832, // u+1AB0
			'end' => 6911, // u+1AFF
		],
		'balinese' => [
			'start' => 6912, // u+1B00
			'end' => 7039, // u+1B7F
		],
		'sundanese' => [
			'start' => 7040, // u+1B80
			'end' => 7103, // u+1BBF
		],
		'batak' => [
			'start' => 7104, // u+1BC0
			'end' => 7167, // u+1BFF
		],
		'lepcha' => [
			'start' => 7168, // u+1C00
			'end' => 7247, // u+1C4F
		],
		'ol-chiki' => [
			'start' => 7248, // u+1C50
			'end' => 7295, // u+1C7F
		],
		'cyrillic-extended-c' => [
			'start' => 7296, // u+1C80
			'end' => 7311, // u+1C8F
		],
		'georgian-extended' => [
			'start' => 7312, // u+1C90
			'end' => 7359, // u+1CBF
		],
		'sundanese-supplement' => [
			'start' => 7360, // u+1CC0
			'end' => 7375, // u+1CCF
		],
		'vedic-extensions' => [
			'start' => 7376, // u+1CD0
			'end' => 7423, // u+1CFF
		],
		'phonetic-extensions' => [
			'start' => 7424, // u+1D00
			'end' => 7551, // u+1D7F
		],
		'phonetic-extensions-supplement' => [
			'start' => 7552, // u+1D80
			'end' => 7615, // u+1DBF
		],
		'combining-diacritical-marks-supplement' => [
			'start' => 7616, // u+1DC0
			'end' => 7679, // u+1DFF
		],
		'latin-extended-additional' => [
			'start' => 7680, // u+1E00
			'end' => 7935, // u+1EFF
		],
		'greek-extended' => [
			'start' => 7936, // u+1F00
			'end' => 8191, // u+1FFF
		],
		'general-punctuation' => [
			'start' => 8192, // u+2000
			'end' => 8303, // u+206F
		],
		'superscripts-and-subscripts' => [
			'start' => 8304, // u+2070
			'end' => 8351, // u+209F
		],
		'currency-symbols' => [
			'start' => 8352, // u+20A0
			'end' => 8399, // u+20CF
		],
		'combining-diacritical-marks-for-symbols' => [
			'start' => 8400, // u+20D0
			'end' => 8447, // u+20FF
		],
		'letterlike-symbols' => [
			'start' => 8448, // u+2100
			'end' => 8527, // u+214F
		],
		'number-forms' => [
			'start' => 8528, // u+2150
			'end' => 8591, // u+218F
		],
		'arrows' => [
			'start' => 8592, // u+2190
			'end' => 8703, // u+21FF
		],
		'mathematical-operators' => [
			'start' => 8704, // u+2200
			'end' => 8959, // u+22FF
		],
		'miscellaneous-technical' => [
			'start' => 8960, // u+2300
			'end' => 9215, // u+23FF
		],
		'control-pictures' => [
			'start' => 9216, // u+2400
			'end' => 9279, // u+243F
		],
		'optical-character-recognition' => [
			'start' => 9280, // u+2440
			'end' => 9311, // u+245F
		],
		'enclosed-alphanumerics' => [
			'start' => 9312, // u+2460
			'end' => 9471, // u+24FF
		],
		'box-drawing' => [
			'start' => 9472, // u+2500
			'end' => 9599, // u+257F
		],
		'block-elements' => [
			'start' => 9600, // u+2580
			'end' => 9631, // u+259F
		],
		'geometric-shapes' => [
			'start' => 9632, // u+25A0
			'end' => 9727, // u+25FF
		],
		'miscellaneous-symbols' => [
			'start' => 9728, // u+2600
			'end' => 9983, // u+26FF
		],
		'dingbats' => [
			'start' => 9984, // u+2700
			'end' => 10175, // u+27BF
		],
		'miscellaneous-mathematical-symbols-a' => [
			'start' => 10176, // u+27C0
			'end' => 10223, // u+27EF
		],
		'supplemental-arrows-a' => [
			'start' => 10224, // u+27F0
			'end' => 10239, // u+27FF
		],
		'braille-patterns' => [
			'start' => 10240, // u+2800
			'end' => 10495, // u+28FF
		],
		'supplemental-arrows-b' => [
			'start' => 10496, // u+2900
			'end' => 10623, // u+297F
		],
		'miscellaneous-mathematical-symbols-b' => [
			'start' => 10624, // u+2980
			'end' => 10751, // u+29FF
		],
		'supplemental-mathematical-operators' => [
			'start' => 10752, // u+2A00
			'end' => 11007, // u+2AFF
		],
		'miscellaneous-symbols-and-arrows' => [
			'start' => 11008, // u+2B00
			'end' => 11263, // u+2BFF
		],
		'glagolitic' => [
			'start' => 11264, // u+2C00
			'end' => 11359, // u+2C5F
		],
		'latin-extended-c' => [
			'start' => 11360, // u+2C60
			'end' => 11391, // u+2C7F
		],
		'coptic' => [
			'start' => 11392, // u+2C80
			'end' => 11519, // u+2CFF
		],
		'georgian-supplement' => [
			'start' => 11520, // u+2D00
			'end' => 11567, // u+2D2F
		],
		'tifinagh' => [
			'start' => 11568, // u+2D30
			'end' => 11647, // u+2D7F
		],
		'ethiopic-extended' => [
			'start' => 11648, // u+2D80
			'end' => 11743, // u+2DDF
		],
		'cyrillic-extended-a' => [
			'start' => 11744, // u+2DE0
			'end' => 11775, // u+2DFF
		],
		'supplemental-punctuation' => [
			'start' => 11776, // u+2E00
			'end' => 11903, // u+2E7F
		],
		'cjk-radicals-supplement' => [
			'start' => 11904, // u+2E80
			'end' => 12031, // u+2EFF
		],
		'kangxi-radicals' => [
			'start' => 12032, // u+2F00
			'end' => 12255, // u+2FDF
		],
		'ideographic-description-characters' => [
			'start' => 12272, // u+2FF0
			'end' => 12287, // u+2FFF
		],
		'cjk-symbols-and-punctuation' => [
			'start' => 12288, // u+3000
			'end' => 12351, // u+303F
		],
		'hiragana' => [
			'start' => 12352, // u+3040
			'end' => 12447, // u+309F
		],
		'katakana' => [
			'start' => 12448, // u+30A0
			'end' => 12543, // u+30FF
		],
		'bopomofo' => [
			'start' => 12544, // u+3100
			'end' => 12591, // u+312F
		],
		'hangul-compatibility-jamo' => [
			'start' => 12592, // u+3130
			'end' => 12687, // u+318F
		],
		'kanbun' => [
			'start' => 12688, // u+3190
			'end' => 12703, // u+319F
		],
		'bopomofo-extended' => [
			'start' => 12704, // u+31A0
			'end' => 12735, // u+31BF
		],
		'cjk-strokes' => [
			'start' => 12736, // u+31C0
			'end' => 12783, // u+31EF
		],
		'katakana-phonetic-extensions' => [
			'start' => 12784, // u+31F0
			'end' => 12799, // u+31FF
		],
		'enclosed-cjk-letters-and-months' => [
			'start' => 12800, // u+3200
			'end' => 13055, // u+32FF
		],
		'cjk-compatibility' => [
			'start' => 13056, // u+3300
			'end' => 13311, // u+33FF
		],
		'cjk-unified-ideographs-extension-a' => [
			'start' => 13312, // u+3400
			'end' => 19903, // u+4DBF
		],
		'yijing-hexagram-symbols' => [
			'start' => 19904, // u+4DC0
			'end' => 19967, // u+4DFF
		],
		'cjk-unified-ideographs' => [
			'start' => 19968, // u+4E00
			'end' => 40959, // u+9FFF
		],
		'yi-syllables' => [
			'start' => 40960, // u+A000
			'end' => 42127, // u+A48F
		],
		'yi-radicals' => [
			'start' => 42128, // u+A490
			'end' => 42191, // u+A4CF
		],
		'lisu' => [
			'start' => 42192, // u+A4D0
			'end' => 42239, // u+A4FF
		],
		'vai' => [
			'start' => 42240, // u+A500
			'end' => 42559, // u+A63F
		],
		'cyrillic-extended-b' => [
			'start' => 42560, // u+A640
			'end' => 42655, // u+A69F
		],
		'bamum' => [
			'start' => 42656, // u+A6A0
			'end' => 42751, // u+A6FF
		],
		'modifier-tone-letters' => [
			'start' => 42752, // u+A700
			'end' => 42783, // u+A71F
		],
		'latin-extended-d' => [
			'start' => 42784, // u+A720
			'end' => 43007, // u+A7FF
		],
		'syloti-nagri' => [
			'start' => 43008, // u+A800
			'end' => 43055, // u+A82F
		],
		'common-indic-number-forms' => [
			'start' => 43056, // u+A830
			'end' => 43071, // u+A83F
		],
		'phags-pa' => [
			'start' => 43072, // u+A840
			'end' => 43135, // u+A87F
		],
		'saurashtra' => [
			'start' => 43136, // u+A880
			'end' => 43231, // u+A8DF
		],
		'devanagari-extended' => [
			'start' => 43232, // u+A8E0
			'end' => 43263, // u+A8FF
		],
		'kayah-li' => [
			'start' => 43264, // u+A900
			'end' => 43311, // u+A92F
		],
		'rejang' => [
			'start' => 43312, // u+A930
			'end' => 43359, // u+A95F
		],
		'hangul-jamo-extended-a' => [
			'start' => 43360, // u+A960
			'end' => 43391, // u+A97F
		],
		'javanese' => [
			'start' => 43392, // u+A980
			'end' => 43487, // u+A9DF
		],
		'myanmar-extended-b' => [
			'start' => 43488, // u+A9E0
			'end' => 43519, // u+A9FF
		],
		'cham' => [
			'start' => 43520, // u+AA00
			'end' => 43615, // u+AA5F
		],
		'myanmar-extended-a' => [
			'start' => 43616, // u+AA60
			'end' => 43647, // u+AA7F
		],
		'tai-viet' => [
			'start' => 43648, // u+AA80
			'end' => 43743, // u+AADF
		],
		'meetei-mayek-extensions' => [
			'start' => 43744, // u+AAE0
			'end' => 43775, // u+AAFF
		],
		'ethiopic-extended-a' => [
			'start' => 43776, // u+AB00
			'end' => 43823, // u+AB2F
		],
		'latin-extended-e' => [
			'start' => 43824, // u+AB30
			'end' => 43887, // u+AB6F
		],
		'cherokee-supplement' => [
			'start' => 43888, // u+AB70
			'end' => 43967, // u+ABBF
		],
		'meetei-mayek' => [
			'start' => 43968, // u+ABC0
			'end' => 44031, // u+ABFF
		],
		'hangul-syllables' => [
			'start' => 44032, // u+AC00
			'end' => 55215, // u+D7AF
		],
		'hangul-jamo-extended-b' => [
			'start' => 55216, // u+D7B0
			'end' => 55295, // u+D7FF
		],
		'high-surrogates' => [
			'start' => 55296, // u+D800
			'end' => 56191, // u+DB7F
		],
		'high-private-use-surrogates' => [
			'start' => 56192, // u+DB80
			'end' => 56319, // u+DBFF
		],
		'low-surrogates' => [
			'start' => 56320, // u+DC00
			'end' => 57343, // u+DFFF
		],
		'private-use-area' => [
			'start' => 57344, // u+E000
			'end' => 63743, // u+F8FF
		],
		'cjk-compatibility-ideographs' => [
			'start' => 63744, // u+F900
			'end' => 64255, // u+FAFF
		],
		'alphabetic-presentation-forms' => [
			'start' => 64256, // u+FB00
			'end' => 64335, // u+FB4F
		],
		'arabic-presentation-forms-a' => [
			'start' => 64336, // u+FB50
			'end' => 65023, // u+FDFF
		],
		'variation-selectors' => [
			'start' => 65024, // u+FE00
			'end' => 65039, // u+FE0F
		],
		'vertical-forms' => [
			'start' => 65040, // u+FE10
			'end' => 65055, // u+FE1F
		],
		'combining-half-marks' => [
			'start' => 65056, // u+FE20
			'end' => 65071, // u+FE2F
		],
		'cjk-compatibility-forms' => [
			'start' => 65072, // u+FE30
			'end' => 65103, // u+FE4F
		],
		'small-form-variants' => [
			'start' => 65104, // u+FE50
			'end' => 65135, // u+FE6F
		],
		'arabic-presentation-forms-b' => [
			'start' => 65136, // u+FE70
			'end' => 65279, // u+FEFF
		],
		'halfwidth-and-fullwidth-forms' => [
			'start' => 65280, // u+FF00
			'end' => 65519, // u+FFEF
		],
		'specials' => [
			'start' => 65520, // u+FFF0
			'end' => 65535, // u+FFFF
		],
		# 1 SMP
		'linear-b-syllabary' => [
			'start' => 65536, // u+10000
			'end' => 65663, // u+1007F
		],
		'linear-b-ideograms' => [
			'start' => 65664, // u+10080
			'end' => 65791, // u+100FF
		],
		'aegean-numbers' => [
			'start' => 65792, // u+10100
			'end' => 65855, // u+1013F
		],
		'ancient-greek-numbers' => [
			'start' => 65856, // u+10140
			'end' => 65935, // u+1018F
		],
		'ancient-symbols' => [
			'start' => 65936, // u+10190
			'end' => 65999, // u+101CF
		],
		'phaistos-disc' => [
			'start' => 66000, // u+101D0
			'end' => 66047, // u+101FF
		],
		'lycian' => [
			'start' => 66176, // u+10280
			'end' => 66207, // u+1029F
		],
		'carian' => [
			'start' => 66208, // u+102A0
			'end' => 66271, // u+102DF
		],
		'coptic-epact-numbers' => [
			'start' => 66272, // u+102E0
			'end' => 66303, // u+102FF
		],
		'old-italic' => [
			'start' => 66304, // u+10300
			'end' => 66351, // u+1032F
		],
		'gothic' => [
			'start' => 66352, // u+10330
			'end' => 66383, // u+1034F
		],
		'old-permic' => [
			'start' => 66384, // u+10350
			'end' => 66431, // u+1037F
		],
		'ugaritic' => [
			'start' => 66432, // u+10380
			'end' => 66463, // u+1039F
		],
		'old-persian' => [
			'start' => 66464, // u+103A0
			'end' => 66527, // u+103DF
		],
		'deseret' => [
			'start' => 66560, // u+10400
			'end' => 66639, // u+1044F
		],
		'shavian' => [
			'start' => 66640, // u+10450
			'end' => 66687, // u+1047F
		],
		'osmanya' => [
			'start' => 66688, // u+10480
			'end' => 66735, // u+104AF
		],
		'osage' => [
			'start' => 66736, // u+104B0
			'end' => 66815, // u+104FF
		],
		'elbasan' => [
			'start' => 66816, // u+10500
			'end' => 66863, // u+1052F
		],
		'caucasian-albanian' => [
			'start' => 66864, // u+10530
			'end' => 66927, // u+1056F
		],
		'vithkuqi' => [
			'start' => 66928, // u+10570
			'end' => 67007, // u+105BF
		],
		'linear-a' => [
			'start' => 67072, // u+10600
			'end' => 67455, // u+1077F
		],
		'latin-extended-f' => [
			'start' => 67456, // u+10780
			'end' => 67519, // u+107BF
		],
		'cypriot-syllabary' => [
			'start' => 67584, // u+10800
			'end' => 67647, // u+1083F
		],
		'imperial-aramaic' => [
			'start' => 67648, // u+10840
			'end' => 67679, // u+1085F
		],
		'palmyrene' => [
			'start' => 67680, // u+10860
			'end' => 67711, // u+1087F
		],
		'nabataean' => [
			'start' => 67712, // u+10880
			'end' => 67759, // u+108AF
		],
		'hatran' => [
			'start' => 67808, // u+108E0
			'end' => 67839, // u+108FF
		],
		'phoenician' => [
			'start' => 67840, // u+10900
			'end' => 67871, // u+1091F
		],
		'lydian' => [
			'start' => 67872, // u+10920
			'end' => 67903, // u+1093F
		],
		'meroitic-hieroglyphs' => [
			'start' => 67968, // u+10980
			'end' => 67999, // u+1099F
		],
		'meroitic-cursive' => [
			'start' => 68000, // u+109A0
			'end' => 68095, // u+109FF
		],
		'kharoshthi' => [
			'start' => 68096, // u+10A00
			'end' => 68191, // u+10A5F
		],
		'old-south-arabian' => [
			'start' => 68192, // u+10A60
			'end' => 68223, // u+10A7F
		],
		'old-north-arabian' => [
			'start' => 68224, // u+10A80
			'end' => 68255, // u+10A9F
		],
		'manichaean' => [
			'start' => 68288, // u+10AC0
			'end' => 68351, // u+10AFF
		],
		'avestan' => [
			'start' => 68352, // u+10B00
			'end' => 68415, // u+10B3F
		],
		'inscriptional-parthian' => [
			'start' => 68416, // u+10B40
			'end' => 68447, // u+10B5F
		],
		'inscriptional-pahlavi' => [
			'start' => 68448, // u+10B60
			'end' => 68479, // u+10B7F
		],
		'psalter-pahlavi' => [
			'start' => 68480, // u+10B80
			'end' => 68527, // u+10BAF
		],
		'old-turkic' => [
			'start' => 68608, // u+10C00
			'end' => 68687, // u+10C4F
		],
		'old-hungarian' => [
			'start' => 68736, // u+10C80
			'end' => 68863, // u+10CFF
		],
		'hanifi-rohingya' => [
			'start' => 68864, // u+10D00
			'end' => 68927, // u+10D3F
		],
		'rumi-numeral-symbols' => [
			'start' => 69216, // u+10E60
			'end' => 69247, // u+10E7F
		],
		'yezidi' => [
			'start' => 69248, // u+10E80
			'end' => 69311, // u+10EBF
		],
		'arabic-extended-c' => [
			'start' => 69312, // u+10EC0
			'end' => 69375, // u+10EFF
		],
		'old-sogdian' => [
			'start' => 69376, // u+10F00
			'end' => 69423, // u+10F2F
		],
		'sogdian' => [
			'start' => 69424, // u+10F30
			'end' => 69487, // u+10F6F
		],
		'old-uyghur' => [
			'start' => 69488, // u+10F70
			'end' => 69551, // u+10FAF
		],
		'chorasmian' => [
			'start' => 69552, // u+10FB0
			'end' => 69599, // u+10FDF
		],
		'elymaic' => [
			'start' => 69600, // u+10FE0
			'end' => 69631, // u+10FFF
		],
		'brahmi' => [
			'start' => 69632, // u+11000
			'end' => 69759, // u+1107F
		],
		'kaithi' => [
			'start' => 69760, // u+11080
			'end' => 69839, // u+110CF
		],
		'sora-sompeng' => [
			'start' => 69840, // u+110D0
			'end' => 69887, // u+110FF
		],
		'chakma' => [
			'start' => 69888, // u+11100
			'end' => 69967, // u+1114F
		],
		'mahajani' => [
			'start' => 69968, // u+11150
			'end' => 70015, // u+1117F
		],
		'sharada' => [
			'start' => 70016, // u+11180
			'end' => 70111, // u+111DF
		],
		'sinhala-archaic-numbers' => [
			'start' => 70112, // u+111E0
			'end' => 70143, // u+111FF
		],
		'khojki' => [
			'start' => 70144, // u+11200
			'end' => 70223, // u+1124F
		],
		'multani' => [
			'start' => 70272, // u+11280
			'end' => 70319, // u+112AF
		],
		'khudawadi' => [
			'start' => 70320, // u+112B0
			'end' => 70399, // u+112FF
		],
		'grantha' => [
			'start' => 70400, // u+11300
			'end' => 70527, // u+1137F
		],
		'newa' => [
			'start' => 70656, // u+11400
			'end' => 70783, // u+1147F
		],
		'tirhuta' => [
			'start' => 70784, // u+11480
			'end' => 70879, // u+114DF
		],
		'siddham' => [
			'start' => 71040, // u+11580
			'end' => 71167, // u+115FF
		],
		'modi' => [
			'start' => 71168, // u+11600
			'end' => 71263, // u+1165F
		],
		'mongolian-supplement' => [
			'start' => 71264, // u+11660
			'end' => 71295, // u+1167F
		],
		'takri' => [
			'start' => 71296, // u+11680
			'end' => 71375, // u+116CF
		],
		'ahom' => [
			'start' => 71424, // u+11700
			'end' => 71503, // u+1174F
		],
		'dogra' => [
			'start' => 71680, // u+11800
			'end' => 71759, // u+1184F
		],
		'warang-citi' => [
			'start' => 71840, // u+118A0
			'end' => 71935, // u+118FF
		],
		'dives-akuru' => [
			'start' => 71936, // u+11900
			'end' => 72031, // u+1195F
		],
		'nandinagari' => [
			'start' => 72096, // u+119A0
			'end' => 72191, // u+119FF
		],
		'zanabazar-square' => [
			'start' => 72192, // u+11A00
			'end' => 72271, // u+11A4F
		],
		'soyombo' => [
			'start' => 72272, // u+11A50
			'end' => 72367, // u+11AAF
		],
		'unified-canadian-aboriginal-syllabics-extended-a' => [
			'start' => 72368, // u+11AB0
			'end' => 72383, // u+11ABF
		],
		'pau-cin-hau' => [
			'start' => 72384, // u+11AC0
			'end' => 72447, // u+11AFF
		],
		'devanagari-extended-a' => [
			'start' => 72448, // u+11B00
			'end' => 72543, // u+11B5F
		],
		'bhaiksuki' => [
			'start' => 72704, // u+11C00
			'end' => 72815, // u+11C6F
		],
		'marchen' => [
			'start' => 72816, // u+11C70
			'end' => 72895, // u+11CBF
		],
		'masaram-gondi' => [
			'start' => 72960, // u+11D00
			'end' => 73055, // u+11D5F
		],
		'gunjala-gondi' => [
			'start' => 73056, // u+11D60
			'end' => 73135, // u+11DAF
		],
		'makasar' => [
			'start' => 73440, // u+11EE0
			'end' => 73471, // u+11EFF
		],
		'kawi' => [
			'start' => 73472, // u+11F00
			'end' => 73567, // u+11F5F
		],
		'lisu-supplement' => [
			'start' => 73648, // u+11FB0
			'end' => 73663, // u+11FBF
		],
		'tamil-supplement' => [
			'start' => 73664, // u+11FC0
			'end' => 73727, // u+11FFF
		],
		'cuneiform' => [
			'start' => 73728, // u+12000
			'end' => 74751, // u+123FF
		],
		'cuneiform-numbers-and-punctuation' => [
			'start' => 74752, // u+12400
			'end' => 74879, // u+1247F
		],
		'early-dynastic-cuneiform' => [
			'start' => 74880, // u+12480
			'end' => 75087, // u+1254F
		],
		'cypro-minoan' => [
			'start' => 77712, // u+12F90
			'end' => 77823, // u+12FFF
		],
		'egyptian-hieroglyphs' => [
			'start' => 77824, // u+13000
			'end' => 78895, // u+1342F
		],
		'egyptian-hieroglyph-format-controls' => [
			'start' => 78896, // u+13430
			'end' => 78943, // u+1345F
		],
		'anatolian-hieroglyphs' => [
			'start' => 82944, // u+14400
			'end' => 83583, // u+1467F
		],
		'bamum-supplement' => [
			'start' => 92160, // u+16800
			'end' => 92735, // u+16A3F
		],
		'mro' => [
			'start' => 92736, // u+16A40
			'end' => 92783, // u+16A6F
		],
		'tangsa' => [
			'start' => 92784, // u+16A70
			'end' => 92879, // u+16ACF
		],
		'bassa-vah' => [
			'start' => 92880, // u+16AD0
			'end' => 92927, // u+16AFF
		],
		'pahawh-hmong' => [
			'start' => 92928, // u+16B00
			'end' => 93071, // u+16B8F
		],
		'medefaidrin' => [
			'start' => 93760, // u+16E40
			'end' => 93855, // u+16E9F
		],
		'miao' => [
			'start' => 93952, // u+16F00
			'end' => 94111, // u+16F9F
		],
		'ideographic-symbols-and-punctuation' => [
			'start' => 94176, // u+16FE0
			'end' => 94207, // u+16FFF
		],
		'tangut' => [
			'start' => 94208, // u+17000
			'end' => 100351, // u+187FF
		],
		'tangut-components' => [
			'start' => 100352, // u+18800
			'end' => 101119, // u+18AFF
		],
		'khitan-small-script' => [
			'start' => 101120, // u+18B00
			'end' => 101631, // u+18CFF
		],
		'tangut-supplement' => [
			'start' => 101632, // u+18D00
			'end' => 101759, // u+18D7F
		],
		'kana-extended-b' => [
			'start' => 110576, // u+1AFF0
			'end' => 110591, // u+1AFFF
		],
		'kana-supplement' => [
			'start' => 110592, // u+1B000
			'end' => 110847, // u+1B0FF
		],
		'kana-extended-a' => [
			'start' => 110848, // u+1B100
			'end' => 110895, // u+1B12F
		],
		'small-kana-extension' => [
			'start' => 110896, // u+1B130
			'end' => 110959, // u+1B16F
		],
		'nushu' => [
			'start' => 110960, // u+1B170
			'end' => 111359, // u+1B2FF
		],
		'duployan' => [
			'start' => 113664, // u+1BC00
			'end' => 113823, // u+1BC9F
		],
		'shorthand-format-controls' => [
			'start' => 113824, // u+1BCA0
			'end' => 113839, // u+1BCAF
		],
		'znamenny-musical-notation' => [
			'start' => 118528, // u+1CF00
			'end' => 118735, // u+1CFCF
		],
		'byzantine-musical-symbols' => [
			'start' => 118784, // u+1D000
			'end' => 119039, // u+1D0FF
		],
		'musical-symbols' => [
			'start' => 119040, // u+1D100
			'end' => 119295, // u+1D1FF
		],
		'ancient-greek-musical-notation' => [
			'start' => 119296, // u+1D200
			'end' => 119375, // u+1D24F
		],
		'kaktovik-numerals' => [
			'start' => 119488, // u+1D2C0
			'end' => 119519, // u+1D2DF
		],
		'mayan-numerals' => [
			'start' => 119520, // u+1D2E0
			'end' => 119551, // u+1D2FF
		],
		'tai-xuan-jing-symbols' => [
			'start' => 119552, // u+1D300
			'end' => 119647, // u+1D35F
		],
		'counting-rod-numerals' => [
			'start' => 119648, // u+1D360
			'end' => 119679, // u+1D37F
		],
		'mathematical-alphanumeric-symbols' => [
			'start' => 119808, // u+1D400
			'end' => 120831, // u+1D7FF
		],
		'sutton-signwriting' => [
			'start' => 120832, // u+1D800
			'end' => 121519, // u+1DAAF
		],
		'latin-extended-g' => [
			'start' => 122624, // u+1DF00
			'end' => 122879, // u+1DFFF
		],
		'glagolitic-supplement' => [
			'start' => 122880, // u+1E000
			'end' => 122927, // u+1E02F
		],
		'cyrillic-extended-d' => [
			'start' => 122928, // u+1E030
			'end' => 123023, // u+1E08F
		],
		'nyiakeng-puachue-hmong' => [
			'start' => 123136, // u+1E100
			'end' => 123215, // u+1E14F
		],
		'toto' => [
			'start' => 123536, // u+1E290
			'end' => 123583, // u+1E2BF
		],
		'wancho' => [
			'start' => 123584, // u+1E2C0
			'end' => 123647, // u+1E2FF
		],
		'nag-mundari' => [
			'start' => 124112, // u+1E4D0
			'end' => 124159, // u+1E4FF
		],
		'ethiopic-extended-b' => [
			'start' => 124896, // u+1E7E0
			'end' => 124927, // u+1E7FF
		],
		'mende-kikakui' => [
			'start' => 124928, // u+1E800
			'end' => 125151, // u+1E8DF
		],
		'adlam' => [
			'start' => 125184, // u+1E900
			'end' => 125279, // u+1E95F
		],
		'indic-siyaq-numbers' => [
			'start' => 126064, // u+1EC70
			'end' => 126143, // u+1ECBF
		],
		'ottoman-siyaq-numbers' => [
			'start' => 126208, // u+1ED00
			'end' => 126287, // u+1ED4F
		],
		'arabic-mathematical-alphabetic-symbols' => [
			'start' => 126464, // u+1EE00
			'end' => 126719, // u+1EEFF
		],
		'mahjong-tiles' => [
			'start' => 126976, // u+1F000
			'end' => 127023, // u+1F02F
		],
		'domino-tiles' => [
			'start' => 127024, // u+1F030
			'end' => 127135, // u+1F09F
		],
		'playing-cards' => [
			'start' => 127136, // u+1F0A0
			'end' => 127231, // u+1F0FF
		],
		'enclosed-alphanumeric-supplement' => [
			'start' => 127232, // u+1F100
			'end' => 127487, // u+1F1FF
		],
		'enclosed-ideographic-supplement' => [
			'start' => 127488, // u+1F200
			'end' => 127743, // u+1F2FF
		],
		'miscellaneous-symbols-and-pictographs' => [
			'start' => 127744, // u+1F300
			'end' => 128511, // u+1F5FF
		],
		'emoticons' => [
			'start' => 128512, // u+1F600
			'end' => 128591, // u+1F64F
		],
		'ornamental-dingbats' => [
			'start' => 128592, // u+1F650
			'end' => 128639, // u+1F67F
		],
		'transport-and-map-symbols' => [
			'start' => 128640, // u+1F680
			'end' => 128767, // u+1F6FF
		],
		'alchemical-symbols' => [
			'start' => 128768, // u+1F700
			'end' => 128895, // u+1F77F
		],
		'geometric-shapes-extended' => [
			'start' => 128896, // u+1F780
			'end' => 129023, // u+1F7FF
		],
		'supplemental-arrows-c' => [
			'start' => 129024, // u+1F800
			'end' => 129279, // u+1F8FF
		],
		'supplemental-symbols-and-pictographs' => [
			'start' => 129280, // u+1F900
			'end' => 129535, // u+1F9FF
		],
		'chess-symbols' => [
			'start' => 129536, // u+1FA00
			'end' => 129647, // u+1FA6F
		],
		'symbols-and-pictographs-extended-a' => [
			'start' => 129648, // u+1FA70
			'end' => 129791, // u+1FAFF
		],
		'symbols-for-legacy-computing' => [
			'start' => 129792, // u+1FB00
			'end' => 130047, // u+1FBFF
		],
		# 2 SIP
		'cjk-unified-ideographs-extension-b' => [
			'start' => 131072, // u+20000
			'end' => 173791, // u+2A6DF
		],
		'cjk-unified-ideographs-extension-c' => [
			'start' => 173824, // u+2A700
			'end' => 177983, // u+2B73F
		],
		'cjk-unified-ideographs-extension-d' => [
			'start' => 177984, // u+2B740
			'end' => 178207, // u+2B81F
		],
		'cjk-unified-ideographs-extension-e' => [
			'start' => 178208, // u+2B820
			'end' => 183983, // u+2CEAF
		],
		'cjk-unified-ideographs-extension-f' => [
			'start' => 183984, // u+2CEB0
			'end' => 191471, // u+2EBEF
		],
		'cjk-compatibility-ideographs-supplement' => [
			'start' => 194560, // u+2F800
			'end' => 195103, // u+2FA1F
		],
		# 3 TIP
		'cjk-unified-ideographs-extension-g' => [
			'start' => 196608, // u+30000
			'end' => 201551, // u+3134F
		],
		'cjk-unified-ideographs-extension-h' => [
			'start' => 201552, // u+31350
			'end' => 205743, // u+323AF
		],
		# 14 SSP
		'tags' => [
			'start' => 917504, // u+E0000
			'end' => 917631, // u+E007F
		],
		'variation-selectors-supplement' => [
			'start' => 917760, // u+E0100
			'end' => 917999, // u+E01EF
		],
		# 15 PUA-A
		'supplementary-private-use-area-a' => [
			'start' => 983040, // u+F0000
			'end' => 1048575, // u+FFFFF
		],
		# 16 PUA-B
		'supplementary-private-use-area-b' => [
			'start' => 1048576, // u+100000
			'end' => 1114111, // u+10FFFF
		],
	];

	public static function init( $charMapDir ) {

		// Remove any trailing slash
		$charMapDir = preg_replace('/(.+)\/$/', '$1', $charMapDir);

		if( !file_exists($charMapDir) ) throw new Exception("Directory does not exist: $charMapDir");
		if( !is_dir($charMapDir) ) throw new Exception("Not a directory: $charMapDir");

		self::$charMapDir = $charMapDir;

	}

	public static function extendedMapFileLocation() {

		return self::$charMapDir . '/extended.php';

	}

	/**
	 * Tool to generate `self::$blockRanges` from Wikipedia
	 */
	public static function wikipediaUnicodeBlockTableParserApp() {

		// This function is a self-contained app
		// Displays a form:
		//   Just paste the table body HTML from https://en.wikipedia.org/wiki/Unicode_block ("Unicode blocks and contained scripts")

		if( $_POST['submit'] ) {

			$data = $_POST['data'];
		
			preg_match_all('/<tr>.{1,500}?(\d+(?:\s+|&nbsp;)[\w-]+).{1,500}?>U\+(\w{4,6})\.\.U\+(\w{4,6}).{1,500}?<td><a[^>]+>([^<]+).{1,500}?<\/td><\/tr>/mis', $data, $matches, PREG_SET_ORDER);
		
			//print_r($matches);
		
			$lastPlane = null;
		
			foreach( $matches as $match ) {
		
				$blockName = self::escapeSingleQuotedString(mb_strtolower(preg_replace('/\s+/u', '-', $match[4])));
				$startHex = $match[2];
				$endHex = $match[3];
				$startCode = hexdec($startHex);
				$endCode = hexdec($endHex);
				$plane = html_entity_decode($match[1]);
		
				if( $plane !== $lastPlane ) echo "# $plane\n";
				$lastPlane = $plane;
		
				echo "'$blockName' => [\n";
				echo "\t'start' => $startCode, // u+$startHex\n";
				echo "\t'end' => $endCode, // u+$endHex\n";
				echo "],\n";
		
			}
		
		} else {
		
			echo '<form method="post"><input type="text" name="data" /><input type="submit" name="submit" /></form>';
		
		}

	}

	protected static function escapeSingleQuotedString( $str ) {

		return addcslashes($str, "'\\" . chr(0));

	}

	protected static function zeroPadDecHex($dec, $minLength = 4) {

		$hex = dechex($dec);

		if( strlen($hex) < $minLength ) $hex = substr("0000$hex", -$minLength);

		return $hex;

	}

	/**
	 * Sorts and re-organizes extended charmap, generating updated `return` array
	 */
	public static function exportUpdatedOrganizedCharmap() {

		self::initData();

		// organize charmap into codepoints
		uksort(self::$data, function($a, $b) {

			return mb_ord($a, "UTF-8") <=> mb_ord($b, "UTF-8");

		});

		$blockIndex = 0;
		$blockKeys = array_keys(self::$blockRanges);
		$blockRanges = array_values(self::$blockRanges);
		$nextBlock = $blockRanges[$blockIndex];

		$codegen = "return [\n";

		foreach( self::$data as $char => $replacement ) {

			// Length minus non-spacing marks
			if( ($len = mb_strlen(preg_replace('/[\p{Mn}]/u', '', $char))) > 1 ) throw new Exception("$char is more than 1 character ($len)");

			$ord = mb_ord($char, "UTF-8");

			while( $nextBlock && $ord >= $nextBlock['start'] ) {

				$codegen .= "\t// " . $blockKeys[$blockIndex] . " " . $nextBlock['start'] . "-" . $nextBlock['end'];
				$codegen .= " u+" . self::zeroPadDecHex($nextBlock['start']) . "..u+" . self::zeroPadDecHex($nextBlock['end']) . "\n";

				$nextBlock = $blockRanges[++$blockIndex];

			}

			$codegen .= "\t'" . self::escapeSingleQuotedString($char) . "' => '" . self::escapeSingleQuotedString($replacement) . "', # $ord u+" . self::zeroPadDecHex($ord) . "\n";

		}

		while( $nextBlock = $blockRanges[++$blockIndex] ) {

			// Add comment headers for any missing unicode blocks
			$codegen .= "\t// " . $blockKeys[$blockIndex] . " " . $nextBlock['start'] . "-" . $nextBlock['end'];
			$codegen .= " u+" . self::zeroPadDecHex($nextBlock['start']) . "..u+" . self::zeroPadDecHex($nextBlock['end']) . "\n";

		}

		$codegen .= "];";

		return $codegen;

	}
	
	/**
	 * Generates an array of skeleton character => homoglpyhs
	 */
	public static function exportInverseGroupedCharmap() {

		self::initData();

		$inverseMap = [];
		foreach( self::$data as $char => $replacement ) {

			$inverseMap[$replacement] .= $char;

		}

		return var_export($inverseMap, true);

	}

	protected static function initData() {
        
        if( !isset( self::$data ) ) {

			if( !self::$charMapDir ) throw new Exception("Must call init before use");

            if( !self::$data = include( $file = self::extendedMapFileLocation() ) ) {

				throw new Exception("Unable to get data from $file");

			}

        }

	}

	/**
	 * Replaces homoglyph characters with their "base" characters,
	 * returning a skeleton which can be compard with other string skeletons
	 * for similarity.
	 */
    public static function skeleton( $str ) {

        if( !$chars = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY) ) return $str;

		self::initData();

        $replaced = '';
        foreach( $chars as $char ) {

            if( $replacement = self::$data[$char] ) {

                $replaced .= $replacement;

            } else {

                $replaced .= $char;

            }

        }

        return $replaced;

    }

}
