
<body>

	<div class="bg-contact3" style="background-image: url('<?php echo base_url('/assets3/images/bg-01.jpg'); ?>');">
		<div class="container-contact3">
			<div class="wrap-contact3">
				<?php echo validation_errors(); ?>
            	<?php echo form_open('user/login', array('class' => 'contact3-form validate-form','needs-validation','novalidate' => ''));?>
				<form>
					<span class="contact3-form-title">
						Sign In
					</span>
					
					<div class="wrap-input3 validate-input" data-validate = "Username is required">
						<input class="input3" type="text" name="username" placeholder="Username">
						<span class="focus-input3"></span>
					</div>

					<div class="wrap-input3 validate-input" data-validate = "Password is required">
						<input class="input3" type="password" name="password" placeholder="Password">
						<span class="focus-input3"></span>
					</div>

					<div class="container-contact3-form-btn">
						<button class="contact3-form-btn" type="submit">
							Sign In
						</button>
					</div>
					<div class="text-center p-t-30">
						<a class="txt2" href="<?php echo base_url()."user/register"; ?>">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>


