<!--content start-->
<div class="row">
	<div class="col-sm-16 col-sm-offset-1">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>请选择上课时间</h4>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" id="form" action="<?php echo site_url("backend/add_time");?>" method="post">
					      <input type="checkbox" name = "date[]" id="inlineCheckbox1" value="1"> 星期一 
	
					      <input type="checkbox" name = "date[]" id="inlineCheckbox2" value="2"> 星期二

					      <input type="checkbox" name = "date[]" id="inlineCheckbox3" value="3"> 星期三

						  <input type="checkbox" name = "date[]" id="inlineCheckbox1" value="4"> 星期四</br></br>
	
					      <input type="checkbox" name = "date[]" id="inlineCheckbox2" value="5"> 星期五

					      <input type="checkbox" name = "date[]" id="inlineCheckbox3" value="6"> 星期六
					      
					      <input type="checkbox" name = "date[]" id="inlineCheckbox3" value="0"> 星期日</br></br>
					      
					      <button type="submit" style="float:right;" class="btn btn-success">确定</button>
					</form>
				</div>
			</div>

		</div>

		
	</div>
</div>
</div>
<!--content end-->
<script src="BackendStyle/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
	})
</script>