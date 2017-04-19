<?php $this->load->view('bidan/tab') ?>
<?php echo $this->session->flashdata('alert')?>
<div class="box box-default">
	<div class="box-body">
		<?php $this->load->view('bidan/header') ?>
	</div>
</div>
<div class="box box-default">
	<div class="box-body">
		<a href="<?php echo site_url($url.'/add/'.$bidan_id.get_query_string()) ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
	</div>
</div>
<div class="box box-default">
	<form action="<?php echo site_url($url.'/search/'.$bidan_id.get_query_string(null,'offset')) ?>" method="post" class="form-inline">
	<div class="box-header">
		<div class="form-group">
			<label for="limit">Limit :</label>
			<?php echo form_dropdown('limit',array('10'=>'10','50'=>'50','100'=>'100'),set_value('limit',$this->input->get('limit')),'onchange="submit()" class="form-control input-sm"')?> 
		</div>
		<div class="form-group">
			<label for="search">Pencarian :</label>
			<?php echo form_input(array('name'=>'search','value'=>$this->input->get('search'),'autocomplete'=>'off','placeholder'=>$this->lang->line('search').'..','onchange=>"submit()"','class'=>'form-control input-sm'))?>
		</div>
		<div class="form-group">
			<?php echo form_dropdown('tipe',$this->general_model->dropdown($module.'_tipe','Jenis Pengajuan'),$this->input->get('tipe'),'class="form-control input-sm" onchange="submit()"')?>
		</div>
		<div class="form-group">
			<?php echo form_dropdown('status',$this->general_model->dropdown($module.'_status','Status'),$this->input->get('status'),'class="form-control input-sm" onchange="submit()"')?>
		</div>
		<div class="form-group">
			<label for="tanggal">Tanggal :</label>
			<?php echo form_input(array('name'=>'date_from','value'=>$this->input->get('date_from'),'autocomplete'=>'off','placeholder'=>'Dari','size'=>'10','class'=>'form-control input-sm input-tanggal'))?>
			<?php echo form_input(array('name'=>'date_to','value'=>$this->input->get('date_to'),'autocomplete'=>'off','placeholder'=>'Sampai','size'=>'10','class'=>'form-control input-sm input-tanggal'))?>
		</div>
		<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-filter"></span> Filter</button>			
	</div>
	</form>	
	<div class="box-body">
		<form action="<?php echo site_url($url.'/delete/'.$bidan_id.get_query_string()) ?>" class="form-check-delete" method="post">
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