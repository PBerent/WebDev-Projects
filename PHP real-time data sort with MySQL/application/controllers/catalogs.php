<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogs extends CI_Controller {

	public function index()
	{
        $this->load->model("product");
        $results = $this->product->get_all_products();
        $cart = 0;
        foreach($results as $result){
            if($result['qty']>0){
                $cart += 1;
            }
        }
        $cart = array(
            'cart' => $cart
        );
        $this->load->view('catalog/index',$cart);
	}

    public function add()
    {
        $this->load->model("product");
        $array = array(
            "id" => $this->input->post('id'),
            "qty" => $this->input->post('qty')
        );
        $array = $this->security->xss_clean($array);
        $this->product->add_product_by_id($array);
        redirect('../');
    }

}

