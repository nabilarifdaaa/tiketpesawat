<head>
<script>
function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.jumtik.value;
two = document.autoSumForm.harga.value;
document.autoSumForm.jumlah.value = one * two ;}
function stopCalc(){
clearInterval(interval);}
</script>

</head>
 <div class="banner-bottom">
    <!-- container -->
    <div class="container">
      <?php echo form_open('Penumpang/do_insert', array('class' => 'needs-validation','novalidate' => ''));?>
        <div class="col-md-4 single-gd-rt">
              <div class="spl-btn">
                <div class="spl-btn-bor">
                  <a href="#">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>                      
                  </a>
                  <p>Total Harga</p>  
                  <script>
                    $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip();   
                    });
                  </script>
                </div>
                <div class="sp-bor-btn text-right">
                  <div class="form-group">
                    <label>Harga Pesawat</label>
                    <input type="text" class="form-control harga-pesawat" name="harga" value="<?php echo $Harga; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Tiket</label>
                    <input type='text' class="form-control jumlah-tiket" name="jumtik" style="text-align:right;"  size='23' onkeyup="initTotal(this)" />
                  </div>
                  <div class="form-group">
                  <label>Total Harga</label>
                    <input type="text" class="form-control total-harga" name="total" value='0' readonly></h4>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-6">
          <div class="bs-component">
            <form class="needs-validation" novalidate>
              <fieldset>
                <div class="form-group">
                  <label>Kode Pesawat</label>
                  <input type="text" class="form-control" name="kode" placeholder="Nama Lengkap" value="<?php echo $KodePesawat; ?>" readonly>
                </div>
                
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama')?>" required>
                  <div class="invalid-feedback">Nama kosong isi dong</div>
                </div>
                <div class="form-group">
                  <label>KTP</label>
                  <input type="text" class="form-control" name="ktp" placeholder="KTP" value="<?php echo set_value('ktp')?>" required>
                  <div class="invalid-feedback">KTP kosong isi dong</div>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email')?>" required>
                  <div class="invalid-feedback">Email kosong isi dong</div>
                </div>
                <div class="form-group">
                  <label>No HP</label>
                  <input type="text" class="form-control" name="nohp" placeholder="No HP" value="<?php echo set_value('nohp')?>" required>
                  <div class="invalid-feedback">No HP kosong isi dong</div>
                </div>
                <div class="form-group">
                  <label for="tgl">Tanggal</label>
                  <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Judul" value="<?php echo set_value('tanggal')?>" required>
                  <div class="invalid-feedback">Tanggalnya kosong isi dong</div>
                </div>
                
                <div class="form-group">
                  <label>Tempat Duduk</label>
                  <input type="text" class="form-control" name="duduk" aria-describedby="emailHelp" placeholder="Tempat Duduk" value="<?php echo set_value('duduk')?>" required>
                  <div class="invalid-feedback">Pilih tempat duduk</div>
                </div>
                
                <button type="submit" class="btn btn-primary" name="btnSubmit" id="btnSubmit" value="Simpan">Submit</button>
                <button class="btn btn-warning"><a href="<?php echo base_url()."Pesawat/tes"; ?>">Back</a></button>
              </fieldset>
            </form> 
          </div>
        </div>
    </div>
  </div>

   

   