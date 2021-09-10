<?php
session_start();
if (isset($_SESSION["manager"])) {
    header("Location: admin.php"); 
    exit();
}
?>
<?php
if(isset($_POST["admin_name"]) && isset($_POST["password"])) {

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["admin_name"]); 
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); 
    //database connection
    
  $user = "SLFootball";
  $pass = "zinqa-zn";
  $db = "SLFootball";
  $link = mysql_connect( "mars", $user, $pass );

  if ( ! $link )
     die( "Couldn't connect to MySQL" );
  mysql_select_db( $db, $link )
     or die ( "Couldn't open $db: ".mysql_error() );
    
    $sql = mysql_query("SELECT admin_id FROM admin WHERE admin_name='$manager' AND password='$password' LIMIT 1");
    $existCount = mysql_num_rows($sql); 
    if ($existCount == 1) { 
	     while($row = mysql_fetch_array($sql)){ 
             $id = $row["admin_id"];
		 }
		 $_SESSION["id"] = $id;
		 $_SESSION["manager"] = $manager;
		 $_SESSION["password"] = $password;
		 header("location: admin.php");
         exit();
    } else {
		echo 'That information is incorrect, try again <a href="admin.php">Click Here</a>';
		exit();
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SLF Admin Login</title>
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
                <li><a href="index.html">Home</a></li>
              </ul>
            </div> 
           
            </nav>
            
            
         </div>
       </div>
     </div> 
    
    
    <div class="row">
    <div class="col">
    <h1>LOGIN HERE WITH YOUR ADMIN DETAILS</h1>
        <form id="form1" name="form1" method="post" action="admin_login.php">
              <label>User Name:</label>
              <input name="admin_name" type="text" id="admin_name" size="40" />
       <br>
       <br>
              <label>Password:</label>
              <input name="password" type="password" id="password" size="40" />
       <br>
       <br>
       <br>
              <input type="submit" name="button" id="button" value="Log In" />
      </form>
 
        </div>
        <div class="col">
            <img src="images/good%20one.jpg">
        </div>
    </div> 
</body>
</html>