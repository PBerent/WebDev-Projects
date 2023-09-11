<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function index()
	{
        $this->load->view('feedback/index');
	}

    public function result()
    {
        if(count($this->input->post()) > 0)
        {
            $this->load->view('feedback/result');
        }
        else
        {
            redirect('/index');
        }
    }



    

}

