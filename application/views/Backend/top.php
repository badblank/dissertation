<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <base href="<?php echo base_url();?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="BackendStyle/css/bootstrap.min.css" rel="stylesheet">
    <link href="BackendStyle/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="BackendStyle/css/mystyle.css" rel="stylesheet">
</head>
<style type="text/css">
		body{
			background: beige;
		}
	</style>
<body>

<div class="container">
    <!--head start-->
    <div class="row">
        <div class="col-sm-16 col-sm-offset-1">
            <nav class="navbar navbar-default head">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynav" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo site_url("Backend/index");?>">云端论文管理</a>
                    </div>
                    <div class="collapse navbar-collapse" id="mynav">
                        <ul class="nav navbar-nav">

                        		<li><a href="<?php echo site_url("backend/a_class");?>">添加信息<span class="sr-only">(current)</span></a></li>
                            
                            <li><a href="<?php echo site_url("backend/attendance");?>">学生列表</a></li>
                            <li><a href="<?php echo site_url("backend/myInformation");?>">我的信息</a></li>
                            
                        </ul>
                        <!--<form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="考勤查询请输入班级名称">
                            </div>
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                        </form>-->
                        <!--<iframe id="tianqi" style="margin-top: 10px;margin-left: 10px;" name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=1" width="330" height="35" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>-->
                        <ul class="nav navbar-nav navbar-right">
                            <li class="navbar-right"><a href="#">退出登录</a></li>
                            <li style="margin-right:-30px;"><a href="#"><img class="media-object" src="BackendStyle/images/07.png"></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
		
		<!-- Large modal -->
		<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">通知</button> -->

		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
			  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">考勤系统更新</h4>
			   </div>
				<div class="modal-body">
					</br>
					<p>新的学期新的开始</p> 	
					<p>考勤系统上学期数据已备份保留。</p>
					<p>随着学期变化，各老师任课班级学生也有变化，请老师们积极上传本学期新的班级名单。</p>
					<p>祝老师们新的一年里工作顺利！</p>
					<p><span style="float: right;">--107网站工作室</span></p>
					<p></br>   </p>
				</div>
			</div>
		  </div>
		</div>
		
    </div>
    <!--head end-->