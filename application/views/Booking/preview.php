<div class="banner-bottom">
    <!-- container -->
    <div class="container">
		<div class="col-md-4 single-gd-rt">
			<div class="spl-btn">
				<div class="spl-btn-bor">
					<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>			
					<p>Your Book</p>	
					<script>
						$(document).ready(function(){
						$('[data-toggle="tooltip"]').tooltip();   
						});
					</script>
				</div>
				<div align="center">
					<?php foreach ($result as $data) { ?>
						<div class="form-group">
							<p><strong>Id Booking :</strong> <?php echo $data['IdBooking']; ?></p>
						</div>
						<div class="form-group">
							<p><strong>Id Penumpang :</strong> <?php echo $data['FK_IdPenumpang']; ?></p>
							<p><strong>Nama Penumpang :</strong> <?php echo $data['Nama']; ?></p>
						</div>
						<div class="form-group">
							<p><strong>Tanggal :</strong> <?php echo $data['TanggalBook']; ?></p>
							<p><strong>Jumlah Tiket :</strong> <?php echo $data['JumlahTiket']; ?></p>
							<p><strong>Total Harga : <?php echo $data['TotalHarga']; ?></strong></p>
						</div>
						<div class="form-group">
							<a class="best-btn" href="<?php echo base_url()."Booking/read/"; ?>">Back</a>
						</div>
					<?php } ?>
				</div>
			</div>
			
		</div>
	</div>
</div>