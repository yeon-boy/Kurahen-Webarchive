<?php

$boards = array(
	'b', 'fz', 'id', 'r', 'z', '%D1%8D%D0%BB%D0%B8%D1%82%D0%B0', 'wykop', 'noc', '$', 'a', 'c',
	'co', 'edu', 'f', 'fa', 'h', 'kib', 'ku', 'l', 'med', 'mil', 'mu', 'oc', 'og', 'p', 'po',
	'pony', 'sci', 'sp', 'tech', 'thc', 'trv', 'v8', 'vg', 'wall', 'x', 'dew', 'g', 'hen', 's',
	'int', 'kara', 'rs', '4'
);
$domain = 'karachan.org';


$c = curl_init();
curl_setopt($c, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($c, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($c, CURLOPT_USERAGENT,
	'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36');
curl_setopt($c, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);

foreach ($boards as $board) {
	for ($i = 0; $i <= 15; $i++) {
		if ($i == 0) {
			$url = 'https://web.archive.org/save/http://'. $domain .'/'. $board .'/';
		} else {
			$url = 'https://web.archive.org/save/http://'. $domain .'/'. $board .'/'. $i .'.html';
		}

		curl_setopt($c, CURLOPT_URL, $url);
		if (curl_exec($c) !== FALSE) {
			echo "Archiwizacja ", $board, " strona ", $i, "\n";
		} else {
			echo "Archiwizacja ", $board, " strona ", $i, " NIEUDANA!\n";
		}
	}
}

echo "Archiwizacja ", count($boards), " desek zakończona\n";
