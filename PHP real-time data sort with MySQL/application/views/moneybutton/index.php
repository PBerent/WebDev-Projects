<?php

    if(!isset($_SESSION['money']))
    {
        $_SESSION['money'] = 500;
    }
    if(!isset($_SESSION['chance']))
    {
        $_SESSION['chance'] = 10;
    }

date_default_timezone_set('Asia/Singapore'); 
$date=date(" m/d/Y h:i:s A");
    if(!isset($_SESSION['msg']))
    {
        $_SESSION['msg'][] = "[$date] Welcome to Money Button Game, risk taker! All you need to do is to push buttons to try your luck. You have free 10 chances with inital money of 500. Choose wisely and good luck!";
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MoneyButton</title>
        <style>
            .bets{
                display:inline-block;
                outline:2px solid black;
                margin:10px;
            }
            div{
                overflow:scroll;
            }
            .positive{
                color:green;
            }
            .negative{
                color:red;
            }
        </style>
    </head>
    <body>
        <h1>Your Money:<?=$_SESSION['money']?></h1>
        <h2>Chances left:<?=$_SESSION['chance']?></h2>
        <form action="process" method=POST>
        <input type="hidden" name="risk" value="reset">
        <input type="submit" value="reset">
        </form>

        <form class="bets" action="process" method=POST>
            <input type="hidden" name="risk" value="low" />
            <h3>Low Risk</h3>
            <input type="submit" value="Bet"/>
            <p>by -25 up to 100</p>
        </form>

        <form class="bets" action="process" method=POST>
            <input type="hidden" name="risk" value="moderate" />
            <h3>Moderate Risk</h3>
            <input type="submit" value="Bet"/>
            <p>by -100 up to 1000</p>
        </form>

        <form class="bets" action="process" method=POST>
            <input type="hidden" name="risk" value="high" />
            <h3>High Risk</h3>
            <input type="submit" value="Bet"/>
            <p>by -500 up to 2500</p>
        </form>

        <form class="bets" action="process" method=POST>
            <input type="hidden" name="risk" value="severe" />
            <h3>Severe Risk</h3>
            <input type="submit" value="Bet"/>
            <p>by -3000 up to 5000</p>
        </form>

        <h4>Game Host:</h4>
        <div>
<?php
    $msgs = ($this->session->userdata('msg'));
    foreach($msgs as $msg)
    {
        echo $msg;
    }
?>
        </div>
    </body>
</html>