<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Reset</title>
	<style type="text/css">
	</style>
</head>
<body>
    <h1>Count has been reset to: <?=$this->session->flashdata('count')?> times</h1>
    <form action="count">
        <input type="submit" value="Go to count page">
    </form>
</body>
</html>