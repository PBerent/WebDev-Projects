<?php
date_default_timezone_set('Asia/Singapore'); 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>FeedbackForm</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <style>
            p{
                display:block;
                font-weight:bold;
            }

            label{
                display:block;
                margin:10px;
                font-weight:bold;
            }

            img{
                height:150px;
                width:150;
            }
        </style>
    </head>
    <body>
        <h1>Feedback Form</h2>
        <form action="feedback/result" method=POST>
    
        <label>
            Your Name (optional): <input type="text" name="name">
        </label>
        <label>
            Course Title: 
            <select name="title">
                <option value="PHP Track">PHP Track</option>
                <option value="JS Track">JS Track</option>
                <option value="QA Track">QA Track</option>
            </select>
        </label>
        <label>
            Given Score (1-10):
            <select name="score">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </label>
        <label>
            Reason: <input type="text" name="reason">
        </label>
        <input type="submit">
        </form>
    </body>
</html>