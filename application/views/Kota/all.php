	<section id="main-content">
      <section class="wrapper">
      	<?php if($this->session->flashdata('pesan')): ?>
		 <?php echo '<p class="alert alert-success">'.$this->session->flashdata('pesan').'</p>'; ?>
		<?php endif; ?>
      	<h3><i class="fa fa-angle-right"></i>Manage Data Booking</h3>
			<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
					        <h1>Data Booking</h1>
	                 		<a href="<?php echo base_url()."kota/tambah/"; ?>">
	                 			<button type="button" class="btn btn-round btn-info">Tambah Admin</button>
	                 		</a>
					        <table id="example" class="table table-hover">
					            <thead>
									<thead>
						        		<tr>
						        			<td>ID Kota</td>
						        			<td>Nama Kota</td>
						        			<td>Bandara</td>
						        			<td>Action</td>
						        		</tr>
						        	</thead>
						        	<tbody>
						        		<?php foreach ($kota->result_array() as $data) { ?>
						        			<tr>
							        			<td><?php echo $data['IdKota']; ?></td>
							        			<td><?php echo $data['NamaKota']; ?></td>
							        			<td><?php echo $data['Bandara']; ?></td>
							        			<td>
												<a href="<?php echo base_url()."kota/update/".$data['IdKota']; ?>">
													<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
												</a>
											  	<a href="<?php echo base_url()."kota/delete/".$data['IdKota']; ?>">
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
