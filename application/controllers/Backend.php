<?php
class Backend extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('session','pagination'));
        $this->load->helper(array('url','form','date'));
        $this->load->database();
        $ok = $this->session->userdata('admin');
        if (!isset($ok) || $ok != 'ok') {
            redirect("Login/index");
        }
        $className = $this->session->userdata("className");
        if(!isset($className)){
            $this->session->set_userdata("className",0);
        }
        /*$this->session->set_userdata("tID","1");
        $this->session->set_userdata("isAssistant","0");
        $this->session->set_userdata("hasClass","1");
        $this->session->set_userdata("hasStudents","0");*/
    }

	//超级管理员界面
	function super_index_pre()
	{
		$this->load->model("Backmodel");
		$this->load->view("Backend/super_index_pre");
	}
	
	function super_index()
	{
		$this->load->model("Backmodel");
		$data['grade']=$this->Backmodel->get_all_grade();
		$this->load->view("Backend/super_index", $data);
	}
	
	function super_index_1(){
		$this->load->model("Backmodel");
		$data['teacher']=$this->Backmodel->get_all_teacher();
		$this->load->view("Backend/super_index_1", $data);
	}
	
	function get_all_class(){
		$grade = $this->input->post("grade");
		$this->load->model("Backmodel");
		$data=$this->Backmodel->getClassByGrade($grade);
		echo json_encode($data);
	}
	
	function get_all_class_1(){
		$grade = $this->input->post("grade");
		$this->load->model("Backmodel");
		$data=$this->Backmodel->get_CourseBytID($grade);
		echo json_encode($data);
	}
	
	function get_all_course(){
		$grade = $this->input->post("grade");
		$classname = $this->input->post("classname");
		$this->load->model("Backmodel");
		$data=$this->Backmodel->getCourseByGradeClass($grade, $classname);
		echo json_encode($data);
	}
	
	function get_stu_list()
	{
		$grade = $this->input->post("grade");
		$classname = $this->input->post("classname");
		$cName = $this->input->post("cName");
		$this->load->model("Backmodel");
		$data['arr']=$this->Backmodel->getStuList($grade, $classname, $cName);
		$output='
		<table class="table table-hover" style="font-size:14px;">
		<thead>
			<tr>
				<th>序号</th>
				<th>班级</th>
				<th>课程</th>
				<th>学号</th>
				<th>姓名</th>
				<th>辅导员</th>
				<th>缺课次数</th>
			<tr>
		</thead>
		<tbody>';
		$n=1;
		foreach ($data['arr'] as $val) {
			$output.='<tr>
				<th>'.$n.'</th>
				<th>'.$classname.'</th>
				<th>'.$cName.'</th>
				<th>'.$val->sID.'</th>
				<th>'.$val->sName.'</th>
				<th>'.$val->tName.'</th>';
				if($val->num){
					$output.='<th><span onclick = "alert(\''.$val->date.'\');" class="badge" style="background:#D30D15;cursor:pointer;">'.$val->num.'</span></th>
				</tr>';
				}else{
					$output.='<th><span class="badge" style="background:green;">'.$val->num.'</span></th>
				</tr>';
				}
			$n++;	
		}
		$output.='</tbody>
				</table>';
		echo $output;
	}
	
	function get_stu_list_1()
	{
		
		$classname = $this->input->post("classname");
		
		$this->load->model("Backmodel");
		$data['arr']=$this->Backmodel->getStuList_1($classname);
	//var_dump($data['arr']);
		$output='<table class="table table-hover" style="font-size:14px;">
		<thead>
			<tr>
				<th>序号</th>
				<th>学号</th>
				<th>姓名</th>
				<th>缺课次数</th>
			<tr>
		</thead>
		<tbody>';
		$n=1;
		foreach ($data['arr'] as $val) {
			$output.='<tr>
				<th>'.$n.'</th>
				<th>'.$val->sID.'</th>
				<th>'.$val->sName.'</th>
				<th>'.$val->tName.'</th>';
				if($val->num){
					$output.='<th><span onclick = "alert(\''.$val->date.'\');" class="badge" style="background:#D30D15;cursor:pointer;">'.$val->num.'</span></th>
				</tr>';
				}else{
					$output.='<th><span class="badge" style="background:green;">'.$val->num.'</span></th>
				</tr>';
				}
			$n++;	
		}
		$output.='</tbody>
				</table>';
		echo $output;
	}
	
	function get_teacher_list(){		
		$this->load->model("Backmodel");
		$data['arr']=$this->Backmodel->getTeacherList();
		//echo "<pre>";
		//var_dump($data);exit;
		$this->load->view("Backend/teacher_list", $data);
	}
	
	function get_student_list(){		
		$this->load->model("Backmodel");
		$data['arr']=$this->Backmodel->getStudentList();
		$this->load->view("Backend/student_list", $data);
	}
	
    //公告数据
    function commonData(){
        $data["tID"] = $this->session->userdata("tID");
        $data["isAssistant"] = $this->session->userdata("isAssistant");
       // var_dump($data);
    }

    function a_class()
    {
        $this->commonData();
        $top_data=$this->top();
        $this->load->view("Backend/top",$top_data);
        $this->load->view("Backend/index");
        $this->load->view("Backend/foot");
    }
	function a_time()
    {
        $this->commonData();
        $top_data=$this->top();
        $this->load->view("Backend/top",$top_data);
        $this->load->view("Backend/a_time");
        $this->load->view("Backend/foot");
    }
	
    //Help界面
    function index()
    {
        $this->commonData();
        
        $top_data=$this->top();
        // echo "<pre>";
        // print_r($top_data);

        // echo $top_data['tuser'][0]['tPower'];
        if($top_data['tuser'][0]['tPower'] == 0){
             $this->load->view("Backend/top1",$top_data);
             $this->load->view("Backend/stu");
             $this->load->view("Backend/foot");
        }else{
             $this->load->view("Backend/top",$top_data);
             $this->load->view("Backend/help");
             $this->load->view("Backend/foot");
        }

       
    }

    function top(){
        $tID=$this->session->userdata("tID");
        $this->load->model("Backmodel");
        $data=$this->Backmodel->get_class($tID);
        return $data;
    }

    //创建班级
    function add_class()
    {
        $this->load->model("Backmodel");
        $this->Backmodel->add_class_model();
        $this->session->set_userdata("hasClass",'1');
        redirect("Backend/attendance");
    }
	
	 //添加上课时间
    function add_time(){
    	//$date=$this->input->post("date");
        //print_r($date);
        //exit();
    	$this->load->model("Backmodel");
        $this->Backmodel->add_time_model();
        //$this->session->set_userdata("hasClass",'1');
        redirect("Backend/index");
    }

    //根据辅导员的名字查找导员的id
    function get_assistant()
    {
       echo true;
    }

    //学生考勤界面
    function attendance()
    {
        $top_data = $this->top();
        $this->load->view("Backend/top", $top_data);
        $isAssistant=$this->session->userdata("isAssistant");
        if($isAssistant==1){

            $aID=$this->session->userdata("tID");
            $this->load->model("Backmodel");
            $data['class_list']=$this->Backmodel->get_ass_class($aID);
            $data['all_class']=$this->Backmodel->get_ass_all_class($aID);
           // print_r($class_list);
            $this->load->view("Backend/assistantClass",$data);
        }else {

            $data["className"] = $this->session->userdata("className");
            //您还没有创建班级
            //$this->load->view("Backend/attendance1");
            //请上传学生列表
            $tID = $this->session->userdata("tID");
            $isAssistant = $this->session->userdata("isAssistant");
            $data["hasClass"] = $this->session->userdata("hasClass");
            $data["hasStudents"] = $this->session->userdata("hasStudents");
            if ($data["hasClass"] == 1) {
                $this->load->model("Backmodel");
                $data["uploadStudents_classList"] = $this->Backmodel->get_class($tID);
                //$data["uploadStudents_studentList"] = $this->Backmodel->get_student($tID);
            }

            $this->load->view("Backend/attendance2", $data);
            //完整显示
            //$this->load->view("Backend/attendance3");
        }
            $this->load->view("Backend/foot");

    }


    //我的信息
    function myInformation()
    {
        $this->load->model("Backmodel");
        $data['tUser']=$this->Backmodel->get_tuser_info();
        $top_data=$this->top();
        $this->load->view("Backend/top",$top_data);
        $this->load->view("Backend/myInformation",$data);
        $this->load->view("Backend/foot");
    }

    //上传学生表格
    /*function uploadExcel(){
        $submit = $this->input->post("submit");
        $class = $this->input->post("class");
        $courseID = $this->input->post("courseID");
        $assistantID = $this->input->post("assistantID");
        @include_once("/BackendStyle/excel_reader.php"); //引入PHP-ExcelReader
        if($submit){
           // var_dump($_FILES['file']);
            $tmp = $_FILES['file']['tmp_name'];
            //var_dump($tmp);
            if (empty ($tmp)) {
                echo '请选择要导入的Excel文件！';
                exit;
            }
            $save_path = "upload/";
            $file_name = $save_path.date('Ymdhis')."_".time().".xls"; //上传后的文件保存路径和名称
            $data_values="";
            if (copy($tmp, $file_name)) {
                $xls = new Spreadsheet_Excel_Reader();
                $xls->setOutputEncoding('utf-8');  //设置编码
                $xls->read($file_name);  //解析文件
                $arr = $xls->sheets[0]["cells"];
               // var_dump($xls->sheets[0]);
                for($i=1;$i<=$xls->sheets[0]["numRows"];$i++){
                    $insertContent = "'".implode("','",$arr[$i])."','$courseID','$assistantID'";
                    $sql = "insert into student(sID,sName,sCourse,sAssistant)values($insertContent)";
                    $this->db->query($sql);

                }
            }
        }

        }*/
    function uploadExcel(){
        @include_once("BackendStyle/excel_reader.php"); //引入PHP-ExcelReader
        $className = "class".$this->input->post("sClass");
        $this->session->set_userdata("className",$className);
        $submit = $this->input->post("submit");
        $class = $this->input->post("class");
        $courseID = $this->input->post("courseID");
        $assistantID = $this->input->post("assistantID");
        if($submit){
            // var_dump($_FILES['file']);
            $tmp = $_FILES['file']['tmp_name'];
            //var_dump($tmp);
            if (empty ($tmp)) {
                echo '请选择要导入的Excel文件！';
                exit;
            }
            $save_path = "upload/";
            $file_name = $save_path.date('Ymdhis')."_".time().".xls"; //上传后的文件保存路径和名称
            $data_values="";
            if (copy($tmp, $file_name)) {
                $xls = new Spreadsheet_Excel_Reader();
                $xls->setOutputEncoding('utf-8');  //设置编码
                $xls->read($file_name);  //解析文件
                $arr = $xls->sheets[0]["cells"];
                // var_dump($xls->sheets[0]);
                for($i=2;$i<=$xls->sheets[0]["numRows"];$i++){
                    $insertContent = "'".implode("','",$arr[$i])."','$courseID','$assistantID'";
                     $insertContent1 = "'".implode("','",$arr[$i])."'";
                    //print_r($arr[$i]);exit;
                    $sql = "insert into student(sID,sName,sCourse,sAssistant)values($insertContent)";

                    $sql1 = "insert into tuser(tID,tName) values($insertContent1)";
                    $this->db->query($sql);
                    $this->db->query($sql1);
                }
                redirect("Backend/attendance");
            }
        }

    }
    function updateStudentsExcel(){
        //echo "lixian";exit();
        @include_once("BackendStyle/excel_reader.php"); //引入PHP-ExcelReader
        //$submit = $this->input->post("submit");
        //$class = $this->input->post("class");
        $courseID = $this->input->post("courseID");
        $assistantID = $this->input->post("aID");
        $className = $this->input->post("className");
        $activeClassNameForLi = "class".$className;
        $this->session->set_userdata("className",$activeClassNameForLi);
        // var_dump($_FILES['file']);
        $tmp = $_FILES['file']['tmp_name'];
        //var_dump($tmp);exit;
        if (empty ($tmp)) {
            echo '请选择要导入的Excel文件！';
            exit;
        }
        //删除原有记录
        $sql = "delete from present where sCourse='$courseID'";
        $sql2 = "delete from student where sCourse='$courseID'";
       // $sql3 = "delete from course where id = '$courseID'";
        $this->db->query($sql);$this->db->query($sql2);//$this->db->query($sql3);
        //重新插入
        $save_path = "upload/";
        $file_name = $save_path.date('Ymdhis')."_".time().".xls"; //上传后的文件保存路径和名称
        $data_values="";
        if (copy($tmp, $file_name)) {
            $xls = new Spreadsheet_Excel_Reader();
            $xls->setOutputEncoding('utf-8');  //设置编码
			//echo $file_name;exit;
            $xls->read($file_name);  //解析文件
            $arr = $xls->sheets[0]["cells"];
            // var_dump($xls->sheets[0]);
            for($i=2;$i<=$xls->sheets[0]["numRows"];$i++){
                $insertContent = "'".implode("','",$arr[$i])."','$courseID','$assistantID'";
                $insertContent1 = "'".implode("','",$arr[$i])."'";
                //print_r($arr[$i]);exit;
                $sql = "insert into student(sID,sName,sCourse,sAssistant)values($insertContent)";

                $sql1 = "insert into tuser(tID,tName) values($insertContent1)";
                $this->db->query($sql);
                $this->db->query($sql1);
            }
            redirect("Backend/attendance");
        }

    }


    
    
    public function uploadPdf()
    {
        $folder = date('Y/m/', time());
        $config['upload_path'] = 'data/'.$folder;
        //判断此文件夹是否存在，不存在则进行创建
        if ( ! is_dir($config['upload_path']))
        {
            mkdir($config['upload_path'], 0755, TRUE);
        }

        $config['allowed_types'] = 'doc|docx|xls|xlsx|ppt|pptx|pdf';
        $config['max_size'] = '2048';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file'))
        {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect();
        } 
        else
        {
            $uploaded = $this->upload->data();
            $doc = array();
            $doc['name'] = str_replace($uploaded['file_ext'], '', $uploaded['orig_name']);;
            $doc['type'] = str_replace('.', '', $uploaded['file_ext']);
            $doc['size'] = $uploaded['file_size'];
            $doc['origin_path'] = $folder.$uploaded['file_name'];
            $doc['path'] = '';
            $doc['status'] = 'pending';
            $doc['pid'] =   $this->session->userdata("tID");
            if ($this->db->insert('docs', $doc) AND $doc_id = $this->db->insert_id())
            {
                $queue_data = json_encode(array(
                        'id' => $doc_id,
                        'folder' => $folder,
                        'raw_name' => str_replace($uploaded['file_ext'], '', $uploaded['file_name']),
                        'name' => $uploaded['file_name']
                    ));
                //将文件入转换队列
                    
                $this->session->set_flashdata('msg', '文件上传成功.');
                redirect("/Backend");
               
            }
            else
            {
                $this->session->set_flashdata('msg', '上传失败');
                 redirect("/Backend");
               
            }
        }
    }

    function ajaxForStudent(){
		
		$from_all_url=site_url("Backend/add_all_absence");
        $class = $this->input->post("class");
        $tID = $this->session->userdata("tID");
        $this->load->model("Backmodel");
        $output="";
        $data = $this->Backmodel->get_student($tID,$class);
        $flag = 0;
        foreach ($data["arr_student"] as $item) {
            $flag = 1;break;
        }
        if($flag==0){
            echo "empty";
        }else {
            $output .='<br><br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row" >
                                    <div class="col-md-2 col-xs-3">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;学号
                                    </div>
									 
                                    <div class="col-md-2 col-xs-3" >
            序号&nbsp;&nbsp;&nbsp;&nbsp;姓名
                                    </div>
                                    <div class="col-md-8 col-xs-6">
            <span style="margin-right:150px;float:right;">查看</a></span>
                                    </div>                                 
                                </div>                              
                            </div>
                            <div class="panel-body">
                                <ul class="list-group">
                                	<form class="form-horizontal" name ="cpform" id="form_all" action="'.$from_all_url.'" method="post">
                                 
                                 ';
			$i=0;
            foreach ($data["arr_student"] as $item) {
                $output .=
                    '
                        <li class="list-group-item" class="'.$item["sID"].'">
                                        <div class="row" style="width:100%;">
                                        	
                    <div style="width:30%" class="col-md-3 col-sm-3 col-xs-10">
											  '.$item["sID"] ."&nbsp;&nbsp;&nbsp;&nbsp;　        　".++$i."　  　".$item["sName"].'</div>
                                            <input type="hidden" name ="sID" value="'.$item["sID"].'"  class="sID"/>
                                            <input type="hidden" name = "sCourse" value="'.$item["sCourse"].'"  class="sCourse"/>
                                            <input type="hidden" name = "sName" value="'.$item["sName"].'"  class="sName"/>
                                            <input type="hidden" name = "sAssistant" value="'.$item["sAssistant"].'"  class="sAssistant"/>

                                            <input type="hidden" value="'.site_url("Backend/getRemoveTags").'"  class="removeUrl"/>
                    ';
                $arr = $this->Backmodel->get_absence($item["sID"],$item["sCourse"]);
                $output.="<div style='width:49%' class=\"col-md-6 col-sm-6 col-xs-12\">";
                foreach($arr["arr_absence"] as $item2){
                    $output .="<span style='float:left;margin:5px;' class='label label-danger'>".substr($item2["sDelDate"],2)."</span>";
                }

                $sql = "select * from docs where pid = '{$item["sID"]}' order by id desc limit 1";
                $res = $this->db->query($sql)->result_array(); 
                //echo "<pre>";
               // print_r($res[0]["origin_path"]); exit;
                if($res){
                    $a = '<a href="'.base_url('data').'/'.$res[0]["origin_path"].'">';
                    $endA = '</a>';
                }else{
                    $a = "";
                    $endA = "";
                }
                $output .='</div> <div style="width:20%" class="col-md-3 col-sm-3 col-xs-8">
                	           '.$a.'
                                               <button type = "button"    class="add_tag btn btn-primary btn-xs" data-toggle="modal" data-target="#myalert" data-whatever="添加" data-dismiss="李贤" style="width:40px;">查看</button>
                                '.$endA.'

                                            </div>
                                        </div>
                                    </li>';
            }
            $output .='
						 
						 <div class="col-md-1">
									 
								 

						</div>
						</form>
						</ul>
                    </div>';
            echo $output;
        }
    }


    function getRemoveTags(){
        $sID = $this->input->post("sID");
        $sCourse = $this->input->post("sCourse");
        $this->load->model("Backmodel");
        $output="";
        $data = $this->Backmodel->get_tags($sID,$sCourse);
        foreach($data["arr_tags"] as $items){
            $output .= '<label class="col-md-3 control-label">
                                    <input type="checkbox" name="del_date[]" value="'.$items["sDelDate"].'"/><span class="label label-danger">'.$items["sDelDate"].'</span>
                                </label>';
        }
        $output .="<input type=\"hidden\" value=\"$sID\" class=\"sID1\" name=\"sID1\" />
                                <input type=\"hidden\" value=\"$sCourse\" class=\"courseID1\" name=\"courseID1\" />";
        echo $output;
    }

    //添加缺席学生
    function add_absence(){
        $className = "class".$this->input->post("sClass");
        $this->session->set_userdata("className",$className);
        $this->load->model("Backmodel");
        $res=$this->Backmodel->add_one_absence();
        if($res){
            redirect("Backend/attendance");
        }else{
            echo "添加失败";
        }
    }
	
	function add_all_absence(){
		//echo "<pre>";
		//var_dump($this->input->post());die;
		$courseID=$this->input->post("sCourse");
		$this->load->model("Backmodel");
		$className = "class".$this->Backmodel->get_class_name($courseID);
		$this->session->set_userdata("className",$className);
		if($this->input->post("time")=="")
			error("请先选择考勤日期！");
		$data = $this->input->post("check");
		if(count($data)==0)
			error("请选择缺席学生！");
        $className = "class".$this->input->post("sClass");
        $res=$this->Backmodel->add_all_absence();
        if($res){
            redirect("Backend/attendance");
        }else{
            echo "添加失败";
        }
    }

    //移出缺席学生
    function del_absence()
    {
        $className = "class".$this->input->post("sClass");
        $this->session->set_userdata("className",$className);
        $this->load->model("Backmodel");
        $res=$this->Backmodel->del_one_absence();
        if($res){
            redirect("Backend/attendance");
        }else{
            echo "移出失败";
        }
    }

    //检测旧密码
    function check_old_pwd(){
        $get_pwd = md5($this->input->post("password"));
        $this->load->model("Backmodel");
        $old_pwd = $this->Backmodel->get_old_pwd();
       if($get_pwd == $old_pwd){
           echo "true";
       }else{
           echo "false";
       }
    }

    //更改密码
    function update_user_pwd(){
        $this->load->model("Backmodel");
        $res=$this->Backmodel->update_tuser_pwd();
        if($res){
            redirect("Backend/myInformation");
        }else{
            echo "修改失败";
        }
    }

    function show_myClass_detail(){
        $top_data=$this->top();
        $this->load->view("Backend/top",$top_data);
        $sCourse = $this->uri->segment(3);
        $this->load->model("Backmodel");
        $data['myClass']=$this->Backmodel->get_myClass_detail($sCourse);
        $data['ClassName'] = $this->Backmodel->get_class_name($sCourse);
        $this->load->view("Backend/myClass",$data);
        $this->load->view("Backend/foot");
    }



    function show_oneClass_detail(){
        $couse_id=$this->input->post("course_id");
        $this->load->model("Backmodel");
        $stuid=$this->Backmodel->get_stuid_list($couse_id);
        $output="<br><br> <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <div class=\"row\" >
                                    <div class=\"col-md-2 col-xs-3\">
                学号
                                    </div>
                                    <div class=\"col-md-2 col-xs-3\" >
                姓名
                                    </div>
                                    <div class=\"col-md-8 col-xs-6\">
                考勤(<span style=\"color:red;\">红色标签表示没到人名单</span>)
                                    </div>
                                </div>
                            </div>
                            <div class=\"panel-body\">
                                <ul class=\"list-group\">";
        foreach($stuid as $value){
            $output.="<li class=\"list-group-item\">
                                        <div class=\"row\">";
            $stu_id=$value->sID;
            $stuinfo=$this->Backmodel->get_stuid_info($stu_id,$couse_id);
            $count=0;
            foreach($stuinfo as $value1){
                if($count==0){
                    $output.="<div class=\"col-md-3 col-sm-3 col-xs-10\">".$value1->sID."　　　　".$value1->sName."</div>
                                            <!--<div class=\"col-md-2\" style=\"margin-left:50px;\">$value1->sName</div>-->
                                            <input type=\"hidden\" value=\"李贤\" id=\"name\" />
                                            <input type=\"hidden\" value=\"1427152073\" id=\"number\" />
                                            <div style='word-wrap:break-word;word-break:break-all;' class=\"col-md-9 col-sm-9 col-xs-12\">";
                }
                $output.="<span style='margin-right: 5px;' class=\"label label-danger\">".substr($value1->sDelDate,2)."</span>";
                $count++;
            }
            $output.="</div></div></li>";
        }
        $output.="</ul></div> </div>";
        echo $output;
    }
	
	function sign_in(){
    	$this->load->model("Backmodel");
    	$res=$this->Backmodel->sign_in_date();
        if($res){
        	$msg = "签到成功！";
        	echo "<script type='text/javascript'>alert('$msg');window.history.back(-1);</script>";
        }else{
        	$msg = "您已成功签到，请勿重复签到！";
        	echo "<script type='text/javascript'>alert('$msg');window.history.back(-1);</script>";
        }
    }
	
	
	//上传教师上课信息
	function updateTeacherExcel(){
        //echo "lixian";exit();
        @include_once("BackendStyle/excel_reader.php"); //引入PHP-ExcelReader
		$file_name = "upload/demo3.xls";
		//echo $file_name;
		$xls = new Spreadsheet_Excel_Reader();
       // $xls->setOutputEncoding('utf-8');  //设置编码
		//echo $file_name;exit;
        $xls->read($file_name);  //解析文件
		//var_dump($xls);exit;
        $arr = $xls->sheets[0]["cells"];
		//echo "<pre>";
        //var_dump($arr);exit;
        for($i=2;$i<=$xls->sheets[0]["numRows"];$i++){
            $insertContent = "'".implode("','",$arr[$i])."'";
			//echo $arr[$i][8];
			//echo $insertContent;exit;
			$insertContent =  str_replace(")","",$insertContent);
            $sql = "insert into teacher_course(school,course,credit,zhouci,singleOrTwin,week,jieci,zhoushu,placeOfClass,teacher,nameOfClass)values($insertContent)";
                $this->db->query($sql);
				//exit;
        }
		echo $i;
		
	}
	
	//获取老师课程信息（上课情况）
	function get_teacher_course(){
		$name = $this->input->post("name");
		//$name = "杜晓玉";
		$this->load->model("Backmodel");
		$data['arr'] = $this->Backmodel->get_teacher_course($name);
		echo "<pre>";
		$output='<table class="table table-hover" style="font-size:14px;">
			<thead>
				<tr>
					<th>课程</th>
					<th>单双周</th>
					<th>星期</th>
					<th>节次</th>
					<th>上课地点</th>
					<th>上课班级</th>
				<tr>
			</thead>
			<tbody>';
		foreach ($data['arr'] as $val) {
			$output.=	'<tr>
						<th>'.$val['course'].'</th>
						<th>'.$val['singleOrTwin'].'</th>
						<th>'.$val['week'].'</th>
						<th>'.$val['jieci'].'</th>
						<th>'.$val['placeOfClass'].'</th>
						<th>'.$val['nameOfClass'].'</th>
					<tr>';
		}
		$output.='</tbody>
				</table>';
		echo $output;
	}


}