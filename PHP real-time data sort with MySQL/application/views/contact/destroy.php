<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Destroy</title>
        <link rel="stylesheet" type="text/css">
        <style>
            th, td{
                border:1px solid black;
            }
            a, .button{
                display:inline-block;
            }
        </style>
    </head>
    <body>
        <h1>Are you sure you want to delete?</h1>
        <p><?="Name: $name"?></p>
        <p><?="Number: $contact"?></p>
        <form action="../delete" method=POST>
            <a href="/">No</a>
            <input type="hidden" name="id" value=<?=$id?>>
            <input type="submit" value="Yes,Delete" class="button">
        </form>


    </body>
</html>
