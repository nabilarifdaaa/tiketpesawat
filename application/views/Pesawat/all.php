

	<section id="main-content">
      <section class="wrapper">
      	<?php if($this->session->flashdata('pesan')): ?>
		 <?php echo '<p class="alert alert-success">'.$this->session->flashdata('pesan').'</p>'; ?>
		<?php endif; ?>
		<?php if($this->session->flashdata('user_registered')): ?>
		 <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
		<?php endif; ?>
      	<h3><i class="fa fa-angle-right"></i>Manage Admin</h3>
			<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
					        <h1>Data Pesawat</h1>
	                 		<a href="<?php echo base_url()."Pesawat/addPesawat/"; ?>">
	                 			<button type="button" class="btn btn-round btn-info">Tambah Pesawat</button>
	                 		</a>
					        <table id="example" class="table table-hover">
					            <thead>
									<tr>
										<th>Kode Pesawat</th>
						                <th>Maskapai</th>
						                <th>Landing</th>
						                <th>Boarding</th>
						                <th>Kota Asal</th>
						                <th>Kota Tujuan</th> 	
						                <th>Kelas</th>
						                <th>Harga</th>
						                <th>Logo Pesawat</th>
						                <th>Action</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach ($result as $data) { ?>
							            <tr>
							                <td><?php echo $data['KodePesawat']; ?></td>
							                <td><?php echo $data['Maskapai']; ?></td>
							                <td><?php echo $data['Landing']; ?></td>
							                <td><?php echo $data['Boarding']; ?></td>
							                <td><?php echo $data['FK_IdAsal']; ?></td>
							                <td><?php echo $data['FK_IdTujuan']; ?></td>
							                <td><?php echo $data['Kelas']; ?></td>
							                <td><?php echo $data['Harga']; ?></td>
							                <td><img src="<?php echo base_url() . "uploads/" . $data['LogoPesawat']; ?>" alt="" width="100" /></td>
							                <td>	
							                	<a href="<?php echo base_url()."Pesawat/editPesawat/".$data['KodePesawat']; ?>">
							                	<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
							                	<a href="<?php echo base_url()."Pesawat/deletePesawat/".$data['KodePesawat']; ?>">
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
