<?php
class authentication extends CI_Model {
     function get_all_authentications()
     {
         return $this->db->query("SELECT * FROM authentications")->result_array();
     }
     function get_authentication_by_id($authentication_id)
     {
         return $this->db->query("SELECT * FROM authentications WHERE id = ?", array($authentication_id))->row_array();
     }
     function add_authentication($authentication)
     {
         $query = "INSERT INTO authentications(first_name,last_name,contact,password,created_at, updated_at) VALUES (?,?,?,?,?,?)";
         $values = array($authentication['first_name'], $authentication['last_name'], $authentication['number'], $authentication['password'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")); 
         return $this->db->query($query, $values);
     }
     function delete_authentication($id)
     {
         $query = "DELETE FROM authentications WHERE id = $id";
         return $this->db->query($query);
     }
     function get_authentications_by_contact($authentication_contact)
     {
         return $this->db->query("SELECT * FROM authentications WHERE contact = ?", array($authentication_contact))->result_array();
     }
     function edit_contact($authentication)
     {
         $query = "UPDATE authentications SET updated_at = ? WHERE id = ?";
         $values = array(date("Y-m-d, H:i:s"), $authentication[0]['id']); 
         return $this->db->query($query, $values);
     }
     

}