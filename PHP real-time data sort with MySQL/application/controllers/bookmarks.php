<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmarks extends CI_Controller {

	public function index()
	{
        $this->load->model("bookmark");
        $this->load->view('bookmark/index');
	}

    public function add()
    {
        $this->load->model("bookmark");
        $form_values = $this->input->post();
        $add_bookmark = $this->bookmark->add_bookmark($form_values);
        redirect('../contacts');
    }

    public function destroy($id)
    {
        $this->load->model("bookmark");
        $array = array(
            "id" => $this->input->post('id'),
            "folder" => $this->input->post('folder'),
            "name" => $this->input->post('name'),
            "url" => $this->input->post('url')
        );
        $this->load->view('bookmark/destroy', $array);
    }

    public function delete()
    {
        $this->load->model("bookmark");
        $id = $this->input->post('id');
        $this->bookmark->delete_bookmark($id);
        redirect('/');
    }
}

