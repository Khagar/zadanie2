<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>CRAWLER</title>
	<link rel="stylesheet" type="text/css" href="zadanie2_1.css">
</head>
<body>
	<div id = "internal">
		<h1> Crawler </h1>
		<form action = "" method = "GET">
			<input type = "text" name = "page_url">
			<p></p>
			<input type = "submit" value = "Crawl!" id = "crawl">
			<p></p>
		</form>
	</div>
	<div id = "wynik">
		<?php
			if(isset($_GET['page_url'])){
				$url = $_GET["page_url"];
				//echo "<p style = 'padding: 3px 0 3px 0;'>";
					echo "<span style='font-weight: bold;'>ADRES: </span>", $url, "<br>";
					if (filter_var($url, FILTER_VALIDATE_URL)) {
						echo("<span style='color:green; font-weight: bold;'>Jest poprawny</span>");
					} else {
						echo("<span style='color: red; font-weight: bold;'>Nie jest poprawny</span>");
					}
				echo "</p>";
			}
			error_reporting(E_ERROR | E_PARSE);
			crawler($url);

			function crawler($url) { 
				// stworzenie pustego DOM Documentu, który przechowuje strukture strony
				$adres = new DOMDocument(); 
				// zaladowanie do DOMDocument'u podanej witryny
				$adres -> loadHTMLFile($url);
				$licznik = 0; // do zliczania wystąpień tagu a 
				// z zaladowanej struktury strony pobieramy zniaczniki 'a'
				foreach($adres->getElementsByTagName('a') as $link) {
					// zliczanie ilosci wsytapien tagu a
					$licznik = $licznik + 1;
					// pobieranie adres strony
					echo '<input type = "submit" value = " ', $link->getAttribute('href'),'">';// '<br>';
					// w co trzeba kliknac aby zostac przekierowanym na strone
				}
			echo '<br><br>Znaleziono: ', $licznik, ' znacznikow';
			}
		?>
	</div>
</body>
</html> 
