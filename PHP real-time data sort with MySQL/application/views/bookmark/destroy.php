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
            a, form input{
                display:inline-block;
            }
            input{
                color:red;
            }
        </style>
    </head>
    <body>
        <h1>Are you sure you want to delete?</h1>
        <p><?="$folder / $name ($url)"?></p>
        <a href="/">No</a>
        <form action="delete" method=POST>
            <input type="hidden" name="id" value=<?=$id?>>
            <input type="submit" value="Yes,Delete">
        </form>


    </body>
</html>
