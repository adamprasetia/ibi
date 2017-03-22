<?php $active = $this->uri->segment(2); ?>
<div class="box box-default">
	<div class="box-body">
		<?php echo anchor('bidan/edit/'.$bidan_id,'Identitas',array('class'=>'btn '.($active == 'edit'?'btn-primary':'btn-default'))) ?>
		<?php echo anchor('bidan/kta/index/'.$bidan_id,'KTA',array('class'=>'btn '.($active == 'kta'?'btn-primary':'btn-default'))) ?>
		<?php echo anchor('bidan/str/index/'.$bidan_id,'STR',array('class'=>'btn '.($active == 'str'?'btn-primary':'btn-default'))) ?>
		<?php echo anchor('bidan/sipb_m/index/'.$bidan_id,'SIPB M',array('class'=>'btn '.($active == 'sipb_m'?'btn-primary':'btn-default'))) ?>
		<?php echo anchor('bidan/sipb_p/index/'.$bidan_id,'SIPB P',array('class'=>'btn '.($active == 'sipb_p'?'btn-primary':'btn-default'))) ?>
		<?php echo anchor('bidan/sib/index/'.$bidan_id,'SIB',array('class'=>'btn '.($active == 'sib'?'btn-primary':'btn-default'))) ?>
	</div>
</div>