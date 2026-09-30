<!DOCTYPE html>
<html>
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8STW978D10"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-8STW978D10');
</script>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" href="./gui/img/tree.png" type="image/png">
	<link rel="stylesheet" href="style.css">
	<title>Portfolio</title>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="project.php">
		<img src="./gui/img/treeA.png" alt="Logo" style="width: 50px;">
		theNevisky
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse text-center" id="navbarNav">
    <ul class="navbar-nav">
		<li class= "nav-item">
			<a class="nav-link" href="illustra.php">Digital Art</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="project.php">Concepts</a>
		</li>
        <li><a class="btn btn-light" href="./">Return home</a></li>
    </ul>
	</div>
	</nav>
	<article style="margin-top: 80px;">
<?php
	include_once "database.php";
	$pdo = Database::connect();
	$sql = "select * from PROJECT";
	
	foreach($pdo->query($sql) as $row) {
		echo $row["Iframe"] . "<br />";
		if(isset($row["Descrizione"])) {
			echo $row["Descrizione"] . "<br />";
		}//if
	}//foreach
?>
    </article>
	<div class="modal" id="contactModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
		    <h5 class="modal-title">Contact Me</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
		  <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
			<p>Object</p>
			<input class="form-control" type="text" name="oggetto">
			<div class="form-group">
				<label class="col-form-label">Message</label>
				<textarea class="form-control" rows="3" name="messaggio"></textarea>
		    </div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<input type="submit" class="btn btn-dark" value="Send">
		  </form>
<?php
		  //manda e-mail
	      $to = "yukkin126@gmail.com";
	      $headers = "From: yukkin126@gmail.com". "\r\n".
	                 "Reply-To: yukkin126@gmail.com". "\r\n".
			         "X-Mailer: PHP/". phpversion();
	       if(!empty($_POST["messaggio"])) {
		       $subject = "data: ". time();
	           $message = $_POST["messaggio"];
		       mail($to, $subject, $message, $headers);
	       }//if
?>
		  </div>
		</div>
	  </div>
	</article>
  <footer class="footer-copyright black">
	<div class="container p-3">
	<div class="row">
		<div class="col text-center"><img src="./gui/img/treeA.png" alt="wordart" style="width: 200px;"></div>
		<div class="col-6">
			<h3>Links</h3><hr />
			<a href="#" data-toggle="modal" data-target="#contactModal" style="color: white;">Contact Me</a><br />
			<a href="https://ko-fi.com/thenevisky" style="color: white;">Get me a Ko-fi</a>
			<hr />@theNevisky
		</div>
	</div>
	</div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>