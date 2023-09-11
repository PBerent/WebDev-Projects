<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Singapore");
$curr = date("Y/m/d H:i:s");
$next = date('Y/m/d', strtotime("+1 day"));
$today = date('M/d/Y');
$timeleft = strtotime($next) - strtotime($curr);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Countdown</title>
	<style type="text/css">
	</style>
</head>
<body>
    <h1>Countdown before day ends!</h1>
    <p><?=$timeleft?> seconds</p>
    <p><?=$today?></p>
</body>
</html>