<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Edit</title>
        <link rel="stylesheet" type="text/css">
        <style>
            th, td{
                border:1px solid black;
            }
        </style>
    </head>
    <body>
        <form action="../show/<?=$id?>" method=POST>
            <a href="../../contacts">Go back</a>
            <input type="hidden" name="id" value=<?=$id?>>
            <input type="submit" value="Show" class="button">
        </form>
        <h1>Contact # <?=$id?></h1>
        <form action="../edit_confirm/<?=$id?>" method=POST>
            <input type="hidden" name="id" value=<?=$id?>>
            <label>
                Name: <input type="text" name="name">
            </label>
            <label>
                Contact Number: <input type="text" name="contact">
            </label>
            <input type="submit" value="Save">
        </form>



    </body>
</html>
