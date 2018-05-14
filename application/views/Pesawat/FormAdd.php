<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootswatch: Minty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="<?php echo base_url('./assets/css/bootstrap.min.css'); ?>" media="screen">
    <!-- <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/minty/bootstrap.css"> -->
    <script>

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

    </script>
  </head>
<body>
 <div class="banner-bottom">
    <!-- container -->
    <div class="container">
      <?php echo form_open('Penumpang/do_insert', array('class' => 'needs-validation','novalidate' => ''));?>
        
        <div class="col-md-6">
          <div class="bs-component">
            <form class="needs-validation" novalidate>
              <fieldset>
                <div class="form-group">
                  <label>Kode Pesawat</label>
                  <input type="text" class="form-control" name="kode" placeholder="Kode Pesawat\" value="<?php echo $KodePesawat; ?>" readonly>
                </div>
                
                <div class="form-group">
                  <label>Maskapai</label>
                  <input type="text" class="form-control" name="Maskapai" placeholder="Maskapai" value="<?php echo set_value('Maskapai')?>" required>
                  <div class="invalid-feedback">Nama kosong isi dong</div>
                </div>
                <div class="form-group">
                  <label>Boarding</label>
                  <input type="text" class="form-control" name="Boarding" placeholder="Boarding" value="<?php echo set_value('Boarding')?>" required>
                  <div class="invalid-feedback">KTP kosong isi dong</div>
                </div>
                <div class="form-group">
                  <label>Landing</label>
                  <input type="email" class="form-control" name="Landing" placeholder="Landing" value="<?php echo set_value('Landing')?>" required>
                  <div class="invalid-feedback">Email kosong isi dong</div>
                </div>
                <div class="form-group">
                  <label>FK_IdAsal</label>
                  <input type="text" class="form-control" name="FK_IdAsal" placeholder="FK_IdAsal" value="<?php echo set_value('FK_IdAsal')?>" required>
                  <div class="invalid-feedback">No HP kosong isi dong</div>
                </div>
                <div class="form-group">
                  <label>FK_IdTujuan</label>
                  <input type="text" class="form-control" name="FK_IdTujuan" placeholder="FK_IdTujuan" value="<?php echo set_value('FK_IdTujuan')?>" required>
                  <div class="invalid-feedback">No HP kosong isi dong</div>
                </div>
                <div class="form-group">
                  <label>Kelas</label>
                  <input type="text" class="form-control" name="Kelas" placeholder="Kelas" value="<?php echo set_value('Kelas')?>" required>
                  <div class="invalid-feedback">No HP kosong isi dong</div>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" class="form-control" name="Harga" placeholder="Harga" value="<?php echo set_value('Harga')?>" required>
                  <div class="invalid-feedback">No HP kosong isi dong</div>
                </div>
                <div class="form-group">
                  <label>Logo Pesawat</label>
                  <input type="text" class="form-control" name="Logo Pesawat" placeholder="Logo Pesawat" value="<?php echo set_value('Logo Pesawat')?>" required>
                  <div class="invalid-feedback">No HP kosong isi dong</div>
                </div>
                
                <button type="submit" class="btn btn-primary" name="btnSubmit" id="btnSubmit" value="Simpan">Submit</button>
                <button class="btn btn-warning"><a href="<?php echo base_url()."Pesawat/tes"; ?>">Back</a></button>
              </fieldset>
            </form> 
          </div>
        </div>
    </div>
  </div>
            <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
 <script src="<?php echo base_url('./assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('./assets/js/bootstrap.min.js'); ?>"></script>
  </body>
</html>
   

   