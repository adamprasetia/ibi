<?php echo $this->session->flashdata('alert')?>
<div class="box box-default">
	<div class="box-body">		
		<a href="<?php echo site_url($module.'/add'.get_query_string()) ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
	</div>
</div>			
<div class="box box-default">
	<form action="<?php echo site_url($module.'/search'.get_query_string(null,'offset')) ?>" class="form-inline" method="post">
		<div class="box-header">
			<div class="form-group">
				<label for="limit">Limit :</label>
				<?php echo form_dropdown('limit',array('10'=>'10','50'=>'50','100'=>'100'),set_value('limit',$this->input->get('limit')),'onchange="submit()" class="form-control input-sm"')?> 
			</div>
			<div class="form-group">
				<label for="limit">Pencarian :</label>
				<?php echo form_input(array('name'=>'search','value'=>$this->input->get('search'),'autocomplete'=>'off','placeholder'=>$this->lang->line('search').'..','onchange=>"submit()"','class'=>'form-control input-sm'))?>
			</div>
			<div class="form-group">
				<?php echo form_dropdown('tipe',$this->general_model->dropdown('keuangan_tipe','Tipe'),$this->input->get('tipe'),'class="form-control input-sm" onchange="submit()"')?>
			</div>
			<button class="btn btn-primary btn-sm" type="submit"><span class="glyphicon glyphicon-filter"></span> Filter</button>
			<button class="btn btn-primary btn-sm" type="reset"><span class="glyphicon glyphicon-repeat"></span> Reset</button>
		</div>	
	</form>
	<div class="box-body">
		<form action="<?php echo site_url($module.'/delete'.get_query_string()) ?>" class="form-check-delete" method="post">
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