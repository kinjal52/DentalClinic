<!DOCTYPE html>
<html>


<!-- Mirrored from radixtouch.in/templates/admin/redstar/source/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 12:54:34 GMT -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="RedstarHospital" />
	<title>Dentshine</title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
		type="text/css" />
	<!-- icons -->
	<link href="<?= ASSETS_PATH?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?= ASSETS_PATH?>assets/bundles/iconic/css/material-design-iconic-font.min.css">
	<!-- bootstrap -->
	<link href="<?= ASSETS_PATH?>assets/bundles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="<?= ASSETS_PATH?>css/extra_pages.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?= ASSETS_PATH?>img/icon.png" />
</head>

<body>
	<div >
		<div class="container-login100 page-background">
			<div class="wrap-login100">

				<form  method="post" class="login100-form validate-form" action="<?php echo base_url();?>Admin/checkemail">

					<span class="login100-form-logo">
						<img alt="" src="<?= ASSETS_PATH?>img/pngtree.jpg">
					</span>
					<p class="text-center txt-small-heading">
						Forgot Your Password? Let Us Help You.
					</p>
					<br>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="text" name="user_name"
							placeholder="Enter Your Register Email Address">
						<span class="" data-placeholder="&#xf191;"></span>
					</div>
					<?php  if(isset($invalid)){
                        if($invalid!=null){ ?>
                            <div > 
                            	<span style="color:darkred;"><b>*<?php echo $invalid; ?></b></span>
                            </div>
                    <?php } } ?>
                    
		
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							send
						</button>
					</div>
					
					
				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<script src="<?= ASSETS_PATH?>assets/bundles/jquery/jquery.min.js"></script>
	<!-- bootstrap -->
	<script src="<?= ASSETS_PATH?>assets/bundles/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= ASSETS_PATH?>assets/data/login-data.js"></script>
	<!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/redstar/source/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 12:54:34 GMT -->
</html>