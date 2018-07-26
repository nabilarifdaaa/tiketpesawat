<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>Our Blog</h2>
			</div>
			<div class="faqs-top-grids">
				<div class="blog-grids">
					<div class="col-md-8 blog-left">
						
					<!-- </div>
					<div class="col-md-4 blog-right"> -->
						<div class="comments">
							<h3>Your Account</h3>
							<div class="comments-text">
								<div class="col-md-9 comments-right">
									<img src="<?php echo base_url('/assets/images/user.png'); ?>" alt="">
									<h3><?php echo $user->Nama ?></h3>
									<h5><?php echo $user->nama_level ?></h5>
								</div>
								<div class="book-button-column">
									<a href="<?php echo base_url()."user/edit/"; ?>">Edit Profile</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<h1>Data Booking</h1>
        <?php echo "<h2>".$this->session->flashdata('pesan')."</h2>" ?>
        <table id="example" class="table table-hover">
            <thead>
				<tr>
					<th>Id Booking</th>
					<th>Id Penumpang</th>
					<th>Kode Pesawat</th>
	                <th>Tanggal Book</th>
	                <th>Jumlah Tiket</th>
	                <th>Total Harga</th>
				</tr>
				</thead>
				<tbody>

					<?php foreach ($book as $data) { ?>
		            <tr>
		            	<td><?php echo $data['IdBooking']; ?></td>
		                <td><?php echo $data['FK_IdPenumpang']; ?></td>
		                <td><?php echo $data['FK_KodePesawat']; ?></td>
		                <td><?php echo $data['TanggalBook']; ?></td>
		                <td><?php echo $data['JumlahTiket']; ?></td>
		                <td><?php echo $data['TotalHarga']; ?></td>
		                
		            </tr>
		            <?php } ?>
		            
				</tbody>
        </table>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //container -->
	</div>