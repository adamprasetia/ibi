<?php echo $this->session->flashdata('alert')?>
<div class="box box-default">
	<div class="box-body">
		<a href="<?php echo site_url($module.'/add'.get_query_string()) ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
		<a href="<?php echo site_url('bidan/filter'.get_query_string()) ?>" class="btn btn-primary btn-sm">Filtering</a>
	</div>
</div>		
<div class="box box-default">
	<div class="box-header">
		<form action="<?php echo site_url($module.'/search'.get_query_string(null,'offset')) ?>" method="post" class="form-inline">
			<div class="form-group">
				<label for="limit">Limit :</label>
				<?php echo form_dropdown('limit',array('10'=>'10','50'=>'50','100'=>'100'),set_value('limit',$this->input->get('limit')),'onchange="submit()" class="form-control input-sm"')?> 
			</div>
			<div class="form-group">
				<label for="search">Pencarian :</label>
				<?php echo form_input(array('name'=>'search','value'=>$this->input->get('search'),'autocomplete'=>'off','placeholder'=>$this->lang->line('search').'..','onchange=>"submit()"','class'=>'form-control input-sm'))?>
			</div>
			<div class="form-group">
				<label for="search">Jumlah : <b><?php echo number_format($jumlah) ?></b></label>
			</div>
		</form>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url($module.'/delete'.get_query_string()) ?>" method="post" class="form-check-delete">
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