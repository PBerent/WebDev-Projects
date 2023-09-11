<?php
class Contact extends CI_Model {
     function get_all_contacts()
     {
         return $this->db->query("SELECT * FROM contacts")->result_array();
     }
     function get_contact_by_id($contact_id)
     {
         return $this->db->query("SELECT * FROM contacts WHERE id = ?", array($contact_id))->row_array();
     }
     function add_contact($contact)
     {
         $query = "INSERT INTO contacts(name,contact,created_at, updated_at) VALUES (?,?,?,?)";
         $values = array($contact['name'], $contact['contact'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")); 
         return $this->db->query($query, $values);
     }
     function delete_contact($id)
     {
         $query = "DELETE FROM contacts WHERE id = $id";
         return $this->db->query($query);
     }

     function edit_contact($contact)
     {
         $query = "UPDATE contacts SET `name` = ?, contact = ?, updated_at = ? WHERE id = ?";
         $values = array($contact['name'], $contact['contact'], date("Y-m-d, H:i:s"), $contact['id']); 
         return $this->db->query($query, $values);
     }
}