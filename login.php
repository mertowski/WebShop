<?php 
// include database configuration file
include 'dbConfig.php';

session_start();
$pdo = new PDO('mysql:host=localhost;dbname=webshop', 'root', '');
 
if(isset($_GET['login'])) {
 $email = $_POST['email'];
 $passwort = $_POST['passwort'];
 
 $statement = $pdo->prepare("SELECT * FROM customers WHERE email = :email");
 $result = $statement->execute(array('email' => $email));
 $user = $statement->fetch();
 
 //Überprüfung des Passworts
 if ($user !== false && password_verify($passwort, $user['passwort'])) {
 $_SESSION['userid'] = $user['id'];

die('Login erfolgreich. Weiter zur <a href="index.html">Startseite</a>');


 } else {
 $errorMessage = "E-Mail oder Passwort war ungültig.<br>";
 }
 
}
?>
<!DOCTYPE html> 
<html lang="de"> 
<head>




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


    <style>
    .container{padding: 50px;}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
    </style>
</head>
</head>   <title>Login</title>
<body>
 
<!-- topGrid; en üstte bulunan stil -->
    <div class="topGrid">
        <div class="col-lg-12"></div>
                </div>
    
    <!-- top Grid burada bitiyor -->    


        <!-- Logo Grid-->   
    <div class="container-fluid"
<div class="row" id="logo">

  <div class="col-lg-12" id="loggo">schuhemarkt<span class='dotcom'>.com</span><span class='logosag'>WEB-PROGRAMMIERUNG</span></div>
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
        <li><a href="suche.php">Suche</a></li> 
      </ul>

      <ul class="nav navbar-nav" style="float: right;">
        <li><a href="registrieren.php">Registrieren</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        <!-- NAVBAR-->  
        






<div class="container">
  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <div id="logo" style="color: white; text-align: center;">Login</div>
      <br>

      <div class="col-sm-12 col-md-10 col-md-offset-1">
        <form action="?login=1" method="post" class="login">
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input class="form-control" type="email" name='email' placeholder="username"/>          
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control" type="password" name='passwort' placeholder="password"/>     
          </div>
          
          <div class="form-group">
          <div class="col-sm-12 col-md-10 col-md-offset-1">
            <input type="submit" class="btn-success" value="Abschicken" style="margin-left: 35px;">
          </div>
          </div>
          <br>
          <br>
          <?php 
if(isset($errorMessage)) {
 echo $errorMessage;
}
?>
          
        </form>        
      </div>  
    </div>    
  </div>
</div>


 
<br>


</body>
</html>