<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentications extends CI_Controller {

	public function index()
	{
        $this->load->model("authentication");
        $this->load->view('authentication/index');
	}

    public function add()
    {
        $this->load->library("form_validation");
        $this->load->model("authentication");
        $this->form_validation->set_rules('first_name', 'First name:', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last name:', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('number', 'Contact number:', 'trim|required|min_length[11]|max_length[11]');
        $this->form_validation->set_rules('password', 'Password:', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password:', 'trim|required|matches[password]');
        $duplicates = $this->authentication->get_authentications_by_contact($this->input->post('number'));
        if($this->form_validation->run() === FALSE)
        {
            $_SESSION['error'] = (validation_errors());
            redirect('../');
        }
        if(count($duplicates) > 0)
        {
            $_SESSION['error'] = (validation_errors())."Number is already taken";
            redirect('../');
        }
        else
        {
            $form_values = $this->input->post();
            $add_authentication = $this->authentication->add_authentication($form_values);
        }

    }

    public function login()
    {
        $this->load->model("authentication");
        $results = $this->authentication->get_authentications_by_contact($this->input->post('number'));
        if(count($results) == 1)
        {
            if($results[0]['password'] == $this->input->post('password'))
            {
                $_SESSION['user'] = $results[0]['first_name'];
                $results = array(
                    "first_name" => $results[0]['first_name'],
                    "last_name" => $results[0]['last_name'],
                    "contact" => $results[0]['contact'],
                    "password" => $results[0]['password'],
                    "updated_at" => $results[0]['updated_at']
                );
                $this->load->view('authentication/profile',$results);
            }
            else
            {
                $_SESSION['error'] = "Login failed";
                $this->authentication->edit_contact($results);
                redirect('../');
            }
        }
        else
        {
            $_SESSION['error'] = "Login failed (no such user)";
            redirect('../');
        }
    }
    // public function add()
    // {
    //     $this->load->model("authentication");
    //     $form_values = $this->input->post();
    //     if(empty($form_values['name'])){
    //         echo "Name cannot be blank";
    //     }
    //     else{
    //         $add_authentication = $this->authentication->add_authentication($form_values);
    //     }
    //     redirect('../authentications');
    // }
    //$this->load->library("form_validation");

}

