<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

    public function index()
    {
        $this->load->model("course");
        $results = $this->course->get_all_students();
        $data['results'] = $results;
        $this->load->view('students',$data);
        $this->load->view('partials/students',$data);
    }
    public function filter()
    {
        $this->load->model("course");
        $filter_data = $this->input->get();
        $course = $filter_data['course'];
        $gender = $filter_data['gender'];
        $all_genders_selected = false;
        if(!is_array($gender) || empty($gender)){
            $all_genders_selected = true;
        }
        if($course == 1){
            if ($all_genders_selected || count($gender) == 2) {
                $results = $this->course->get_all_students();
            } 
            else if($gender[0] == "Male") {
                $results = $this->course->get_students_by_gender_male();
            }
            else if($gender[0] == "Female"){
                $results = $this->course->get_students_by_gender_female();
            }
        }
        else{
            if ($all_genders_selected || count($gender) == 2) {
                $results = $this->course->get_students_by_course($course);
            } 
            else if ($gender[0] == "Male") {
                $results = $this->course->get_students_by_course_male($course);
            }
            else if ($gender[0] == "Female") {
                $results = $this->course->get_students_by_course_female($course);
            }
        }
        $data['results'] = $results;
        
        $this->load->view('partials/students',$data);
    }

}