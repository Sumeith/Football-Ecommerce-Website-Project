<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SLFootball</title>
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
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.html">Products</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="account.html">Account</a></li>
            </ul>
        </nav>
             <img src="images/Shopping-Cart-icon.png" width="30px" height="30px">
    </div>
    <div class="row">
        <div class="col">
            <h1>Log-In</h1>
            <p>Login now and maybe we will THROW-IN some vouchers.</p>
            <div class="in">
                <form action="login.php" method="post">
                    <div>
                         <label for="email"> Email :</label>
                         <input type="email" required placeholder="username">
                    </div>
                    <div>
                         <label for="password"> Password :</label>
                         <input type="password" required placeholder="password">
                    </div>
                   
                   <button type="submit" name="login">Submit</button>
                   <p> Not a user?<a href="register.php">Register for free</a></p>
                   <p> Are you an admin?<a href="admin_login.php">Login as admin</a></p> 
               </form> 
    
            </div>
           
            
        </div>
        <div class="col">
            <img src="images/loginWallpaper.jpg">
        </div>
    </div>
    
    
    </div>
   
    </div>
    
    
    
   
    
   

    
</body>
</html