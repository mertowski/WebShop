<?php
// Datenbank-Konfigurationsdatei
include 'dbConfig.php';

// Initialisieren Warenkorb Klasse
include 'Cart.php';
$cart = new Cart;

// Umleiten nach Home, wenn der Warenkorb leer ist
if($cart->total_items() <= 0){
    header("Location: herren.php");
}



// gib customer details in der Sitzung
$query = $db->query("SELECT * FROM customers WHERE id = ".$_SESSION['userid']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>WebShop</title>
   
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
    .container{width: 100%;padding: 50px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
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
    <h1>Order Preview</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Produkte</th>
            <th>Preis</th>
            <th>Menge</th>
            <th>Zwischensumme</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '$'.$item["price"].' USD'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>Keine Artikel im Warenkorb.</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Summe <?php echo '$'.$cart->total().' USD'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4>Versanddetails</h4>
        <p><?php echo $custRow['vorname']; ?></p>
        <p><?php echo $custRow['nachname']; ?></p>
        <p><?php echo $custRow['phone']; ?></p>
        <p><?php echo $custRow['adresse']; ?></p>
        <p><?php echo $custRow['email']; ?></p>
    </div>
    <div class="footBtn">
        <a href="#" onclick="history.go(-2)" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Weiter einkaufen</a>
        <a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn">Jetzt in Euro bezahlen <i class="glyphicon glyphicon-menu-right"></i></a>
    </div>
</div>
</body>
</html>