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
					缺勤信息
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
					<th>学号</th>
					<th>姓名</th>
					<th>导员</th>
					<th>缺录次数</th>
				<tr>
			</thead>
			<tbody>
				<?php
					$n=1;
					
					foreach ($arr as $val) {
						$date = $val->message;
						echo '<tr>
						<th>'.$n.'</th>
						<th>'.$val->sID.'</th>
						<th>'.$val->sName.'</th>
						<th>'.$val->aName.'</th>';
						if($val->num){
							echo '<th><span onclick = "show(\''.$val->message.'\');" class="badge" style="background:#D30D15;cursor:pointer;">'.$val->num.'</span></th>
							</tr>';
						}else{
							echo '<th><span class="badge" style="background:green;">'.$val->num.'</span></th>
							</tr>';
						}
						echo '</tr>';
						$n++;	
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
	function show($str){
	var arr = $str.split(",");
	var html="";
	for(var i=0;i<arr.length;i++){
		html+="<p>"+arr[i]+"</p>";
	}
	$(".modal-body").html(html);
	$('#myModal').modal('show');
	}
</script>
</body>
<html>
