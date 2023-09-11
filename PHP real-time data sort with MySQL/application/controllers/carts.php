<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_Controller {

	public function index()
	{
        $this->load->model("product");
        $results = $this->product->get_all_products();
        $total = 0;
        foreach($results as $result)
        {
            $total += $result['qty'] * $result['price'];
        }
        $total = array(
            'total' => $total
        );
        $this->load->view('catalog/cart',$total);
	}

    public function destroy()
    {
        $this->load->model("product");
        $array = array(
            "id" => $this->input->post('id')
        );
        $array = $this->security->xss_clean($array);
        $this->product->delete_product($array);
        redirect('../carts');
    }

}

