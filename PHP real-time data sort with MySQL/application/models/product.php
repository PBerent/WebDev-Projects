<?php
class product extends CI_Model {
     function get_all_products()
     {
         return $this->db->query("SELECT * FROM products")->result_array();
     }
     function get_product_by_id($product_id)
     {
         return $this->db->query("SELECT * FROM products WHERE id = ?", array($product_id))->row_array();
     }
     function add_product($product)
     {
         $query = "INSERT INTO products(first_name,last_name,contact,password,created_at, updated_at) VALUES (?,?,?,?,?,?)";
         $values = array($product['first_name'], $product['last_name'], $product['number'], $product['password'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")); 
         return $this->db->query($query, $values);
     }
     function delete_product($array)
     {
        $query = "UPDATE products SET qty = ?, updated_at = ? WHERE id = ?";
        $values = array(0, date("Y-m-d, H:i:s"), $array['id']); 
        return $this->db->query($query, $values);
     }
     function get_products_by_contact($product_contact)
     {
         return $this->db->query("SELECT * FROM products WHERE contact = ?", array($product_contact))->result_array();
     }
     function add_product_by_id($array)
     {
         $query = "UPDATE products SET qty = ?, updated_at = ? WHERE id = ?";
         $values = array($array['qty'], date("Y-m-d, H:i:s"), $array['id']); 
         return $this->db->query($query, $values);
     }
     

}