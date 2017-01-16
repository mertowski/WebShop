<!DOCTYPE html>
<html lang="de">
<head>
 	<title>Schuhe Schnäppchen</title>
 	<meta charset="utf-8">
 	 <meta name="viewport" content="width=device-width, initial-scale=1">


 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 	 <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<!-- JQuery-->
	<script src="js/jquery-3.1.0.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.js"></script>	
	 	 <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
 
<!-- topGrid; en üstte bulunan stil -->
    <div class="topGrid">
        <div class="col-lg-12"></div>
                </div>
    
    <!-- top Grid burada bitiyor -->    


<!-- Logo Grid-->   
    <div class="container-fluid"
<div class="row" id="logo">

  <div class="col-lg-12" id="loggo">schuheschnäppchen<span class='dotcom'>.com</span><span class='logosag'>Secondhand Schuhe</span></div>
</div>
</div>
        <!-- Logo Grid-->   


        <!-- NAVBAR-->  
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.html">Startseite</a></li>
        <li><a href="herren.php">Herren</a></li>
        <li><a href="damen.php">Damen</a></li> 
        <li><a href="counter.php">Online Kunden</a></li> 
        <li><a href="suche.php">Suche</a></li>
      </ul>

      <!--<form action="suche.php" method="post" autocomplete="off">
        <div class="form-group">
          <input type="text"  class="form-control" placeholder="Suche">
        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
      </form>
      -->
      <ul class="nav navbar-nav" style="float: right;">
        <li><a href="registrieren.php">Registrieren</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="logout.php">Logout</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        <!-- NAVBAR-->  
        

<br>
<br>
<?php

  $mysqli = new mysqli("localhost", "root", "", "webshop");

  $ergebnis = $mysqli->query("SELECT * FROM customers;");

  $anzahlKunde=$ergebnis->num_rows;

  $ergebnis->close();

  $mysqli->close();
  ?>

<p style="text-align: center; font-size: 20px;">Es gibt <?php echo $anzahlKunde; ?> Kunden online!</p>

</body>
</html>