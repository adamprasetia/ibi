<?php echo $this->session->flashdata('alert')?>
<form action="<?php echo site_url($action) ?>" method="post">
<div class="box box-default">
	<?php echo $owner; ?>
	<div class="box-body">
		<div class="form-group form-inline">
			<?php echo form_label('Tanggal','tanggal',array('class'=>'control-label'))?>
			<?php echo form_input(array('id'=>'tanggal','name'=>'tanggal','class'=>'form-control input-sm input-tanggal','maxlength'=>'10','size'=>'10','autocomplete'=>'off','value'=>set_value('tanggal',(isset($row->tanggal)?format_dmy($row->tanggal):date('d/m/Y')))))?>
			<small><?php echo form_error('tanggal')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Tipe','tipe',array('class'=>'control-label'))?>
			<?php echo form_dropdown('tipe',$this->general_model->dropdown($module.'_tipe','Tipe'),set_value('tipe',(isset($row->tipe)?$row->tipe:'')),'id="tipe" class="form-control input-sm"')?>
			<small><?php echo form_error('tipe')?></small>
		</div>	
		<div class="form-group form-inline">
			<?php echo form_label('Jenis','jenis',array('class'=>'control-label'))?>
			<?php echo form_dropdown('jenis',$this->general_model->dropdown($module.'_jenis','Jenis'),set_value('jenis',(isset($row->jenis)?$row->jenis:'')),'id="jenis" class="form-control input-sm"')?>
			<small><?php echo form_error('jenis')?></small>
		</div>	
		<div class="form-group form-inline">
			<?php echo form_label('Bidan','bidan',array('class'=>'control-label'))?>
			<?php echo form_dropdown('bidan',$this->general_model->dropdown('bidan','Bidan'),set_value('bidan',(isset($row->bidan)?$row->bidan:'')),'id="bidan" class="form-control input-sm select2"')?>
			<small><?php echo form_error('bidan')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Jumlah','jumlah',array('class'=>'control-label'))?>
			<?php echo form_input(array('name'=>'jumlah','class'=>'form-control input-sm input-uang','maxlength'=>'20','autocomplete'=>'off','value'=>set_value('jumlah',(isset($row->jumlah)?$row->jumlah:''))))?>
			<small><?php echo form_error('jumlah')?></small>
		</div>
		<div class="form-group form-inline">
			<?php echo form_label('Keterangan','ket',array('class'=>'control-label'))?>
			<?php echo form_input(array('id'=>'ket','name'=>'ket','class'=>'form-control input-sm','maxlength'=>'200','size'=>'50','autocomplete'=>'off','value'=>set_value('ket',(isset($row->ket)?$row->ket:''))))?>
			<small><?php echo form_error('ket')?></small>
		</div>
	</div>
</div>
<div class="box box-default">	
	<div class="box-body">
		<button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Are you sure')"><span class="glyphicon glyphicon-save"></span> <?php echo $this->lang->line('save') ?></button>
		<a class="btn btn-danger btn-sm" href="<?php echo site_url($module.get_query_string()) ?>"><span class="glyphicon glyphicon-repeat"></span> <?php echo $this->lang->line('back') ?></a>
	</div>
</div>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		var app = {
			bidan:$('#bidan')
		};

		app.bidan.select2({
		    placeholder: "- Bidan -",
		    dropdownAutoWidth:'true',
		    width: 'auto',    
		    ajax: {
		    url: '<?php echo base_url() ?>index.php/api/bidan',
		    dataType: 'json',
		    processResults: function (data) {
		          return {
		              results: $.map(data, function (item) {
		                  return {
		                      text: item.name,
		                      id: item.id
		                  }
		              })
		          };
		      }
		  	}
		});
	});
</script>