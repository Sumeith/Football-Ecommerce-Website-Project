<?php session_start();
   if(!isset($_SESSION['manager'])){
       header("Location: admin_login.php");
       exit();
   }
   $admin_id = preg_replace('#[^0-9]#i', '', $_SESSION["id"]);
   $admin_name = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); 
   $password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); 

    //database connection
    
  $user = "SLFootball";
  $pass = "zinqa-zn";
  $db = "SLFootball";
  $link = mysql_connect( "mars", $user, $pass );

  if ( ! $link )
     die( "Couldn't connect to MySQL" );
  mysql_select_db( $db, $link )
     or die ( "Couldn't open $db: ".mysql_error() );

 // $sql = mysql_query("SELECT * FROM admin WHERE admin_id='$admin_id' AND admin_name='$admin_name' AND password='$password'");
 //$existCount = mysql_num_rows($sql);//extra security 
 // if ($existCount == 0) { 
	// echo "Your login session data is not on record in the database.";
   //  exit();}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SLFootball Admin</title>
    <link rel="stylesheet" href="stylea.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <div class="header">
    
    <div class="container">
         <div class="navbar">
        <div class="logo">
            <a href="index.php"><img src="images/logo.jpg" width="400px"></a>
        </div>
             <nav>
            
             
            <div class = "menu" id = "MenuItems">
              <ul >   
                <li><a href="index.php">Home</a></li>
                <li><a href="inventoryManager.php">Inventory</a></li>
                <li><a href="fanZone.html">Customer Service</a></li>
                <li><a href="inventoryList.php">Reports</a></li>
              </ul>
            </div> 
           
            </nav>
            
            
         </div>
       </div>
     </div> 
    
    
    <div class="row">
        <div class="col">
            <h1>WELCOME TO THE ADMIN PAGE</h1>
             <a href="inventoryManager.php" class="btn"> Manage Inventory &#9758;</a><br>
             <a href="inventoryList.php" class="btn"> View Reports &#9758;</a><br>
             <a href="fanZone.html" class="btn"> Customer Service &#9758;</a><br>
        </div>
        <div class="col">
            <img src="images/good%20one.jpg">
        </div>
    </div> 
    </body>
</html>