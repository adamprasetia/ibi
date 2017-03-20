<section class="content-header">
	<h1>
		Change Password
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> Home')?></li>
	    <li class="active">Change Password</li>
	</ol>
</section>
<section class="content">
<?php echo $this->session->flashdata('alert')?>
<?php echo form_open('change_password')?>
<div class="box box-default">
	<div class="box-body">
		<div class="form-group form-inline">
			<?php echo form_label('Old Password','old_pass',array('class'=>'control-label'))?>
			<?php echo form_password(array('name'=>'old_pass','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','required'=>'required','autofocus'=>'autofocus'))?>
			<small><?php echo form_error('old_pass')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('New Password','new_pass',array('class'=>'control-label'))?>
			<?php echo form_password(array('name'=>'new_pass','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','required'=>'required'))?>
			<small><?php echo form_error('new_pass')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Confirm Password','con_pass',array('class'=>'control-label'))?>
			<?php echo form_password(array('name'=>'con_pass','class'=>'form-control input-sm','maxlength'=>'50','autocomplete'=>'off','required'=>'required'))?>
			<small><?php echo form_error('con_pass')?></small>
		</div>
	</div>
	<div class="box-footer">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-edit"></span> Change</button>
		<?php echo anchor('home','<span class="glyphicon glyphicon-repeat"></span> Batal',array('class'=>'btn btn-danger btn-sm'))?>
	</div>
</div>
<?php echo form_close()?>
</section>