<?php

require_once "database.php";

$paginaHTML = file_get_contents("../../portfolio.html");
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

if($_GET["page"] == "concept") {
	$content = "";
	$sql = "select * from PROJECT";

	foreach($pdo->query($sql) as $row) {
		$content .= $row["Iframe"] . "<br />";
		if(isset($row["Descrizione"])) {
			$content .= $row["Descrizione"] . "<br />";
		}//if
	}//foreach
}

//manda e-mail
$to = "thenevisky@altervista.org";
$headers = "From: yukkin126@gmail.com". "\r\n".
		"Reply-To: thenevisky@altervista.org". "\r\n".
		"X-Mailer: PHP/". phpversion();
if(!empty($_POST["messaggio"])) {
	$subject = "data: ". time();
	$message = $_POST["messaggio"];
	mail($to, $subject, $message, $headers);
}//if

$paginaHTML .= str_replace("[content]", $content, $paginaHTML);
$paginaHTML .= str_replace("[date]", $date, $paginaHTML);
echo $paginaHTML;

?>
