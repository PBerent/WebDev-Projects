<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Show</title>
        <link rel="stylesheet" type="text/css">
        <style>
            th, td{
                border:1px solid black;
            }
        </style>
    </head>
    <body>
            <a href="../../contacts">Go back</a>
            <a href="../../contacts/edit/<?=$id?>">Edit</a>
        </form>
        <h1>Contact # <?=$id?></h1>
        <p><?="Name: $name"?></p>
        <p><?="Number: $contact"?></p>



    </body>
</html>
