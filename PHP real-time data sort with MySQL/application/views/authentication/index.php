<?php
date_default_timezone_set('Asia/Singapore'); 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bookmark</title>
        <link rel="stylesheet" type="text/css">
        <style>
            th, td{
                border:1px solid black;
            }
            p{
                color:red;
            }
        </style>
    </head>
    <body>
<?php 
        if(!empty($_SESSION['error'])){

?>
        <p><?=$_SESSION['error']?></p>
<?php
                unset($_SESSION['error']);
            }
?>
<?php 
        if(!empty($_SESSION['success'])){
            $msgs = $_SESSION['success'];
            foreach($msgs as $msg){
?>
        <p><?=$msg?></p>
<?php
            }
                unset($_SESSION['success']);
            }
?>
        <h1>Authentication 2</h1>
        <h2>Register</h2>
        <form action="authentications/add" method=POST>
            <input type="hidden" name="action" value="register">
            <label>
                First name:<input type="text" name="first_name">
            </label>
            <label>
                Last name:<input type="text" name="last_name" >
            </label>
            <label>
                Contact number:<input type="text" name="number" >
            </label>
            <label>
                Email address:<input type="text" name="email" >
            </label>
            <label>
                Password:<input type="password" name="password" >
            </label>
            <label>
                Confirm Password:<input type="password" name="password_confirm" >
            </label>
            <input type="submit" value="Register">
        </form>


        <h2>Login</h2>
        <form action="authentications/login" method=POST>
            <input type="hidden" name="action" value="login">
            <label>
                Contact Number:<input type="text" name="number" >
            </label>
            <label>
                Password:<input type="password" name="password" >
            </label>
            <input type="submit" value="Login" >
        </form>
    </body>
</html>
