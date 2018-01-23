<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">แก้ไขข้อมูลเกร็ดความรู้</h3>
            </div>
			<?php echo form_open('knowledge/edit/'.$knowledge['Know_Id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="type" class="control-label">ประเภทของเกร็ดความรู้</label>
						<div class="form-group">
							<input type="text" name="type" value="<?php echo ($this->input->post('type') ? $this->input->post('type') : $knowledge['type']); ?>" class="form-control" id="type" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="name" class="control-label">ชื่อเกร็ดความรู้</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $knowledge['name']); ?>" class="form-control" id="name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="text" class="control-label">ข้อมูลเกร็ดความรู้</label>
						<div class="form-group">
							<textarea name="text" class="form-control" id="text"><?php echo ($this->input->post('text') ? $this->input->post('text') : $knowledge['text']); ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<label for="name" class="control-label">ไฟล์รูปภาพ</label>
						<div class="form-group">
							<input type="file" name="fileupload" value="<?php echo ($this->input->post('fileupload') ? $this->input->post('fileupload') : $knowledge['fileupload']); ?>" class="form-control" id="fileupload" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>