<?php
class Bookmark extends CI_Model {
     function get_all_bookmarks()
     {
         return $this->db->query("SELECT * FROM bookmarks")->result_array();
     }
     function get_bookmark_by_id($bookmark_id)
     {
         return $this->db->query("SELECT * FROM bookmarks WHERE id = ?", array($bookmark_id))->row_array();
     }
     function add_bookmark($bookmark)
     {
         $query = "INSERT INTO bookmarks(folder,name,url,created_at, updated_at) VALUES (?,?,?,?,?)";
         $values = array($bookmark['folder'], $bookmark['name'], $bookmark['url'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")); 
         return $this->db->query($query, $values);
     }
     function delete_bookmark($id)
     {
         $query = "DELETE FROM bookmarks WHERE id = $id";
         return $this->db->query($query);
     }
}