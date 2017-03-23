<div class="row">
	<div class="col-md-4">
		<div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">KTA</h3>
			</div>
			<div class="box-body">
			  <table class="table table-bordered">
			    <tbody>
			    <tr>
			      <th style="width: 10px">#</th>
			      <th>Nama</th>
			      <th style="width: 40px">Masa Berlaku</th>
			    </tr>
			    <?php $i=1;foreach ($kta_expire as $row): ?>				    	
			    <tr>
			      <td><?php echo $i ?>.</td>
			      <td><a href="<?php echo site_url('bidan/kta/index/'.$row->bidan) ?>"><?php echo $row->bidan_name ?></a></td>
			      <td><span class="badge <?php echo reminder_badge($row->masa_berlaku) ?>"><?php echo dateformatindo($row->masa_berlaku,2) ?></span></td>
			    </tr>
			    <?php $i++;endforeach ?>
			  </tbody></table>
			</div>
			<div class="box-footer clearfix">
			</div>
		</div>		
	</div>	
</div>