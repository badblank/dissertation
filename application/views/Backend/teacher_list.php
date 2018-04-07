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
	</style>
</head>
<body>
<div class="container">

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					教师信息
				</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭
				</button>
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>

<input type="hidden" value="<?php echo site_url();?>" id="siteurl">
	<div id="res"><a href="<?php echo site_url("Backend/super_index_pre")?>"><button style="float:right;" type="button" class="btn btn-success">回到首页</button></a>
		<table class="table table-hover" style="font-size:14px;">
			<thead>
				<tr>
					<th>序号</th>
					<th>工号</th>
					<th>姓名</th>
					<th>缺录次数</th>
					<th>应录次数</th>
				<tr>
			</thead>

			<tbody>
				<?php
					$n=1;
					
					foreach ($arr as $val) {
						$date = $val->date;
						echo '<tr>
						<th>'.$n.'</th>
						<th>'.$val->tID.'</th>
						<th><span class="name" style="cursor:pointer;" onclick="">'.$val->tName.'</span></th>';
						if($val->num){
							echo '<th><span  onclick = "alert(\''.$date.'\');" class="badge" style="cursor:pointer; background:#D30D15;">'.$val->num.'</span></th>
							';
						}else{
							echo '<th><span class="badge" style="background:green;">'.$val->num.'</span></th>
							';
						}
						if($val->tTime){
							echo '<th><span class="badge" style="background:green;">'.getTimeNum($val->tTime).'</span></th>';
						}else{
							echo '<th><span class="badge" style="background:green;">NO</span></th>';
						}
						echo '</tr>';
						$n++;	
					}
					
					
					function getTimeNum($str){
						$startTime = "2017-2-19";
						$time1 = strtotime($startTime);
						$time2 = strtotime(date("Y-m-d"));
						$num = ($time2-$time1)/86400;
						//echo $num."<br/>";
						$j = $num%7;
						$i = ($num-$j)/7;
						$arr = explode(",",$str);
						$num1 = 0;
						if($j!=0){	
							for($k=0;$k<count($arr);$k++){
							if($j==$arr[$k]){
								$num1 = $k+1;
							}
							}
						}
						$num2 = $i*count($arr)+$num1;
						return $num2;

					}  
				?>
			</tbody>
		</table>
	</div>
</div>


<script src="BackendStyle/js/jquery.min.js"></script>
<script src="BackendStyle/js/bootstrap.min.js"></script>
<script src="BackendStyle/js/flat-ui.min.js"></script>
<script src="BackendStyle/js/application.js"></script>
<script>
		$(".name").click(function(){
			var name = this.innerHTML;
			var site_url=$("#siteurl").val();
			var url = site_url+"/Backend/get_teacher_course";
			//alert(name);
			//alert(url);
			$.ajax({
				 url: url,  
				 type: "POST",
				 data:{name:name},
				 async: false,

				 error: function(){  
					 alert('请求失败');  
				 },  
				 success: function(data,status){//如果调用php成功 
					$(".modal-body").html(data);
				 }
			});
			$('#myModal').modal('show');
		});
</script>
</body>
<html>
