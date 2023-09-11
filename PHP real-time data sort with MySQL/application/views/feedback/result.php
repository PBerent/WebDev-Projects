<?php
date_default_timezone_set('Asia/Singapore'); 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>FeedbackForm</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <h1>Submitted Entry</h1>
        <p>Your Name:  <?=$_POST['name'];?></p>
        <p>Course Title:  <?=$_POST['title'];?></p>
        <p>Given Score (1-10):  <?=$_POST['score'];?></p>
        <p>Reason:</p>
        <p><?=$_POST['reason'];?></p>
        <a href="index">
            <input type="button" value="Return">
        </a>
    </body>
</html>