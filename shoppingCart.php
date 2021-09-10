<?php
session_start();
require_once('add-to-cart.php');
$user = "SLFootball";
  $pass = "zinqa-zn";
  $db = "SLFootball";
  $link = mysql_connect( "mars", $user, $pass );

  if ( ! $link )
     die( "Couldn't connect to MySQL" );
  mysql_select_db( $db, $link )
     or die ( "Couldn't open $db: ".mysql_error() );

function db_result_to_array($result)
{
  $res_array=array();
  for ($count=0; $row=@mysql_fetch_array($result); $count++)
    $res_array[$count]=$row;
  return $res_array;	
}



?>
<?php
        if(array_key_exists('clear', $_POST)) { 
            clearCart(); 
        } 
        else if(array_key_exists('update', $_POST)) { 
            update(); 
        } 
 ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is an online store where you can find all your football needs.">
    <title>SLFootball | Homepage</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



    <link rel="stylesheet" href="style.css">

    <style>
        
    .btn-info {
      color: #fff;
      background-color: #000;
      border-color: #46b8da;
    }

    .content-area{
      width: 100%;
      position: relative;
      top: 480px;
      background: #ddd;
      height: fit-content;
      display: inherit;
      flex-wrap: nowrap;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .categoty-area{
      width: 100%;
      position: relative;
      top: 480px;
      background: #ddd;
      height: fit-content;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
    }

    .column{
      width: = 50%;
      align-content: center;
      text-align: center;
    }

    .column img{
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 80%;
    }

    .top-buffer {
      margin-top: -20px;
    }

    nav ul li{
      display: inline-block;
      margin-top: 40px;
      margin-right: 50px;
    }

    .small-container{
        max-width: 1080px;
        margin:auto;
        padding-left: 20px;
        padding-right: 20px;
    }
    .row{
        width: 80%
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .col4{
        flex-basis: 25%;
        padding: 10px;
        min-width: 200px;
        margin-bottom: 50px;
        transition: transform 0.5s;
    }
    .col4 img{
        width: 50%;
    }

    .col4 p{
        font-size: 14px;
    }
    .col4:hover{
        transform: translateY(-5px);
    }


    </style>
</head>
<body>

    <div class="navbar top-buffer">
        <div class="logo">
          <a href="index.php"><img src="images/logo.jpg" width="400px" ></a>
        </div>
        <nav>
          <div class = "menu" id = "MenuItems">
            <ul>
              <li><a href="index.php" style="text-decoration: none;color:black;">Home</a></li>
              <li><a href="catelogue.php?category=Football%20Kits" style="text-decoration: none;color:black;">Football Kits</a></li>
              <li><a href="catelogue.php?category=Equipment" style="text-decoration: none;color:black;">Equipment</a></li>
              <li><a href="fanZone.html" style="text-decoration: none;color:black;">Fan Zone</a></li>
              <li><a href="account.html" style="text-decoration: none;color:black;">Account</a></li>
              <li> <a href="shoppingCart.php" style="text-decoration: none;color:black;"><img src="images/Shopping-Cart-icon.png" width="30px" height="30px"></a></li>

                </ul>
              
            </div>
        </nav> 
        <br>
        <br>
        </div>
        <br>
        <br>
        <div class = "cart" id = "showCart">
            <h1>Shopping Cart</h1>
            <?php 
            if(!empty($_SESSION["cart"])){
               displayCart(-1);
            }
            else{
               echo('<h99>The cart is empty please go buy something</h99>');
            }
        
        ?>
        
        </div>

    
    
    </body>






