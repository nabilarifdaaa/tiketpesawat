

	<section id="main-content">
      <section class="wrapper">
      	<?php if($this->session->flashdata('pesan')): ?>
		 <?php echo '<p class="alert alert-success">'.$this->session->flashdata('pesan').'</p>'; ?>
		<?php endif; ?>
		<?php if($this->session->flashdata('user_registered')): ?>
		 <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
		<?php endif; ?>
      	<h3><i class="fa fa-angle-right"></i>Manage Booking</h3>
			<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
					        <h1>Data Booking</h1>
	                 		<!-- <a href="<?php echo base_url()."Admin/register/"; ?>">
	                 			<button type="button" class="btn btn-round btn-info">Tambah Admin</button>
	                 		</a> -->
					        <table id="example" class="table table-hover">
					            <thead>
									<tr>
										<th>Id Booking</th>
										<th>Id Penumpang</th>
										<th>Kode Pesawat</th>
						                <th>Tanggal Book</th>
						                <th>Jumlah Tiket</th>
						                <th>Total Harga</th>
						                <th>Action</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach ($result as $data) { ?>
							            <tr>
							            	<td><?php echo $data['IdBooking']; ?></td>
							                <td><?php echo $data['FK_IdPenumpang']; ?></td>
							                <td><?php echo $data['FK_KodePesawat']; ?></td>
							                <td><?php echo $data['TanggalBook']; ?></td>
							                <td><?php echo $data['JumlahTiket']; ?></td>
							                <td><?php echo $data['TotalHarga']; ?></td>
											<td>
												<a href="<?php echo base_url()."Booking/edit/".$data['IdBooking']; ?>">
													<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
												</a>
											  	<a href="<?php echo base_url()."Booking/do_delete/".$data['IdBooking']; ?>">
		                                      		<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
		                                      	</a>
		                                  </td>
										</tr>
										<?php } ?>
									</tbody>
					        </table>
					    </div>
					</section>
				</section>
    	</body>
