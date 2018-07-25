    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Tambah Pesawat</h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <?php echo validation_errors(); ?>
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Form Add Pesawat</h4>
                      
                          <form action="<?php echo base_url()."Pesawat/doAdd"; ?>" method="post" enctype="multipart/form-data">

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode Pesawat</label>
                              <div class="col-sm-10">
                                <input type="text" name="inputKodePesawat" class="form-control" placeholder="Kode Pesawat">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Maskapai</label>
                              <div class="col-sm-10">
                                  <input type="text" name="inputMaskapai" class="form-control" placeholder="Maskapai">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Boarding</label>
                              <div class="col-sm-10">
                                  <input type="time" name="inputBoarding" class="form-control" placeholder="Boarding">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Landing</label>
                              <div class="col-sm-10">
                                  <input type="time" name="inputLanding" class="form-control" placeholder="Landing">
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" for="inputKotaAsal">Kota Asal</label>
                            <?php $kota_asal = $this->PesawatModel->get_kota(); ?>
                            <select class="form-control" name="inputKotaAsal">
                            <?php foreach($kota_asal->result_array() as $kota_asal) { ?>
                            <option value="<?php echo $kota_asal['IdKota']; ?>"><?php echo $kota_asal['NamaKota']; ?></option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" for="inputKotaTujuan">Kota Tujuan</label>
                            <?php $kota_tujuan = $this->PesawatModel->get_kota(); ?>
                            <select class="form-control" name="inputKotaTujuan">
                            <?php foreach($kota_tujuan->result_array() as $kota_tujuan) { ?>
                            <option value="<?php echo $kota_tujuan['IdKota']; ?>"><?php echo $kota_tujuan['NamaKota']; ?></option>
                            <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                              <div class="col-sm-10">
                                  <input type="text" name="inputKelas" class="form-control" placeholder="Kelas">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                              <div class="col-sm-10">
                                  <input type="text" name="inputHarga" class="form-control" placeholder="Harga">
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="inputFoto">Foto</label>
                            <input type="file" name="inputFoto" class="form-control">
                          </div>
                          <button type="submit" class="btn btn-round btn-success">Add</button>
                      </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->
          </section>
        </section>  