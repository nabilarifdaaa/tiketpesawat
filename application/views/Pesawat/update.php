<!-- <div class="container"> -->
<section id="main-content">
  <section class="wrapper">
	<h1>Edit Pesawat</h1>
	<br/>
	<form action="<?php echo base_url()."Pesawat/doEdit"; ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="inputKodePesawat">Kode Pesawat</label>
			<input type="text" name="inputKodePesawat" class="form-control" value="<?php echo $result[0]['KodePesawat']; ?>" readonly>
		</div>
		<div class="form-group">
			<label for="inputMaskapai">Maskapai</label>
			<input type="text" name="inputMaskapai" class="form-control" value="<?php echo $result[0]['Maskapai']; ?>">
		</div>
		<div class="form-group">
			<label for="inputBoarding">Boarding</label>
			<input type="time" name="inputBoarding" class="form-control" value="<?php echo $result[0]['Boarding']; ?>">
		</div>
		<div class="form-group">
			<label for="inputLanding">Landing</label>
			<input type="time" name="inputLanding" class="form-control" value="<?php echo $result[0]['Landing']; ?>">
		</div>
		<div class="form-group">
			<label for="inputKotaAsal">Kota Asal</label>
			<?php $kota_asal = $this->PesawatModel->get_kota(); ?>
			<select class="form-control" name="inputKotaAsal">
			<?php foreach($kota_asal->result_array() as $kota_asal) { ?>
			<option value="<?php echo $kota_asal['IdKota']; ?>" <?php echo ($kota_asal['IdKota'] == $result[0]['FK_IdAsal'] ? 'selected="selected"' : ''); ?>><?php echo $kota_asal['NamaKota']; ?></option>
			<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="inputKotaTujuan">Kota Tujuan</label>
			<?php $kota_tujuan = $this->PesawatModel->get_kota(); ?>
			<select class="form-control" name="inputKotaTujuan">
			<?php foreach($kota_tujuan->result_array() as $kota_tujuan) { ?>
			<option value="<?php echo $kota_tujuan['IdKota']; ?>" <?php echo ($kota_asal['IdKota'] == $result[0]['FK_IdTujuan'] ? 'selected="selected"' : ''); ?>><?php echo $kota_tujuan['NamaKota']; ?></option>
			<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="inputKelas">Kelas</label>
			<input type="text" name="inputKelas" class="form-control" value="<?php echo $result[0]['Kelas']; ?>">
		</div>
		<div class="form-group">
			<label for="inputHarga">Harga</label>
			<input type="text" name="inputHarga" class="form-control" value="<?php echo $result[0]['Harga']; ?>">
		</div>
		<div class="form-group">
			<label for="inputFoto">Foto</label>
			<input type="file" name="inputFoto" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>