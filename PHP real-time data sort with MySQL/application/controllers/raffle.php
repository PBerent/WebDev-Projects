<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raffle extends CI_Controller {

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
        $chances = array('chances'=>'0');
		$this->load->view('raffle/index',$chances);
	}

    public function pick()
	{
        $chances = ($this->input->post('chances'));
        $chances += 1;
        $chances = array('chances' => $chances);
		$this->load->view('raffle/index',$chances);
	}


}

