    <section id="main-content">
        <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Edit Account</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Form Edit</h4>
                      <?php echo validation_errors(); ?>
                      <?php echo form_open('kota/add'); ?>
                          <form>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Kota</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama" required="" placeholder="Nama Kota">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bandara</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="bandara" placeholder="Bandara" >
                              </div>
                          </div>
                          <button type="submit" class="btn btn-round btn-success">Add</button>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          </section>
        </section>  