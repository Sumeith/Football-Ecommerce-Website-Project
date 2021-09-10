<?php
session_start();
$username="";
$email="";

$errors = array();

$user = "SLFootball";
  $pass = "zinqa-zn";
  $db = "SLFootball";
  $link = mysql_connect( "mars", $user, $pass );

  if ( ! $link )
     die( "Couldn't connect to MySQL" );
  mysql_select_db( $db, $link )
     or die ( "Couldn't open $db: ".mysql_error() );

$username = mysql_real_escape_string($_POST['username'], $link);
$email = mysql_real_escape_string($_POST['email'], $link);
$password_1 = mysql_real_escape_string( $_POST['password_1'], $link);
$password_2 = mysql_real_escape_string($_POST['password_2'], $link);
//check information

/*
if(empty($username) ){
  array_push($errors, "username required");
}
if(empty($email) ){
  array_push($errors, "email required");
}
if(empty($password_1) ){
  array_push($errors, "password required");
}
if($password_2 != $password_1){
  array_push($errors, "passwords are not matching");
}*/

$user_check_query = "SELECT * FROM user WHERE user_name = '$username' OR email = '$email' LIMIT 1";
$results = mysql_query($user_check_query, $link);
$user = mysql_fetch_assoc($results);

if($user){
    if($user['username'] === $username){array_push($errors, "username taken, oops");}
    if($user['email'] === $email){array_push($errors, "email already in use, oops");}
}

//register user

if(count($errors == 0)){
    $password = md5($password_1);
    $query = "INSERT INTO user(user_name, email ,password) VALUES ('$username', '$email', '$password')";
    mysql_query($query, $link);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are logged in";
    header("location:index.php");
}
//login user
if(isset($_POST['login'])){
    $username = mysql_real_escape_string($_POST['username'], $link);
    $password = mysql_real_escape_string($_POST['password_1'], $link);

    if(empty($username)){array_push($errors, "username required");}
    if(empty($password)){array_push($errors, "password required");}
    if(count($errors) == 0){
        $password = md5($password);
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $results = mysql_query($link, $query);

        if(mysql_num_rows($results)){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "logged in succesfully";
            header("location:index.php");

        }else {array_push($errors, "oopsies, wrong username or password");}


    }
}


?>
