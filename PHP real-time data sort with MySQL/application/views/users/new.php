<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Users</title>
	<style type="text/css">
	</style>
</head>
<body>
	<h1>New Users</h1>
    <form action = "create" method=POST>
        <label>
            First Name: <input type="text", name="first_name">
        </label> 
        <label>
            Last Name: <input type="text", name="last_name">
        </label> 
        <label>
            Email: <input type="text", name="email">
        </label> 
        <input type="submit" value="submit">
    </form>
</body>
</html>