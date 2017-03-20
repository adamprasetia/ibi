<?php $active = $this->uri->segment(2); ?>
<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" <?php echo ($active=='edit'?'class="active"':'') ?>><?php echo anchor('bidan/edit/'.$bidan_id,'Identitas') ?></li>
	<li role="presentation" <?php echo ($active=='kta'?'class="active"':'') ?>><?php echo anchor('bidan/kta/index/'.$bidan_id,'KTA') ?></li>
	<li role="presentation" <?php echo ($active=='str'?'class="active"':'') ?>><?php echo anchor('bidan/str/index/'.$bidan_id,'STR') ?></li>
	<li role="presentation" <?php echo ($active=='sipb_m'?'class="active"':'') ?>><?php echo anchor('bidan/sipb_m/index/'.$bidan_id,'SIPB M') ?></li>
	<li role="presentation" <?php echo ($active=='sipb_p'?'class="active"':'') ?>><?php echo anchor('bidan/sipb_p/index/'.$bidan_id,'SIPB P') ?></li>
	<li role="presentation" <?php echo ($active=='sib'?'class="active"':'') ?>><?php echo anchor('bidan/sib/index/'.$bidan_id,'SIB') ?></li>
</ul>