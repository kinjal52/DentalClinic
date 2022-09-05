<!doctype html>
<html class="no-js" lang="">
<style type="text/css">
img{
  border-radius: 50%;
  align-content: center;

}
</style>

<!-- Mirrored from affixtheme.com/html/xmee/demo/login-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 30 May 2021 13:39:16 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login </title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= LOGIN_PATH?>img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= LOGIN_PATH?>css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="<?= LOGIN_PATH?>css/fontawesome-all.min.css">
	<!-- Flaticon CSS -->
	<link rel="stylesheet" href="<?= LOGIN_PATH?>font/flaticon.css">
	<!-- Google Web Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?= LOGIN_PATH?>style.css">
	<link rel="shortcut icon" href="<?= USER_PATH?>images/icon.png" />
</head>

<body bgcolor="black">
	<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
	<section class="fxt-template-animation fxt-template-layout6" data-bg-image="<?= LOGIN_PATH?>img/figure/bg-01.jpg">
		<!-- <div class="fxt-header">
			
		</div> -->
		<div class="fxt-content">
			<div class="fxt-form">
				<center>
				<img src="<?= ASSETS_PATH?>img/pngtree.jpg" alt="Logo" style="width:160px; height: 160px;" >
			</center>
				<h2 align="center">Login</h2>
				<form method="POST" action="<?php echo base_url();?>Client/checkemail">
					<div class="form-group">
					<div class="fxt-transformY-50 fxt-transition-delay-3">
					<div class="form-group">
						<p class="text-center txt-small-heading">
						Forgot Your Password? Let Us Help You.
						</p>
						<input type="email" class="form-control" name="user_name" placeholder="Enter Register Email Address" required="required">
					</div>
						
					</div>
					</div>
					<div class="fxt-transformY-50 fxt-transition-delay-5">
							<div class="fxt-content-between">
								<button type="submit" class="fxt-btn-fill">Send</button>
							</div>
						</div>					
					</div>
					<?php  if(isset($invalid)){
              if($invalid!=null){ ?>
                <div class=""> <span
                  style="color:#FF0000;"><b>*<?php echo $invalid; ?></b></span>
                </div>

           <?php } } ?>						
				</form>
			</div>
		</div>
	</section>
	<!-- jquery-->
	<script src="<?= LOGIN_PATH?>js/jquery-3.5.0.min.js"></script>
	<!-- Popper js -->
	<script src="<?= LOGIN_PATH?>js/popper.min.js"></script>
	<!-- Bootstrap js -->
	<script src="<?= LOGIN_PATH?>js/bootstrap.min.js"></script>
	<!-- Imagesloaded js -->
	<script src="<?= LOGIN_PATH?>js/imagesloaded.pkgd.min.js"></script>
	<!-- Validator js -->
	<script src="<?= LOGIN_PATH?>js/validator.min.js"></script>
	<!-- Custom Js -->
	<script src="<?= LOGIN_PATH?>js/main.js"></script>

</body>


<!-- Mirrored from affixtheme.com/html/xmee/demo/login-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 30 May 2021 13:39:22 GMT -->
</html>