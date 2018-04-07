		<!--content start-->
			<div class="row">
				<div class="col-sm-16 col-sm-offset-1">
					
					<div class="jumbotron">
					
						<div class="panel panel-default">
                            <div class="panel-heading">
                                <h4><span>论文上传</span></h4>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" id="form_li" action="<?php echo site_url('Backend/uploadPdf');?>" method="post" enctype="multipart/form-data"  >
                                    <div class="form-group has-warning">
                                        <label for="upfile" class="col-sm-4 control-label">请选择文件上传：</label>
                                        <div class="col-sm-7">
                                            <input type="file" id="file" name="file" style="width:100%;"/>
                                           
                                            <p class="help-block">请上传.pdf格式的文件</p>	

                                            <?php if ($msg = $this->session->flashdata('msg')): ?>
											<p class="msg"><?php echo $msg; ?></p>
											<?php endif; ?>
                                        </div>

                                    </div>
                                    <input type="submit" name="submit"class="btn btn-primary" value="上传"/>
                                </form>
                            </div>
                        </div>

					</div>		
			   </div>
		   </div>
		</div>
		<!--content end-->