<div class="form-group">
	<label for="">No Rekomendasi</label>
	<p><?php echo $bidan->nomor ?></p>
	<label for="">Nama Lengkap</label>
	<p><?php echo $bidan->name ?></p>
	<label for="">TTL</label>
	<p><?php echo $bidan->tempat_lahir.', '.format_dmy($bidan->tanggal_lahir) ?></p>
</div>