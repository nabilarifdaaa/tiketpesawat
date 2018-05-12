	<div class="footer">
		<!-- container -->
		
	</div>
	<div class="footer-bottom-grids">
		<!-- container -->
		<div class="container">

				<div class="footer-bottom-top-grids">
					<div class="col-md-4 footer-bottom-left">
						<h4>Download our mobile Apps</h4>
						<div class="d-apps">
							<ul>
								<li><a href="#"><img src="<?php echo base_url('/assets/images/app1.png');?>" alt="" /></a></li>
								<li><a href="#"><img src="<?php echo base_url('/assets/images/app2.png');?>" alt="" /></a></a></li>
								<li><a href="#"><img src="<?php echo base_url('/assets/images/app3.png');?>" alt="" /></a></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 footer-bottom-left">
						<h4>We Accept</h4>
						<div class="a-cards">
							<ul>
								<li><a href="#"><img src="<?php echo base_url('/assets/images/c1.png');?>" alt="" /></a></li>
								<li><a href="#"><img src="<?php echo base_url('/assets/images/c2.png');?>" alt="" /></a></a></li>
								<li><a href="#"><img src="<?php echo base_url('/assets/images/c3.png');?>" alt="" /></a></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 footer-bottom-left">
						<h4>Follow Us</h4>
						<div class="social">
							<ul>
								<li><a href="#" class="facebook"> </a></li>
								<li><a href="#" class="facebook twitter"> </a></li>
								<li><a href="#" class="facebook chrome"> </a></li>
								<li><a href="#" class="facebook dribbble"> </a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
					<div class="copyright">
						<p>Copyrights © 2015 Govihar . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
					</div>
				</div>
		</div>
	</div>
	<script defer src="<?php echo base_url('/assets/
	js/jquery.flexslider.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/
	js/easyResponsiveTabs.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('/assets/
	js/jquery-ui.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('/assets/
	js/script.js'); ?>"></script>
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
	<script type="text/javascript">
		$(window).load(function(){
			$('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			$('body').removeClass('loading');
			}
			});
		});

		function initTotal(self){
			var hargaTiket = parseInt($('.harga-pesawat').val());
			var jumlahTiket = parseInt($(self).val());
			var totalHarga = hargaTiket * jumlahTiket;
			if ($.isNumeric(totalHarga)){
				$('.total-harga').val(totalHarga);
			}
			else {
				$('.total-harga').val(0);
			}
			// console.log(totalHarga);
		}
	</script>		
</body>
</html>