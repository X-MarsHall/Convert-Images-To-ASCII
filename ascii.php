<?php

	echo "########################\n";
	echo "# Convert JPG To ASCII #\n";
	echo "# MarsHall - Maxteroit #\n";
	echo "########################\n";
	echo "Masukkan URL Jpg : ";
	$file = trim(fgets(STDIN));
	echo "\n";

$img = imagecreatefromstring(file_get_contents($file));
list($width, $height) = getimagesize($file);



$sc = 10;

$ch = array(
	' ', '\'', '.', ':',
	'|', 'T',  'X', '0',
	'#',
);

$ch = array_reverse($ch);

$c_count = count($ch);

for($y = 0; $y <= $height - $sc - 1; $y += $sc) {
	for($x = 0; $x <= $width - ($sc / 2) - 1; $x += ($sc / 2)) {
		$rgb = imagecolorat($img, $x, $y);
		$r = (($rgb >> 16) & 0xFF);
		$g = (($rgb >> 8) & 0xFF);
		$b = ($rgb & 0xFF);
		$sat = ($r + $g + $b) / (255 * 3);
		echo $ch[ (int)( $sat * ($c_count - 1) ) ];
	}

	echo PHP_EOL;
}

?>