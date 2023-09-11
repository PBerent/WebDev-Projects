<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

	public function index()
	{
        $this->load->model("contact");
        $this->load->view('contact/index');
	}

    public function add()
    {
        $this->load->model("contact");
        $form_values = $this->input->post();
        if(empty($form_values['name'])){
            echo "Name cannot be blank";
        }
        if(empty($form_values['contact'])){
            echo "Contacts cannot be blank";
        }
        else{
            $add_contact = $this->contact->add_contact($form_values);
        }
        redirect('../contacts');
    }

    public function destroy($id)
    {
        $this->load->model("contact");
        $array = array(
            "id" => $this->input->post('id'),
            "name" => $this->input->post('name'),
            "contact" => $this->input->post('contact'),
        );
        $this->load->view('contact/destroy', $array);
    }

    public function delete()
    {
        $this->load->model("contact");
        $id = $this->input->post('id');
        $this->contact->delete_contact($id);
        redirect('/');
    }

    public function new()
    {
        $this->load->view('contact/new');
    }

    public function show($id)
    {
        $this->load->model("contact");
        $array = $this->contact->get_contact_by_id($id);
        $this->load->view('contact/show',$array);
    }

    public function edit($id)
    {
        $this->load->model("contact");
        $array = $this->contact->get_contact_by_id($id);
        $this->load->view('contact/edit',$array);
    }

    public function edit_confirm($id)
    {
        $this->load->model("contact");
        $array = array(
            "id" => $id,
            "name" => $this->input->post('name'),
            "contact" => $this->input->post('contact'),
        );
        $this->contact->edit_contact($array);
        redirect('/');
    }
}

