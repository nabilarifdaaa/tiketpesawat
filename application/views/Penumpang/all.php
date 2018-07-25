

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
					        <h1>Data Penumpang</h1>
					        <table id="example" class="table table-hover">
					            <thead>
									<tr>
										<th>ID Penumpang</th>
										<th>Nama</th>
	                					<th>KTP</th>
	                					<th>Email</th>
	                					<th>NO Hp</th>
	                 					<th>Action</th>
									</tr>
								</thead>
							<tbody>
							<?php foreach ($result as $data) { ?>
				            <tr>
               					<td><?php echo $data['IdPenumpang']; ?></td>
               					<td><?php echo $data['Nama']; ?></td>
	                			<td><?php echo $data['KTP']; ?></td>
	                			<td><?php echo $data['Email']; ?></td>
	                			<td><?php echo $data['NoHp']; ?></td>
		                		<td>
								  <a href="<?php echo base_url()."Penumpang/do_delete/".$data['IdPenumpang']; ?>">
                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
		                        </td>
										</tr>
										<?php } ?>
									</tbody>
					        </table>
					    </div>
					</section>
				</section>
    	</body>
