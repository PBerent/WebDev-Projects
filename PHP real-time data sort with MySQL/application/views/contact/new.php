<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>New contact</title>
        <link rel="stylesheet" type="text/css">
        <style>
            th, td{
                border:1px solid black;
            }
            a, form input{
                display:block;
                margin-bottom:10px;
            }
        </style>
    </head>
    <body>
        <a href = "../contacts">Go back</a>
        <h1>Add new contact</h1>
        <form action="add" method=POST>
            <label>
                Name: <input type="text" name="name">
            </label>
            <label>
                Contact Number: <input type="text" name="contact">
            </label>
            <input type="submit" value="Create">
        </form>


    </body>
</html>
