<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <base href="<?php echo base_url();?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="BackendStyle/css/bootstrap.min.css" rel="stylesheet">
	<link href="BackendStyle/css/flat-ui.css" rel="stylesheet">
	<style type="text/css">
		body{
			background: beige;
		}
		.container{
			width:40%;
			margin:0 auto;
		}
	</style>
</head>
<body>
<div class="container">
	<a  href = "<?php echo site_url("Backend/super_index");?>"><button style="margin-top: 200px; height:100px;weight:100px;float:left;" type="button" class="btn btn-primary">查询方式（一）</button></a>
  	<a  href = "<?php echo site_url("Backend/super_index_1");?>"><button style="margin-top: 200px; height:100px;weight:100px;float:right;" type="button" class="btn btn-primary">查询方式（二）</button></a>
  	<a  href = "<?php echo site_url("Backend/get_teacher_list");?>"><button style="margin-top: 40px; height:100px;weight:100px;float:left;" type="button" class="btn btn-primary">教师录入情况</button></a>
  	<a  href = "<?php echo site_url("Backend/get_student_list");?>"><button style="margin-top: 40px; height:100px;weight:100px;float:right;" type="button" class="btn btn-primary">学生缺勤汇总</button></a>
</div>


<script src="BackendStyle/js/jquery.min.js"></script>
<script src="BackendStyle/js/bootstrap.min.js"></script>
<script src="BackendStyle/js/flat-ui.min.js"></script>
<script src="BackendStyle/js/application.js"></script>
<script>

</script>
</body>
<html>
