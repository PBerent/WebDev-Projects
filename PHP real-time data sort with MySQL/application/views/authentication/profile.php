<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Profile</title>
        <link rel="stylesheet" type="text/css">
        <style>
        </style>
    </head>
    <body>
        <h1>Basic Information</h1>
        <p>First Name:<?=$first_name;?>
        <p>Last Name:<?=$last_name;?>
        <p>Contact Number:<?=$contact;?>
        <p>Last failed login:<?=$updated_at;?>
        <p><a href="../">Log out</a></p>
    </body>
</html>
