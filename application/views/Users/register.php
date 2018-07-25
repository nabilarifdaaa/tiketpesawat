
<body>

	<div class="bg-contact3" style="background-image: url('<?php echo base_url('/assets3/images/bg-01.jpg'); ?>');">
		<div class="container-contact3">
			<div class="wrap-contact3">
				<?php echo validation_errors(); ?>
				<?php echo form_open('user/register', array('class' => 'contact3-form validate-form','needs-validation','novalidate' => ''));?>
				<form>
					<span class="contact3-form-title">
						Sign Up
					</span>

					<div class="wrap-contact3-form-radio">
						<div class="contact3-form-radio m-r-42">
							<input class="input-radio3" id="radio1" type="radio" name="level" value="1" >
							<label class="label-radio3" for="radio1">
								First Class
							</label>
						</div>

						<div class="contact3-form-radio ">
							<input class="input-radio3" id="radio2" type="radio" name="level" value="2">
							<label class="label-radio3" for="radio2">
								Bussiness
							</label>
						</div>

						<div class="contact3-form-radio">
							<input class="input-radio3" id="radio3" type="radio" name="level" value="3">
							<label class="label-radio3" for="radio3">
								Economy
							</label>
						</div>
					</div>

					<div class="wrap-input3 validate-input" data-validate="Name is required">
						<input class="input3" type="text" name="nama" placeholder="Nama">
						<span class="focus-input3"></span>
					</div>

					<div class="wrap-input3 validate-input" data-validate="KTP is required">
						<input class="input3" type="text" name="ktp" placeholder="KTP">
						<span class="focus-input3"></span>
					</div>

					<div class="wrap-input3 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input3" type="text" name="email" placeholder="Email">
						<span class="focus-input3"></span>
					</div>

					<div class="wrap-input3 validate-input" data-validate = "No Hp is required">
						<input class="input3" type="text" name="nohp" placeholder="No HP">
						<span class="focus-input3"></span>
					</div>

					<div class="wrap-input3 validate-input" data-validate = "Username is required">
						<input class="input3" type="text" name="username" placeholder="Username">
						<span class="focus-input3"></span>
					</div>

					<div class="wrap-input3 validate-input" data-validate = "Password is required">
						<input class="input3" type="password" name="password" placeholder="Password">
						<span class="focus-input3"></span>
					</div>

					<div class="wrap-input3 validate-input" data-validate = "Confirm the password">
						<input class="input3" type="password" name="password2" placeholder="Konfirmasi Password">
						<span class="focus-input3"></span>
					</div>

					

					<div class="container-contact3-form-btn">
						<button class="contact3-form-btn" type="submit">
							Sign Up
						</button>
					</div>
					<div class="text-center p-t-30">
						<a class="txt2" href="<?php echo base_url()."user/login"; ?>">
							Already have account, Back to Sign In
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>


