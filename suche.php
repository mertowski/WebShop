<?php 

?> 

<!-- Beginn HTML-Kopf --> 
<html> 
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
<title>Suche</title> 
<style type="text/css"> 
body { 

} 


.input { 
padding-left:5px; 
padding-right:5px; 
-moz-border-radius:4px; 
-webkit-border-radius:4px; 
border-radius: 4px; 
background-color:#FFFFFF; 
border: 1px solid #CFCFCF; 
height:40px; 
font-size: 16px; 
color:#5F5F5F; 
-moz-box-shadow: inset 0 1px 3px rgba(0,0,0,0.1); 
-webkit-box-shadow: inset 0 1px 3px rgba(0,0,0,0.1); 
box-shadow: inset 0 1px 3px rgba(0,0,0,0.1); 
} 

.button { 
background: -webkit-gradient( linear, left top, left bottom, color-stop(0.05, #0000DF), color-stop(1, #0070C0) ); 
background: -moz-linear-gradient( center top, #0000DF 5%, #0070C0 100% ); 
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0000DF', endColorstr='#0070C0'); 
background-color: #0060FF; 
-moz-border-radius: 4px; 
-webkit-border-radius: 4px; 
border-radius: 4px; 
height:40px; 
border: 1px solid #0000FF; 
display: inline-block; 
color: #EFEFEF; 
font-size: 14px; 
font-weight: bold; 
font-face: arial; 
padding: 6px 24px; 
} 

</style> 
</head> 
<body> 

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
      </ul>
    
      <ul class="nav navbar-nav" style="float: right;">
        <li><a href="registrieren.php">Registrieren</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        <!-- NAVBAR-->  
<!-- Ende HTML-Kopf --> 

<!-- Beginn Header/Seitenanfang --> 
<div align=center> 
<h1>Suche</h1> 
<!-- Ende Header/Seitenanfang --> 

<!-- Beginn der Suchform --> 
<form name="suche" action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST"> 
<input class="input" type="text" size=40 name="s"> 
<input class="button" type="submit" name="submit" value="Suche"> 
</form> 
<br /> 
<!-- Ende der Suchform --> 

<!-- Beginn der Ergebnisverarbeitung --> 

<?php 

// Wir deaktivieren Fehlerausgaben. Wenn das Script produktiv eingesetzt wird, soll nicht jeder etwaige Fehler sehen und 
error_reporting(0); 

mysql_connect('localhost','root','') or die ('Es konnte keine Verbindung zum MySQL-Server aufgebaut werden'); 
mysql_select_db('webshop') or die ('Es konnte keine Verbindung zur Datenbank aufgebaut werden'); 

// Wie viele Ergebnisse wollen wir pro Seite darstellen? In diesem Fall 25 Treffer pro Seite 
$limit = 25; 

// Wir sichern die Suchabfrage ab, escapen die Eingabe und entfernen HTML-Tags 
// mysql_real_escape_string() = escaped die Eingabe 
// strip_tags() = entfernt HTML-Eingaben 
$s = mysql_real_escape_string(strip_tags($_POST['s'])); 

// Wenn der User nichts eingegeben hat, fangen wir das ab und geben einen Fehler aus 
if($s == '') $s = $_GET['s']; 
if($s == '') { 
echo '<font style="color:#BF0000;">Sie haben keinen Suchbegriff eingegeben</font>'; 

} else { 

// Wenn eine Eingabe erfolgt ist, dann suchen wir danach in der Datenbank 
$p = $_GET['p']; 
if($p == '') $p = 1; 

// Hier wird unsere Suchabfrage an die Datenbank übergeben. Tabellenname und Spalte bitte anpassen 
$query = mysql_query("SELECT * FROM `products` WHERE `name` LIKE '%$s%' ORDER BY `id` DESC") or die (mysql_error()); 
$results = mysql_num_rows($query); 

// Wenn keine Treffer gefunden wurden, geben wir wieder eine Fehlermeldung aus 
if($results == 0){ 
echo '<font style="color:#BF0000;">Keine Treffer gefunden</font>'; 

}else{ 

// Wenn Treffer gefunden wurden, wollen wir wissen wie viele Treffer es sind 
echo '<font style="color:#007F00;"><b>' . $results . '</b> Treffer gefunden</font>'; 

// Die Ergebnisse richten wir ganz klassisch linksbündig aus 
echo '<br /><br /></div><div align=left><hr noshade size=1 width=100% color=#F0F0F0 />'; 

$pages = ceil($results/$limit); 

// Die Abfrage für die Blätterfunktion (Pagination). Tabellenname und Spalte bitte anpassen 
$result = mysql_query("SELECT * FROM `products` WHERE `name` LIKE '%$s%' ORDER BY `id` LIMIT " . ($p-1)*$limit . ",$limit") or die (mysql_error()); 

while($row = mysql_fetch_object($result)) { 

// Hier geben wir nun unsere Treffer aus. Das kann man nach belieben formatieren. Je nachdem was man alles ausgeben will und wie 

echo('Name: '."\n"); echo $row->name . '<br />';
echo('Beschreibung: '."\n"); echo $row->description . '<br />';
echo('Preis: '."\n"); echo $row->price . '<br />';

} 
} 
} 
echo '</div>'; 

?> 

<!-- Ende der Ergebnisverarbeitung --> 

<!-- Beginn Footer/Seitenende --> 
<br /><br /> 

</body> 
</html> 
<!-- Ende Footer/Seitenende -->