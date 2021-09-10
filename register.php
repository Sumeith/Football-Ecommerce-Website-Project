<?php include("server.php")?>
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
              <li><a href="index.html">Home</a></li>
                <li><a href="catalohue.php">Products</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="account.html">Account</a></li>
            </ul>
        </nav>
             <img src="Images/Shopping-Cart-icon.png" width="30px" height="30px">
    </div>
    <div class="row">
        <div class="col">
            <h1>Register</h1>
            <p>Feel what it is like to save like Oblak with great deals as soon as you complete registration.</p>
            <div class="in">
                <form action="register.php" method="POST">
                    <?php include('errors.php')?>
                    
                    <div>
                         <label for="username"> UserName :</label>
                         <input type="username" required placeholder="username" name="username">
                    </div>
                    <div>
                         <label for="email"> Email :</label>
                         <input type="email" required placeholder="email" name="email">
                    </div>
                    <div>
                         <label for="password"> Password :</label>
                         <input type="password" required name="password_1">
                    </div>
                    <div>
                         <label for="password"> Confirm Password :</label>
                         <input type="password" required name="password_2">
                    </div>
                   
                   <button type="submit">Submit</button>
                    <p> Already a user?<a href="login.php">login</a></p>
                </form>
            </div>
           
        </div>
        <div class="col">
            <img src="images/registerWallpaper.jpg">
        </div>
    </div>
    
    
    </div>
   
    </div>
    
</body>
</html>