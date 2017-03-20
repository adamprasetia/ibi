<section class="content-header">
	<h1>
		<?php echo $title ?>
		<small><?php echo $subtitle?></small>
	</h1>
	<ol class="breadcrumb">
		<li><?php echo anchor('home','<span class="glyphicon glyphicon-home"></span> '.$this->lang->line('home'))?></li>
		<li class="active"><?php echo $title?></li>
	</ol>
</section>
<section class="content">
	<div class="box box-default">
		<div class="box-body">
			<p>Untuk membackup database silahkan klik tombol dibawah ini : </p>
		</div>
		<div class="box-footer">
			<?php echo anchor('backup/do_backup','Download Backup',array('class'=>'btn btn-primary')) ?>
		</div>
	</div>
</section>