<section class="content-header">
	<h1>
		<?php echo $title; ?>
		<small><?php echo $subtitle; ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('home') ?>"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
		<li><a href="<?php echo site_url('reference/'.$section.get_query_string()) ?>">List</a></li>
	    <li class="active"><?php echo $title; ?></li>
	</ol>
</section>
<section class="content">
	<?php echo $this->session->flashdata('alert')?>
	<form action="<?php echo $action; ?>" method="post" class="form-inline">
	<div class="box box-default">
		<div class="box-header owner">
			<?php echo $owner; ?>
		</div>
		<div class="box-body">
			<div class="form-group form-inline">
				<?php echo form_label($this->lang->line('name'),'name',array('class'=>'control-label'))?>
				<?php echo form_input(array('name'=>'name','class'=>'form-control input-sm','maxlength'=>'100','size'=>'50','autocomplete'=>'off','value'=>set_value('name',(isset($row->name)?$row->name:'')),'required'=>'required'))?>
				<small><?php echo form_error('name')?></small>
			</div>
		</div>
		<div class="box-footer">
			<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Apa anda yakin ?')"><span class="glyphicon glyphicon-save"></span> Simpan</button>
			<a href="<?php echo site_url('reference/'.$section.get_query_string()) ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-repeat"></span> Kembali</a>
		</div>
	</div>
	</form>
</section>