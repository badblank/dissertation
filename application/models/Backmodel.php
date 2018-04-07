<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backmodel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'pagination'));
        $this->load->helper('url');
        $this->load->database();
    }

    //添加班级
    function add_class_model()
    {
        $grade=$this->input->post("grade");
        $class=$this->input->post("class");
        $course=$this->input->post("course");
        $aID=$this->input->post("aID");
        $data = array(
            'cGrade' => $grade,
            'cName' => $course,
            'cClass' => $class,
            'tID' => $_SESSION['tID'],
            'aID' => $aID
        );
        $this->db->insert('course', $data);
    }

    //根据辅导员的名字查找辅导员的id
    function get_assistant_model($tName)
    {
        $query = $this->db->query("SELECT tID FROM tuser where tName='$tName' and tIsAssistant='1'");
        return $query->row_array();
    }

    function get_class($tID){
        $sql = "select * from course where tID=$tID";
        $res = $this->db->query($sql);
        $data["arr_class"] = $res->result_array();
		$res = $this->db->query("select * from tuser where tID = '$tID'")->result_array();
		$data['tuser'] = $res;
        return $data;
    }
    function get_student($tID,$class){
        $sql = "select * from student,course where student.sCourse=course.id and course.tID=$tID and course.cClass='$class' order by sID";
        $res = $this->db->query($sql);
        $data["arr_student"] = $res->result_array();
        return $data;
    }
    function get_absence($sID,$sCourse){
        $sql = "select * from present where sID='$sID' and sCourse='$sCourse'";
        $res = $this->db->query($sql);
        $data["arr_absence"] = $res->result_array();
        return $data;
    }

    function get_tags($sID,$sCourse){
        $sql = "select * from present where sID = '$sID' and sCourse='$sCourse'";
        $res = $this->db->query($sql);
        $data["arr_tags"] = $res->result_array();
        return $data;
    }

    //添加缺课
    function add_one_absence(){
        $sID=$this->input->post("sID");
        //echo $sID."<br>";
        $courseID=$this->input->post("courseID");
        //echo $courseID."<br>";
        $sTeacher = $this->session->userdata("tID");
        //echo $sTeacher."<br>";
        $date_time = $this->input->post("date");
        $sName = $this->input->post("sName1");
        //echo $sName ; exit();
        //echo $date_time."<br>";
        //echo $sID."--".$courseID."--".$sTeacher."--".$date_time;exit();
        $data = array(
            'sID' => $sID,
            'sName' => $sName,
            'sCourse' => $courseID,
            'sTeacher' =>$sTeacher,
            'sDeldate' => $date_time
        );
        $res=$this->db->insert('present', $data);
        return $res;
    }

	 function add_all_absence(){
    	$sIDsName=$this->input->post("check");
    	$courseID=$this->input->post("sCourse");
    	$sTeacher = $this->session->userdata("tID");
    	$date_time = $this->input->post("time");
    	$value = "";
    	foreach($sIDsName as $v){
    		$value.="(".$v.",'".$date_time."','".$courseID."','".$sTeacher."')," ;
    	}
    	$value = substr($value,0,strlen($value)-1);
    	$query = "";
    	$query = "insert into present (sID,sName,sDelDate,sCourse,sTeacher) values ".$value;
    	$query = $this->db->query($query);
    	return $query;
    }
	
    function del_one_absence(){
        $sID=$this->input->post("sID1");
        $courseID=$this->input->post("courseID1");
        $del_date=$this->input->post("del_date");
        print_r($del_date);
        echo "<br>";
        $del_date = "'".implode("','",$del_date)."'";
        echo $del_date;
        echo $sID."--".$courseID;
        $query = $this->db->query("delete from present where sID='$sID' and sCourse='$courseID' and sDelDate in ($del_date)");
        return $query;
    }

    function get_tuser_info(){
        $tID = $this->session->userdata("tID");
        $query = $this->db->query("select * from tuser where tID='$tID'");
        return $query->result();
    }

    function get_old_pwd(){
        $tID = $this->session->userdata("tID");
        $query = $this->db->query("select * from tuser where tID='$tID'");
        $row = $query->row();
        return $row->tPassword;
    }

    function update_tuser_pwd(){
        $tID = $this->session->userdata("tID");
        $pwd = md5($this->input->post("newPsw"));
        $query = $this->db->query("update tuser set tPassword='$pwd' where tID ='$tID'");
        return $query;
    }

    function get_myClass_detail($sCourse){
        $query = $this->db->query("select count(*)num,sID,sName from present where sCourse = '$sCourse' GROUP BY sID,sName;");
        return $query->result();
    }

    function get_class_name($sCourse){
        $query = $this->db->query("select * from course where id='$sCourse';");
        $row = $query->row();
        return $row->cClass;
    }


    function get_ass_class($aID){
        $query = $this->db->query("select DISTINCT cClass from course where aID='$aID'");
        return $query->result();
    }

    function get_ass_all_class($aID){
        $query = $this->db->query("select * from course where aID='$aID'");
        return $query->result();
    }

    function get_stuid_list($sCourse){
        $query = $this->db->query("select DISTINCT sID from present  where sCourse='$sCourse'");
        return $query->result();
    }

    function get_stuid_info($stu_id,$sCourse){
        $query = $this->db->query("select * from present where sID='$stu_id' and sCourse='$sCourse'");
        return $query->result();
    }
	
	function get_all_grade()
	{
		$query = $this->db->query("select DISTINCT cGrade from course order by cGrade desc");
		return $query->result();
	}
	
	function getClassByGrade($grade)
	{
		$query = $this->db->query("select DISTINCT cClass from course where cGrade = '$grade'");
		return $query->result();
	}
	
	function getCourseByGradeClass($grade, $classname)
	{
		$query = $this->db->query("select cName from course where cGrade = '$grade' and cClass= '$classname'");
		return $query->result();
	}
	
	function getStuList($grade, $classname, $cName)
	{
		$query = $this->db->query("select id from course where cGrade = '$grade' and cClass= '$classname' and cName='$cName'");
		$row=$query->row();
		$courseID=$row->id;
		$query = $this->db->query("
				select a.sID,a.sName,tName,count(b.sDelDate) as num,group_concat(b.sDelDate) as date from (select * from student where sCourse = '$courseID' ) as a
				left join (select * from present where sCourse = '$courseID') as b on a.sID=b.sID
				left join tuser on a.sAssistant=tuser.tID GROUP BY a.sID ORDER BY a.sID;
				");
		return $query->result();		
	}
	
	function getStuList_1($classname)
	{
		$query = $this->db->query("
				select a.sID,a.sName,tName,count(b.sDelDate) as num,group_concat(b.sDelDate) as date from (select * from student where sCourse = '$classname' ) as a
				left join (select * from present where sCourse = '$classname') as b on a.sID=b.sID
				left join tuser on a.sAssistant=tuser.tID GROUP BY a.sID ORDER BY a.sID;
				")->result();
//		echo "<pre>";
//		print_r($query);
//		exit;	
		return $query;
	}
	
	//教师缺勤
	function getTeacherList(){
		$query = $this->db->query("
				select a.tID,a.tName,count(b.tRecordTime) as num,group_concat(b.tRecordTime) as date,tTime from (select * from tuser where tID in (select DISTINCT tID from course)) as a
				left join (select * from tpresent where bool = 0) as b on a.tID = b.tID
				GROUP BY a.tID ORDER BY a.tID;
				");
		return $query->result();		
	}
	
	function getStudentList(){
		/*
		$query = $this->db->query("
				select a.sID,a.sName,count(a.sDelDate) as num,group_concat(a.sDelDate) as date,b.cName,b.cClass,c.tName as aName,d.tName as tName from present as a
				left join course as b on a.sCourse =  b.id
				left join tuser as c on b.aID = c.tID 
				left join tuser as d on b.tID = d.tID Group by a.sID;
		");
		*/
		$query = $this->db->query("
				select a.sID,a.sName,count(a.sDelDate) as num,convert(group_concat(a.sDelDate,' ',b.cClass,d.tName,' ',b.cName separator ' ,') using utf8) as message,c.tName as aName from present as a
				left join course as b on a.sCourse =  b.id
				left join tuser as c on b.aID = c.tID 
				left join tuser as d on b.tID = d.tID Group by a.sID;
		");
		return $query->result();
	}
	
	function get_all_teacher()
	{
		$query = $this->db->query("select tName,tID from tuser where tID in (select DISTINCT tID from course) order by convert(tName using gbk)");
		return $query->result();
	}
	
	function get_CourseBytID($tID){
		$query = $this->db->query("select cClass,cName,id from course where tID = '$tID'");
		return $query->result();
	}
	
	//添加教师上课时间
	function add_time_model(){
		$date = $this->input->post("date");
		$string = "'".implode(',',$date)."'";
		$sTeacher = $this->session->userdata("tID");
		$query = $this->db->query("update tuser set tTime = $string where tID = '$sTeacher'");
		return $query;
	}
	
	function sign_in_date(){
		$tID = $this->session->userdata("tID");
		$tName = $this->session->userdata("tName");
		$date = date("Y-m-d");
		$week = date("w");
		$sql = "select * from tuser where tTime like '%".$week."%' and tID = $tID";
		//echo $tName;exit;
		$res = $this->db->query("$sql")->result_array();
		if(count($res)!=0){
			$query = $this->db->query("select * from tpresent where tID = '$tID' and tName='$tName' and tRecordTime='$date'")->result_array();
			//echo "select * from tpresent where tID = '$tID' and tName='$tName' and tRecordTime='$date'";exit();
			if(count($query)==0){
				//echo "INSERT INTO tpresent (tID,tName,tRecordTime) VALUES ('$tID','$tName','$date')";exit;
				$query = $this->db->query("INSERT INTO tpresent (tID,tName,tRecordTime) VALUES ('$tID','$tName','$date')");
				
				return true;
			}else{
				return false;
			}
		}
	}
	
	function get_teacher_course($name){
		$query = $this->db->query("select * from teacher_course where teacher = '$name'")->result_array();
		return $query;
	}
}
