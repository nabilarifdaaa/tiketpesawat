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
						<!-- <div class="comments">
							<h3>History</h3>
							<div class="comments-text">
								<div class="col-md-9 comments-right">
									<?php foreach ($history as $data) { ?>
									<h5><?php echo $data['IdBooking']; ?></h5>
									<h5><?php echo $data['KodePesawat']; ?></h5>
									<h5><?php echo $data['TanggalBook']; ?></h5>

									<?php } ?>
									<?php echo $history->IdBooking ?>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div> -->
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //container -->
	</div>