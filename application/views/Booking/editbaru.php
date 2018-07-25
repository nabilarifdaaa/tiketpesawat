    <section id="main-content">
        <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Edit Account</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Form Edit</h4>
                      <?php echo validation_errors(); ?>
                      <?php echo form_open(current_url(),array('class' => 'form-horizontal style-form','needs-validation','novalidate' => ''));?>
                          <form>
                            <script>
                              $(document).ready(function(){
                              $('[data-toggle="tooltip"]').tooltip();   
                              });
                            </script>
                          <div class="form-group">
                              <label class="col-lg-2 col-sm-2 control-label">ID Booking</label>
                              <div class="col-lg-10">
                                  <p class="form-control-static"><?php echo $IdBooking; ?></p>
                                  <input type="hidden" class="form-control" name="idbook" value="<?php echo $IdBooking; ?>">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID Penumpang</label>
                              <div class="col-sm-10">
                                  <p class="form-control-static"><?php echo $FK_IdPenumpang; ?></p>
                                  <input type="hidden" class="form-control" name="idpenumpang" value="<?php echo $FK_IdPenumpang; ?>">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode Pesawat</label>
                              <div class="col-sm-10">
                                <p class="form-control-static"><?php echo $FK_KodePesawat; ?></p>
                                  <input type="hidden" class="form-control" name="kode" value="<?php echo $FK_KodePesawat; ?>">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Book</label>
                              <div class="col-sm-10">
                                  <input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo $TanggalBook; ?>" required>
                                  <div class="invalid-feedback">Tanggalnya kosong isi dong</div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah Tiket</label>
                              <div class="col-sm-10">
                                  <p class="form-control-static"><?php echo $JumlahTiket; ?></p>
                                  <input type="hidden" class="form-control jumlah-tiket" name="jumtik" style="text-align:right;"  value="<?php echo $JumlahTiket; ?>">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Total Harga</label>
                              <div class="col-sm-10">
                                 <p class="form-control-static"><?php echo $TotalHarga; ?></p>
                                 <input type="hidden" class="form-control total-harga" name="total" value="<?php echo $TotalHarga; ?>" ></h4>
                              </div>
                          </div>
                          
                          <button type="submit" class="btn btn-round btn-success">Edit</button>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          </section>
        </section>  