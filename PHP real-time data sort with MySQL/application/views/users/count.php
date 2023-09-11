<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Count</title>
	<style type="text/css">
	</style>
</head>
<body>
    <h1>You have visited this site <?=$this->session->flashdata('count')?> times</h1>
    <form action="reset">
        <input type="submit" value="Reset Count">
    </form>
</body>
</html>