<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Raffle</title>
	<style type="text/css">
	</style>
</head>
<body>
    <h1>There are <?=$chances?> lucky winners selected</h1>
    <h2><?=rand(1000000,9999999)?></h2>
    <form action="pick" method=POST>
        <input type="submit" value="Pick more">
        <input type="hidden" name="chances" value=<?=$chances?>>
    </form>
</body>
</html>