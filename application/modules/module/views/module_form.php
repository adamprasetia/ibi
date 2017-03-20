<section class="content-header">
	<h1>
		<?php echo $title ?>
		<small><?php echo $subtitle ?></small>
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
				<?php echo form_label($this->lang->line('name'),'name',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'name','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>set_value('name',(isset($row->name)?$row->name:'')),'required'=>'required'))?>
				<small><?php echo form_error('name')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Url','url',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'url','class'=>'form-control input-sm','maxlength'=>'50','size'=>'30','autocomplete'=>'off','value'=>set_value('url',(isset($row->url)?$row->url:''))))?>
				<small><?php echo form_error('url')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Icon','icon',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'icon','class'=>'form-control input-sm','maxlength'=>'50','size'=>'30','autocomplete'=>'off','value'=>set_value('icon',(isset($row->icon)?$row->icon:''))))?>
				<small><?php echo form_error('icon')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Parent','parent',array('class'=>'control-label'))?>
				<?php echo form_dropdown('parent',$this->general_model->dropdown('module','Module'),set_value('parent',(isset($row->parent)?$row->parent:'')),'id="parent" class="form-control input-sm select2"')?>
				<small><?php echo form_error('parent')?></small>
			</div>
			<div class="form-group form-inline">
				<?php echo form_label('Order','order',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'order','class'=>'form-control input-sm','maxlength'=>'8','size'=>'10','autocomplete'=>'off','value'=>set_value('order',(isset($row->order)?$row->order:''))))?>
				<small><?php echo form_error('order')?></small>
			</div>
		</div>
		<div class="box-footer">
			<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> Save</button>
			<?php echo anchor($breadcrumb,'<span class="glyphicon glyphicon-repeat"></span> Back',array('class'=>'btn btn-danger btn-sm'))?>
		</div>
	</div>
	<?php echo form_close()?>
</section>