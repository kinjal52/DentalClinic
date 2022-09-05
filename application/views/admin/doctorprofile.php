<?php include 'includes/header.php';?>

<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">User Profile</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo base_url()?>Clinic_controller/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<!-- <li><a class="parent-item" href="#">UI Elements</a>&nbsp;<i
										class="fa fa-angle-right"></i>
								</li> -->
								<li class="active">User Profile</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN PROFILE SIDEBAR -->
							<div class="profile-sidebar">
								<div class="card card-topline-aqua">
									<div class="card-body no-padding height-9">
										<div class="row">

									<?php if(isset($_SESSION['user_id']))
								     {
								     	
                                  $doctor_data= $this->doctors_model->doctordata($_SESSION['user_id']);?>

									<div class="profile-userpic">

									<img src="<?php echo base_url().$doctor_data['doctor_image'];?>" class="img-responsive" alt="">
											</div>
										</div>
										<div class="profile-usertitle">
											<div class="profile-usertitle-name"><?php echo $doctor_data['doctor_name'];?></div>
											<div class="profile-usertitle-job"> Dentist </div>
										</div>
										<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<b>Mobile no</b> <a class="pull-right"><?php echo $doctor_data['mobile_no'];?></a>
											</li>
											<li class="list-group-item">
												<b>Email Address</b> <a class="pull-right"><?php echo $doctor_data['email_id'];?></a>
											</li>
											<li class="list-group-item">
												<b>Location</b> <a class="pull-right">India</a>
											</li>
										</ul>
										<!-- END SIDEBAR USER TITLE -->
										<!-- SIDEBAR BUTTONS -->
										<!-- <div class="profile-userbuttons">
											<button type="button" class="btn btn-circle green btn-sm">Follow</button>
											<button type="button" class="btn btn-circle red btn-sm">Message</button>
										</div> -->
										<!-- END SIDEBAR BUTTONS -->
									</div>
								</div>
							
						 
							</div>
								<div class="profile-content">
								<div class="row">
									<div class="col-md-12">
										<div class="card">
											<div class="card-head card-topline-aqua">
												<header>ABOUT ME</header>
											</div>
											<div class="card-body no-padding height-9">
												<div class="card-body no-padding height-9">
										<div class="profile-desc">
											Hello I am <?php echo $doctor_data['doctor_name'];?> Dentist in Dentshine Clinic Surat. I love to work with all my hospital staff and seniour doctors.
										</div>
										<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<b>Gender </b>
												<div class="profile-desc-item pull-right"><?php echo $doctor_data['gender'];?></div>
											</li>
											<li class="list-group-item">
												<b>Experience </b>
												<div class="profile-desc-item pull-right"><?php echo $doctor_data['experience'];?></div>
											</li>
											<li class="list-group-item">
												<b>Degree</b>
												<div class="profile-desc-item pull-right"><?php echo $doctor_data['degree'];?>
													</div>
												</div>
											</li>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE CONTENT -->
							</div>
							<?php } ?>
<?php include 'includes/footer.php';?>