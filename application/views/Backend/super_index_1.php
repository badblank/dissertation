<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <base href="<?php echo base_url();?>">
    <meta content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="BackendStyle/css/bootstrap.min.css" rel="stylesheet">
	<link href="BackendStyle/css/flat-ui.css" rel="stylesheet">
	<style type="text/css">
		body{
			background: beige;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="col-md-3">
          <h4 class="demo-panel-title">教师</h4>
		  <div class="form-group">
			  <select id="grade" class="form-control select select-primary" data-toggle="select">
					<option value="教师">--教师--</option>
				<?php foreach ($teacher as $val) { ?>
					<option value="<?php echo $val->tID;?>"><?php echo $val->tName;?></option>
				<?php } ?>
			  </select>
		  </div>
    </div> <!-- /.col-md-3 -->
	
	<div class="col-md-3">
          <h4 class="demo-panel-title">课程</h4>
		  <div class="form-group">
			  <select class="form-control select select-primary" data-toggle="select" disabled id="classname">
				<option value="课程">--课程--</option>
			  </select>
		  </div>
    </div> <!-- /.col-md-3 -->
	<!-- ><div class="col-md-3">
          <h4 class="demo-panel-title">班级</h4>
		  <div class="form-group">
			  <select class="form-control select select-primary" data-toggle="select" disabled id="cName">
					<option value="班级">--班级--</option>
			  </select>
		  </div>
   </div> <!-- /.col-md-3 -->
	<div class="col-md-2">
		<h4 class="demo-panel-title">搜索</h4>
		<div class="form-group">
			<button type="button" class="btn btn-success btn-block" disabled id="commit">确定</button>
		</div>
	</div>
	<a href="<?php echo site_url("Backend/super_index_pre")?>"><button style="float:right;" type="button" class="btn btn-success">回到首页</button></a>
	<input type="hidden" value="<?php echo site_url();?>" id="siteurl">
	<div id="res">
		
	</div>
</div>


<script src="BackendStyle/js/jquery.min.js"></script>
<script src="BackendStyle/js/bootstrap.min.js"></script>
<script src="BackendStyle/js/flat-ui.min.js"></script>
<script src="BackendStyle/js/application.js"></script>
<script>
$("#grade").change(function (){
	var grade = $("#grade").find("option:selected").val();
	if (grade=="教师") {
		alert("请选择教师");
		$("#cName").attr("disabled","disabled"); 
		$("#commit").attr("disabled","disabled"); 
	} else {
		$("#cName").attr("disabled","disabled"); 
		$("#commit").attr("disabled","disabled"); 
		var site_url=$("#siteurl").val();
		var url = site_url+"/Backend/get_all_class_1";
		$.ajax({
             url: url,  
             type: "POST",
             data:{grade:grade},
			 async: false,
             dataType: "json",
             error: function(){  
                 alert('请求失败');  
             },  
             success: function(data,status){//如果调用php成功 
				var output = "<option value='班级'>--班级--</option>";
				for(var i=1;i<=data.length;i++){
					output = output + "<option value='" +data[i-1].id+ "'>" + data[i-1].cClass + data[i-1].cName  + "</option>";
				}
				$("#classname").removeAttr("disabled"); 
				$("#classname").empty();
				$("#classname").append(output);
             }
        });
	}
})



$("#classname").change(function() {
	var cName = $("#cName").find("option:selected").val();
	if (cName=="课程") {
		alert("请选择课程");
		$("#commit").attr("disabled","disabled"); 
	} else {
		$("#commit").removeAttr("disabled"); 
	}
})

$("#commit").click(function(){
	var classname = $("#classname").find("option:selected").val();
	var site_url=$("#siteurl").val();
	var url = site_url+"/Backend/get_stu_list_1";
	$.post(url,{classname:classname},function(data) {
        $("#res").html(data);
    })
})


</script>
</body>
<html>
