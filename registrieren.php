<?php 
// include database configuration file
include 'dbConfig.php'; 

session_start();
$pdo = new PDO('mysql:host=localhost;dbname=webshop', 'root', '');
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
    .reg{padding-right: 20px;}
    </style>
</head>
</head>   <title>Registrieren</title>
  
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
        

        



 
<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
 $error = false;
 $vorname =$_POST['vorname'];
 $nachname =$_POST['nachname'];
 $email = $_POST['email'];
 $passwort = $_POST['passwort'];
 $passwort2 = $_POST['passwort2'];
 $phone =$_POST['phone'];
 $adresse =$_POST['adresse'];
 

  
 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
 $error = true;
 } 
 if(strlen($passwort) == 0) {
 echo 'Bitte ein Passwort angeben<br>';
 $error = true;
 }
 if($passwort != $passwort2) {
 echo 'Die Passwörter müssen übereinstimmen<br>';
 $error = true;
 }
 
 //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
 if(!$error) { 
 $statement = $pdo->prepare("SELECT * FROM customers WHERE email = :email");
 $result = $statement->execute(array('email' => $email));
 $user = $statement->fetch();
 
 if($user !== false) {
 echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
 $error = true;
 } 
 }
 
 //Keine Fehler, wir können den Nutzer registrieren
 if(!$error) { 
 $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
 
 $statement = $pdo->prepare("INSERT INTO customers ( vorname, nachname, email, passwort, phone, adresse) VALUES (:vorname, :nachname, :email, :passwort, :phone ,:adresse)");
 $result = $statement->execute(array('vorname' => $vorname, 'nachname' => $nachname, 'email' => $email, 'passwort' => $passwort_hash, 'phone'=> $phone, 'adresse'=> $adresse));
 
 if($result) { 
 echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';         
 $showFormular = false;
 } else {
 echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
 }
 } 
}
 
if($showFormular) {
?>
 
<form action="?register=1" method="post">

Vorname:<br>
<input type="name" size="40" maxlength="250" name="vorname" ><br><br>
Nachname:<br>
<input type="name" size="40" maxlength="250" name="nachname"><br><br>


E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>
 
Passwort wiederholen:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>

Telefonnummer:<br>
<input type="number" size="40" maxlength="250" name="phone"><br><br>

Adresse:<br>
<input type="adress" size="40" maxlength="250" name="adresse"><br><br>
 
<input type="submit" value="Abschicken">
</form>
 
<?php
} //Ende von if($showFormular)
?>
 
</body>
</html>