<?php
class Api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Api_model");
        /*$this->session->set_userdata("tID","1");
        $this->session->set_userdata("isAssistant","0");
        $this->session->set_userdata("hasClass","1");
        $this->session->set_userdata("hasStudents","0");*/
    }
    
    /**
     * 接口
     */
    
    /*登录*/
   	public function login(){
   		$type = $this->uri->segment(3);
   		$userinfo = $this->Api_model->get_user_info();
   		if (empty($userinfo)) {
   				$result['code']	=400; 
				$result['message']	="用户名密码不正确";
				$result['data']="";
				//return $result;
				$this->get_type($type,$result);
		}else {
			$result['code']		=200;
			$result['message']	="请求成功";
			$result['data']		=$userinfo;
			$this->get_type($type,$result);
			//return $result;
		}
   	}
   	
   	/*根据教师ID获取班级*/
   	public function get_course_by_tid(){
   		$tid  = $this->uri->segment(3);
   		$type = $this->uri->segment(4);
   		$course = $this->Api_model->get_course_by_tid($tid);
   		if (empty($course)) {
   				$result['code']	=400; 
				$result['message']	="请求数据失败 原因传入参数不正确\数据库表内数据为空";
				$result['data']="";
				//return $result;
				$this->get_type($type,$result);
		}else {
			$result['code']		=200;
			$result['message']	="请求数据成功";
			$result['data']		=$course;
			$this->get_type($type,$result);
			//return $result;
		}
   		
   	}
   	
   	/*根据班级ID获取班级学生信息*/
   	public function get_student_by_cid(){
   		$cid  = $this->uri->segment(3);
   		$type = $this->uri->segment(4);
   		$students = $this->Api_model->get_student_by_cid($cid);
   		if (empty($students)) {
   				$result['code']	=400; 
				$result['message']	="请求数据失败 原因传入参数不正确\数据库表内数据为空";
				$result['data']="";
				//return $result;
				$this->get_type($type,$result);
		}else {
			$result['code']		=200;
			$result['message']	="请求数据成功";
			$result['data']		=$students;
			$this->get_type($type,$result);
			//return $result;
		}
   	}
   	
   	/*根据班级ID获取缺席学生信息*/
   	public function get_absence_student_by_cid(){
   		$cid  = $this->uri->segment(3);
   		$type = $this->uri->segment(4);
   		$students = $this->Api_model->get_absence_student_by_cid($cid);
   		if (empty($students)) {
   				$result['code']	=400; 
				$result['message']	="请求数据失败 原因传入参数不正确\数据库表内数据为空";
				$result['data']="";
				//return $result;
				$this->get_type($type,$result);
		}else {
			$result['code']		=200;
			$result['message']	="请求数据成功";
			$result['data']		=$students;
			$this->get_type($type,$result);
			//return $result;
		}
   	}
    
    
    /* 得到全体学生*/
    public function get_all_student(){
    	$type = $this->uri->segment(3);
    	$result = $this->Api_model->get_all_student();
    	$this->get_type($type,$result);
   	}
   	
   	/*得到全体教师*/
   	public function get_all_teacher(){
   		$type = $this->uri->segment(3);
    	$result = $this->Api_model->get_all_teacher();
    	$this->get_type($type,$result);
   	}
   	/*得到所有已创建班级*/
   	public function get_all_course(){
   		$type = $this->uri->segment(3);
    	$result = $this->Api_model->get_all_course();
    	$this->get_type($type,$result);
   	}
   	/*得到全体教师*/
   	public function get_all_present(){
   		$type = $this->uri->segment(3);
    	$result = $this->Api_model->get_all_present();
    	$this->get_type($type,$result);
   	}
   	
   	
   	/**
   	 * 返回数据格式处理
   	 */
   	public function get_type($type,$result){
   		if($type=="array"){
    		p($result);
    	}else{
    		$result = json_encode($result);
    		echo $result;
    	}
   	}
   	
   	/**
	 * curl请求并获取数据
	 * param@ $url
	 * param@ $type = 'get'
	 * param@ $res = 'json'
	 * param@ $arr = ''
	 * retrun arra()
	 */
	function get_curl($url,$type = 'get', $res = 'json', $arr=''){
		//1.初始化curl
		$ch = curl_init();
		//2.设置curl的参数
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		if($type == 'post' ){
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
		}
		//3.采集
		$output = curl_exec($ch);
		p($output);exit;
		//curl_close($ch);
		
		if($res == 'json'){
			if(curl_errno($ch)){
				//请求失败，返回错误信息
				var_dump(curl_error($ch));
			}else{
				//请求成功，返回数据
				return json_decode($output,true);
			}	
		}else if($res == 'array'){
			p($output);
		}
	}
	
	public function test(){
		$url 	= "http://localhost/absence/index.php/api/login/array";
		$type 	= "post";
		$res 	= "json";
		$data['username']		= "段";
		$data['password']	="12456";
		$this->get_curl($url,$type,$res,$data);
	}
}