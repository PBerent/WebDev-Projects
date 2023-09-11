<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoneyButton extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
        session_start();
        $this->load->view('moneybutton/index');
	}

    public function process()
	{
        $date=date(" m/d/Y h:i:s A");
        if(!isset($_SESSION['money']))
        {
            $_SESSION['money'] = 500;
        }
        if(!isset($_SESSION['chance']))
        {
            $_SESSION['chance'] = 10;
        }
        $stakes = array(
            "low" => rand(-25,100),
            "moderate" => rand(-100,1000),
            "high" => rand(-500,2500),
            "severe" => rand(-3000,5000),
        );
    
        if($_POST['risk']=="reset")
        {
            $_SESSION['money'] = 500;
            $_SESSION['chance'] = 10;
            $_SESSION['msg'] = array();
        }
    
        if($_SESSION['money']<=0 || $_SESSION['chance']<=0)
        {
            array_push($_SESSION['msg'],"<p>GAME OVER</p>");
        }
        else
        {
            foreach($stakes as $stake => $amount)
            {
                if($_POST["risk"] == $stake)
                {
                    $_SESSION['chance'] --;
                    $_SESSION['money'] += $amount;
                        if($amount>0)
                        {
                            $earning="positive";
                        }
                        else if($amount<0)
                        {
                            $earning="negative";
                        }
                        else
                        {
                            $earning="none";
                        }
                    array_push($_SESSION['msg'],"<p class='$earning'>'$date' You pushed \"$stake risk\". Value is $amount. Your current money now is ".$_SESSION['money']. " with ".$_SESSION['chance']." chance(s) left</p>");
                }
        
            }
        }
        $this->load->view('moneybutton/index');
	}

    

}

