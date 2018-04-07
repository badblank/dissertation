<!--content start-->
<div class="row">
	<div class="col-sm-16 col-sm-offset-1">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>年级创建</h4>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" id="form" action="<?php echo site_url("backend/add_class");?>" method="post">
						<div class="form-group">
							<label for="year" class="col-sm-4 control-label">请选择年级：</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" name="grade" class="form-control" id="year" disabled/>
												<span class="input-group-btn">
													<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
													<ul class="dropdown-menu dropdown-year">
														<li>2018</li>
														<li>2017</li>
														<li>2016</li>
														<li>2015</li>
														<li>2014</li>
														<li>2013</li>
														<li>2012</li>
														<li>2011</li>
													</ul>
												</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="class" class="col-sm-4 control-label">创建年级名称：</label>
							<div class="col-sm-7">
								<div class="input-group">
									<input type="text" class="form-control" name="class" id="class"/>
									<span class="input-group-addon">例: 　15-本科　</span>
								</div>
							</div>
						</div>
						<div class="form-group has-info">

							<div class="col-sm-7">
								<div class="input-group">
									<input type="hidden" value="论文" id="course" class="form-control" name="course" style="width:100%;"/>

								</div>
							</div>
						</div>
						<div class="form-group has-info">
							<div class="col-sm-7">
								<input type="hidden" id="assistant" value="孙洁"  class="form-control" id="assistant" name="assistant" style="width:100%;"/>
							</div>
						</div>
						<input type="hidden" name="aID" id="tID">
						<button type="button" id="btn" class="btn btn-primary btn-sm btn-position">创建</button>

					</form>
				</div>
			</div>
			<div>
				<a href="<?php echo site_url("backend/attendance")?>">》》导入年级名册</a>
			</div>
		</div>
		
			<div class="col-md-6 col-md-offset-3">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					  <div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
						  <h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							  已创建的年级
							</a>
						  </h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
						  <div class="panel-body">
							<ul class="list-group">
							<?php foreach($arr_class as $v):?>
							  <li class="list-group-item">
								<span class="badge" style="background:gray;">已创建</span>
								<?php echo $v['cClass'].$v['cName']?>
							 </li>
							<?php endforeach;?>
						</ul>
						</div>
						</div>
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
		$('#btn').click(function(){
			var year = $('#year').removeAttr("disabled");
			var course = $("#course").val();

			var clas = $("#class").val();
			var assistant = $("#assistant").val();
			if(year.val()==""){
				alert("请选择年级!");
			}else if(clas==""){
				alert("请输入班级名称");
			}else if(course==""){
				alert("请输入课程名称");
			}else{
				$.post("<?php echo site_url("backend/get_assistant")?>",{assistant:assistant},function(data) {
					var flag=true;
					var tid = data;
					if(tid!="false"){
						$("#tID").val(tid);
					}else{
						flag = false;
						alert("辅导员输入有误，请再次检查，或者联系管理员!");
					}
						if(flag) {
						$("#form").submit();
					}
				})
			}
		})
	})
</script>