<div class="jumbotron" align="center">
	<h2>Tampil Transaksi</h2>
</div>
<div class="container" align="center">
	<input type="text" name="form-control" value="<?php echo $penumpang['KodeBook'] ?>" readonly="">
	<input type="text" name="form-control" value="<?php echo $penumpang['KodePesawat'] ?>" readonly="">
	<input type="text" name="form-control" value="<?php echo $penumpang['Nama'] ?>" readonly="">
	<input type="text" name="form-control" value="<?php echo $penumpang['KTP'] ?>" readonly="">
	<input type="text" name="form-control" value="<?php echo $penumpang['Email'] ?>" readonly="">
	<input type="text" name="form-control" value="<?php echo $penumpang['Nohp'] ?>" readonly="">
	<input type="text" name="form-control" value="<?php echo $penumpang['JumlahTiket'] ?>" readonly="">
	<input type="text" name="form-control" value="<?php echo $penumpang['TempatDuduk'] ?>" readonly="">
	<input type="text" name="form-control" value="<?php echo $penumpang['Totalharga'] ?>" readonly="">
	<a href="<?php echo base_url().'penumpang/edit/'.$penumpang['KodeBook'] ?>">Edit</a>
	<a href="<?php echo base_url().'penumpang/delete/'.$penumpang['KodeBook'] ?>">Delete</a>
</div>