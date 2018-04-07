<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'pagination'));
        $this->load->helper('url');
        $this->load->database();
    }
    /*登录处理，等到教师信息*/
    function get_user_info(){
        $username=$this->input->post("username");
        $password=md5($this->input->post("password"));
		$query = $this->db->query("select * from tuser where tName = '$username' and tPassword = '$password'")->result_array();
    	return $query;
    }
    
    /*根据教师ID获取班级*/
   	function get_course_by_tid($tid){
   		$query = $this->db->query("select * from course where tID = '$tid'")->result_array();
   		return $query;
   	}
   	
   	/*根据班级ID获取班级学生信息*/
   	public function get_student_by_cid($cid){
   		$query = $this->db->query("select * from student where sCourse = '$cid'")->result_array();
   		return $query;
   	}
   	
   	/*根据班级ID获取缺席学生信息*/
   	public function get_absence_student_by_cid($cid){
   		$query = $this->db->query("select * from present where sCourse = '$cid'")->result_array();
   		return $query;
   	}
   	
    function get_all_student(){
    	$query = $this->db->query("select * from student")->result_array();
    	return $query;
    }
    
    function get_all_teacher(){
    	$query = $this->db->query("select * from  tuser")->result_array();
    	return $query;
    }
    function get_all_course(){
    	$query = $this->db->query("select * from  course")->result_array();
    	return $query;
    }
    function get_all_present(){
    	$query = $this->db->query("select * from  present")->result_array();
    	return $query;
    }
}