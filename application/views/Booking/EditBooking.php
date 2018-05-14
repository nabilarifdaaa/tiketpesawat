<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootswatch: Minty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="<?php echo base_url('./assets/css/bootstrap.min.css'); ?>" media="screen">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
      <h3><strong>Reschedule Jadwal Keberangkatan Penumpang</strong></h3>
      <?php echo validation_errors() ?>
      <?php echo form_open(current_url());?>
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
                    <label>Jumlah Tiket</label>
                    <input type='text' class="form-control jumlah-tiket" name="jumtik" style="text-align:right;"  value="<?php echo $JumlahTiket; ?>" / readonly>
                  </div>
                  <div class="form-group">
                  <label>Total Harga</label>
                    <input type="text" class="form-control total-harga" name="total" value="<?php echo $TotalHarga; ?>" readonly></h4>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-6">
          <div class="bs-component">
            <form class="needs-validation" novalidate>
              <fieldset>
                <div class="form-group">
                  <label>ID Booking</label>
                  <input type="text" class="form-control" name="idbook" value="<?php echo $IdBooking; ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Kode Pesawat</label>
                  <input type="text" class="form-control" name="kode" value="<?php echo $FK_KodePesawat; ?>" readonly>
                </div>
                
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="idpenumpang" value="<?php echo $FK_IdPenumpang; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="tgl">Tanggal</label>
                  <input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo set_value('tanggal')?>" required>
                  <div class="invalid-feedback">Tanggalnya kosong isi dong</div>
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
   

   