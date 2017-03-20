	<section class="content-header">
	<h1>
		<?php echo $title ?>
		<small><?php echo $subtitle?></small>
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> '.$this->lang->line('home'))?></li>
		<li><?php echo anchor($breadcrumb,$this->lang->line('list'))?></li>
		<li class="active"><?php echo $title?></li>
	</ol>
</section>
<section class="content">
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><?php echo $add_btn ?></li>
		<li role="presentation"><?php echo $list_btn ?></li>
	</ul>
	<?php echo $this->session->flashdata('alert')?>
	<?php echo form_open($action)?>
	<div class="box box-default">
		<div class="box-header owner">
			<?php echo $owner?>
		</div>
		<div class="box-body">
			<div class="form-group form-inline">
				<?php echo form_label($this->lang->line('fullname'),'name',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'name','class'=>'form-control input-sm','maxlength'=>'50','size'=>'60','autocomplete'=>'off','value'=>set_value('name',(isset($row->name)?$row->name:'')),'required'=>'required','autofocus'=>'autofocus'))?>
				<small><?php echo form_error('name')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label($this->lang->line('username'),'username',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'username','class'=>'form-control input-sm','maxlength'=>'50','size'=>'60','autocomplete'=>'off','value'=>set_value('username',(isset($row->username)?$row->username:'')),'required'=>'required'))?>
				<small><?php echo form_error('username')?></small>
			</div>
			<hr>
			<div class="form-group form-inline">
				<?php echo form_label($this->lang->line('password'),'password',array('class'=>'control-label'))?>
				<?php echo form_password(array('name'=>'password','class'=>'form-control input-sm','maxlength'=>'50','size'=>'60','autocomplete'=>'off','value'=>set_value('password','')))?>
				<small><?php echo form_error('password')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label($this->lang->line('confirm_password'),'password2',array('class'=>'control-label'))?>
				<?php echo form_password(array('name'=>'password2','class'=>'form-control input-sm','maxlength'=>'50','size'=>'60','autocomplete'=>'off','value'=>set_value('password2','')))?>
				<small><?php echo form_error('password2')?></small>
			</div>
			<hr>
			<div class="form-group form-inline">
				<?php echo form_label('Level','level',array('class'=>'control-label'))?>
				<?php echo form_dropdown('level',$this->general_model->dropdown('users_level','Level'),set_value('level',(isset($row->level)?$row->level:'')),'required=required class="form-control input-sm"')?>
				<small><?php echo form_error('level')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Status','status',array('class'=>'control-label'))?>
				<?php echo form_dropdown('status',$this->general_model->dropdown('users_status','Status'),set_value('status',(isset($row->status)?$row->status:'')),'required=required class="form-control input-sm"')?>
				<small><?php echo form_error('status')?></small>
			</div>
		</div>
		<div class="box-footer">
			<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> <?php echo $this->lang->line('save'); ?></button>
			<?php echo anchor($breadcrumb,'<span class="glyphicon glyphicon-repeat"></span> '.$this->lang->line('cancel'),array('class'=>'btn btn-danger btn-sm'))?>
		</div>
	</div>
	<?php echo form_close()?>
</section>
