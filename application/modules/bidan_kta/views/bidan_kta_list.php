<section class="content-header">
	<h1>
		<?php echo $title ?>
		<small><?php echo $subtitle ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('home') ?>"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
		<li><a href="<?php echo site_url('bidan') ?>">List Bidan</a></li>
		<li class="active"><?php echo $title ?></li>
	</ol>
</section>
<section class="content">
	<?php $this->load->view('bidan/tab') ?>
	<?php echo $this->session->flashdata('alert')?>
	<div class="box box-default">
		<div class="box-body">
			<?php $this->load->view('bidan/header') ?>
		</div>
	</div>
	<div class="box box-default">
		<div class="box-body">
			<a href="<?php echo site_url('bidan/'.$modulesub.'/add/'.$bidan_id.get_query_string()) ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
		</div>
	</div>
	<div class="box box-default">
		<div class="box-header">
			<form action="<?php echo site_url($index.'/search/'.$bidan_id.get_query_string(null,'offset')) ?>" method="post" class="form-inline">
				<div class="form-group">
					<label for="limit">Limit :</label>
					<?php echo form_dropdown('limit',array('10'=>'10','50'=>'50','100'=>'100'),set_value('limit',$this->input->get('limit')),'onchange="submit()" class="form-control input-sm"')?> 
				</div>
				<div class="form-group">
					<label for="search">Pencarian :</label>
					<?php echo form_input(array('name'=>'search','value'=>$this->input->get('search'),'autocomplete'=>'off','placeholder'=>$this->lang->line('search').'..','onchange=>"submit()"','class'=>'form-control input-sm'))?>
				</div>
				<div class="form-group">
					<?php echo form_dropdown('type',$this->general_model->dropdown('bidan_kta_type','Jenis Pengajuan'),$this->input->get('type'),'class="form-control input-sm" onchange="submit()"')?>
				</div>
				<div class="form-group">
					<?php echo form_dropdown('status',$this->general_model->dropdown('bidan_kta_status','Status'),$this->input->get('status'),'class="form-control input-sm" onchange="submit()"')?>
				</div>
			</form>
		</div>
		<div class="box-body">
			<form action="<?php echo site_url($index.'/delete/'.$bidan_id.get_query_string()) ?>" class="form-check-delete" method="post">
				<div class="table-responsive">
					<?php echo $table; ?>
				</div>
			</form>
		</div>
	</div>		
	<div class="box box-default">	
		<div class="box-body">
			<label class="label-footer"><?php echo $total; ?></label>
			<div class="pull-right">
				<?php echo $pagination; ?>
			</div>
		</div>		
	</div>
	<div class="box box-default">
		<div class="box-body">		
			<button id="delete-btn" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Hapus yang diceklis</button>
		</div>
	</div>	
</section>