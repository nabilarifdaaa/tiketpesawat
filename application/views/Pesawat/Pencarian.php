<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			
				
			<div class="c-rooms">
				<div class="p-table"><!-- 
					<h4>tanggal cari pesawat <?php echo "tanggal : ".$tanggal; ?></h4> -->
					<div class="p-table-grids">
					<?php
					$no = 1;
					  foreach ($result3 as $data) { ?>
					 	<div class="col-md-1 p-table-grid">
							<div class="p-table-grad-heading">
								<h6>No </h6>
							</div>
							<div class="p-table-grid-info">
								<a href="#"><img src="images/p2.jpg" alt=""></a>
								<div class="room-basic-info">
									<h6><?php echo $no;?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-3 p-table-grid">
							<div class="p-table-grad-heading">
								<h6>Pesawat</h6>
							</div>
							<div class="p-table-grid-info">
								<a href="#"><img src="images/p2.jpg" alt=""></a>
								<div class="room-basic-info">
									<img src="<?php echo base_url() . "uploads/" . $data['LogoPesawat']; ?>" alt="" width="100" />
									<h6><?php echo $data['KodePesawat']; ?></h6>
									<h5><?php echo $data['Maskapai']; ?></h5>
								</div>
							</div>
						</div>
						<div class="col-md-3 p-table-grid">
							<div class="p-table-grad-heading">
								<h6>Jadwal</h6>
							</div>
							<div class="rate-features">
								<ul>
									<p><strong>Boarding</strong></p>
									<li><?php echo $data['Boarding']; ?></li>
						            <p><strong>Landing</strong></p>
									<li><?php echo $data['Landing']; ?></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 p-table-grid">
							<div class="p-table-grad-heading">
								<h6>Keterangan</h6>
							</div>
							<div class="rate-features">
								<ul>
									<p><strong>Asal</strong></p>
										<li><?=$result1['NamaKota'] ?></li>
										<li><?=$result1['Bandara'] ?></li>
						            <p><strong>Tujuan</strong></p>
				                		<li><?=$result2['NamaKota']; ?></li>
				                		<li><?=$result2['Bandara']; ?></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2 p-table-grid">
							<div class="p-table-grad-heading">
								<h6>Harga</h6>
							</div>
							<div class="avg-rate">
								<h5><?php echo $data['Kelas']; ?></h5>
								<p>Harga:</p>
								<span class="p-offer">RP <?php echo $data['Harga']; ?></span>
								<div class="book-button-column">
									<a href="<?php echo base_url()."Booking/pilih/".$data['KodePesawat']; ?>">Book</a>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
						</div>
		            <?php $no++; } ?>
						<?php 
		// $links ini berasal dari fungsi pagination 
		// Jika $links ada (data melebihi jumlah max per page), maka tampilkan
		if (isset($links)) {
			echo $links;
		} 
		?>
				</div>
				
			</div>
		</div>
		<!-- //container -->
	</div>