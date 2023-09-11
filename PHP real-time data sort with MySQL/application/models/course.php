<?php
class course extends CI_Model {


    function get_all_students(){
        return $this->db->query("SELECT * FROM students")->result_array();
    }
    function get_students_by_gender_male(){
        return $this->db->query("SELECT * FROM students WHERE gender = 'Male'")->result_array();
    }
    function get_students_by_gender_female(){
        return $this->db->query("SELECT * FROM students WHERE gender = 'Female'")->result_array();
    }

//With course filter
    function get_students_by_course($course){
        return $this->db->query("SELECT * FROM students WHERE course = ?", array($course))->result_array();
    }
    function get_students_by_course_male($course){
        return $this->db->query("SELECT * FROM students WHERE course = ? AND gender = 'Male'", array($course))->result_array();
    }
    function get_students_by_course_female($course){
        return $this->db->query("SELECT * FROM students WHERE course = ? AND gender = 'Female'", array($course))->result_array();
    }
}   