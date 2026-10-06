<?php

require_once "database.php";

$paginaHTML = file_get_contents("../../portfolio_php.html");

$content = "";
$date = date('Y');

$pdo = Database::connect();

if($_GET["page"] == "art") {
	$listaPixel = "";
	$listaIllustra = "";

	//visualizza pixel
	$stringaPixel = "<article id='pixel' class='frow' style='margin-top: 80px;'>";

	$sql = "select * from PIXEL order by PIXEL.nOrder";
	foreach($pdo->query($sql) as $row) {
		$stringaPixel .= "<div class='column'>
		<a data-toggle='modal' data-target='#". $row["urlPix"]. "' role='button'>
		<img src='". $row["urlPix"]. "' class='hover-shadow pixel' /></a>
		</div>";
	}//foreach
	$stringaPixel .= "</article>";

	//visualizza illustrazioni
	$listaIllustra = "<article id='illustra' style='margin-top=30px;'>";

	$sq1 = "select * from ILLUSTRA";
	foreach($pdo->query($sq1) as $row) {
		$listaIllustra .= "<img src='". $row["urlIllustr"]. "' class='hover-shadow illustra' />
		<p>". $row["Descrizione"]. "</p>";
	}//foreach
	$listaIllustra .= "</article>";

	$content = $listaPixel. $listaIllustra;
}

if($_GET["page"] == "website") {
	$sql = "select * from WEBSITE";

	$content = "<article class='frow'>";
	foreach($pdo->query($sql) as $row) {
		$content .= "<div class='column'>
			<iframe src='". $row["Url"]. "' title='". $row["Title"]. "'></iframe>";
		if(isset($row["Descrizione"])) {
			$content .= "<p>". $row["Descrizione"]. "</p>";
		}//if
		$content .= "</div>";
	}//foreach
	$content .= "</article>";
} 

$pdo = Database::disconnect();

$paginaHTML = str_replace("[content]", $content, $paginaHTML);
$paginaHTML = str_replace("[date]", $date, $paginaHTML);
echo $paginaHTML;

?>
