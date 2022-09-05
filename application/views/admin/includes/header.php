<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- Mirrored from radixtouch.in/templates/admin/redstar/source/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 12:57:07 GMT -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="RedstarHospital" />
	<title>Dentshine </title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
		type="text/css" />
	<!-- icons -->
	<link href="<?= ASSETS_PATH?>assets/bundles/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= ASSETS_PATH?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- data tables -->
	<link href="<?= ASSETS_PATH?>assets/bundles/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
		type="text/css" />
	<!--bootstrap -->
	<link href="<?= ASSETS_PATH?>assets/bundles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="<?= ASSETS_PATH?>assets/bundles/material/material.min.css">
	<link rel="stylesheet" href="<?= ASSETS_PATH?>css/material_style.css">
	<!-- Theme Styles -->
	<link href="<?= ASSETS_PATH?>css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="<?= ASSETS_PATH?>css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= ASSETS_PATH?>css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?= ASSETS_PATH?>css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?= ASSETS_PATH?>css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
	<link rel="shortcut icon" href="<?= ASSETS_PATH?>img/icon.png" />
</head>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
					<a href="<?php echo base_url();?>Admin/index">
						 <span class="logo-icon fa fa-stethoscope fa-rotate-45"></span> 
						<span class="logo-default">Dentshine</span> </a>
				</div>
				<!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>
				<!-- serach -->
				<form class="search-form-opened" action="#" method="GET">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search..." name="query">
						<span class="input-group-btn">
							<a href="javascript:;" class="btn submit">
								<i class="icon-magnifier"></i>
							</a>
						</span>
					</div>
				</form>
				<!-- start mobile menu -->
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span></span>
				</a>
				<!-- end mobile menu -->
				<!-- start header menu -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						
						<!-- end language menu -->
						<!-- start notification dropdown -->
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
							<?php $cnt=$this->appointment_model->countnotification(); ?>

							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
								<i class="fa fa-bell-o"></i>
								<span class="badge headerBadgeColor1"><?php echo $cnt;?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3><span class="bold">Notifications</span></h3>
									
									<span class="notification-label purple-bgcolor"><?php echo 'New'.$cnt;?></span>
								</li>
								<li>
									<ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
										<li>
											<?php $appointment_data=$this->appointment_model->appointmentlist();											
											// print_r($appointment_data);
												foreach($appointment_data as $appoitnment) {
													// echo "heloooo";
													?>
											<a href="javascript:;">		
												<span class="time">just now</span>
												<span class="details">
													<span class="notification-icon circle deepPink-bgcolor"><i
															class="fa fa-user o"></i></span>

													</span><?php echo $appoitnment['patient_name'];?>
											</a>
										<?php } ?>
										</li>
										
									</ul>
									<div class="dropdown-menu-footer">
										<a href="<?php base_url();?>showappointment"> All notifications </a>
									</div>
								</li>
							</ul>
						</li>
						<!-- end notification dropdown -->
						<!-- start message dropdown -->
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
							<?php $cnt=$this->contactus_model->countmsg(); ?>

							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
								<i class="fa fa-envelope-o"></i>
								<span class="badge headerBadgeColor2"><?php echo $cnt;?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3><span class="bold">Messages</span></h3>
									
									<span class="notification-label cyan-bgcolor"><?php echo 'New'.$cnt;?></span>
								</li>
								<li>
									<ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
										<li>
											<?php $contact_data=$this->contactus_model->contactuslist(); 							foreach($contact_data as $contactus) {
													?>
											<a href="<?php echo base_url();?>Admin/showcontact">		
												<span class="time">just now</span>
												<span class="details">
													<span class="notification-icon circle purple-bgcolor"><i
															class="fa fa-user o"></i></span>
													</span><?php echo $contactus['name'];?>
											</a>
										<?php } ?>
										</li>
										
									</ul>
									<div class="dropdown-menu-footer">
										<a href="<?php base_url();?>showcontact"> All notifications </a>
									</div>
								</li>
							</ul>
						</li>
						<!-- end message dropdown -->
						<!-- start manage user dropdown -->
						<li class="dropdown dropdown-user">	
							<?php if(isset($_SESSION['user_id']))
								{
									if($_SESSION['user_type']=='doctor'){
									$doctor_data= $this->doctors_model->doctordata($_SESSION['user_id']);?>

							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
								
								
								<img alt="" class="img-circle " src="<?php echo base_url().$doctor_data['doctor_image'];?>" />

								<span class="username username-hide-on-mobile"><?php echo $doctor_data['doctor_name'];?></span>
								<i class="fa fa-angle-down"></i>
								
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="<?php echo base_url()?>Admin/doctorprofile">
										<i class="icon-user"></i> Profile </a>
								</li>
								<!-- <li>
									<a href="#">
										<i class="icon-settings"></i> Settings
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icon-directions"></i> Help
									</a>
								</li>
								<li class="divider"> </li>
								<li>
									<a href="lock_screen.html">
										<i class="icon-lock"></i> Lock
									</a>
								</li> -->
								<li>
									<a href="<?php echo base_url()?>Admin/logout">
										<i class="icon-logout"></i> Log Out </a>
								</li>
							</ul>
							<?php }  else { ?>

								<?php if($_SESSION['user_type']=='receptionist'){

									$receptionist_data= $this->receptionist_model->receptionistdata($_SESSION['user_id']);?>
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
									

								<span class="username username-hide-on-mobile"><?php echo 
								$receptionist_data['receptionist_name'];?></span>
								<i class="fa fa-angle-down"></i>
								
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								
								<li>
									<a href="<?php echo base_url()?>Admin/logout">
										<i class="icon-logout"></i> Log Out </a>
								</li>
							</ul>
						<?php } } ?>

							<?php if($_SESSION['user_type']=='admin'){ ?>

									<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
			

								<span class="username username-hide-on-mobile">Admin</span>
								<i class="fa fa-angle-down"></i>
								
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								
								<li>
									<a href="<?php echo base_url()?>Admin/logout">
										<i class="icon-logout"></i> Log Out </a>
								</li>
							</ul>
						<?php }  }   ?>
						</li>
						<!-- end manage user dropdown -->
						
					</ul>
				</div>
			</div>
		</div>
		<!-- end header -->
		
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll" class="left-sidemenu">
						<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
							data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							<?php if($_SESSION['user_type']=='admin') { ?>
							<li class="nav-item start active open">
								<a href="<?php echo base_url();?>Admin/index" class="nav-link nav-toggle">
									<i class="material-icons">dashboard</i>
									<span class="title">Dashboard</span>
									<!-- <span class="selected"></span> -->
								</a>
								
							</li>
							<!-- appointment -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"><i class="material-icons">assignment</i>
									<span class="title">Appointment</span><span class="arrow"></span></a>
								<ul class="sub-menu">
																		
								
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showappointment" class="nav-link "> <span class="title">View All
												Appointment</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showbookappointment" class="nav-link "> <span class="title"> View All BookedAppointment</span>
										</a>
									</li>
								</ul>
							</li>
							<!-- doctor -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">person</i>
									<span class="title">Doctors</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showdoctor" class="nav-link "> <span class="title">All
												Doctor</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/adddoctor" class="nav-link "> <span class="title">Add
												Doctor</span>
										</a>
									</li>
									

									<li class="nav-item  ">
										<a href="doctor_profile.html" class="nav-link "> <span class="title">About
												Doctor</span>
										</a>
									</li>
								</ul>
							</li>
							<!-- receptionist -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
									<span class="title">Receptonist</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showreceptionist" class="nav-link "> <span class="title">All
												Receptionist</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addreceptionist" class="nav-link "> <span class="title">Add Receptionist</span>
										</a>
									</li>
									
									
								</ul>
							</li>
							<!-- patient -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">accessible</i>
									<span class="title">Patients</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showpatient" class="nav-link "> <span class="title">All
												Patients</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addpatient" class="nav-link "> <span class="title">Add
												Patient</span>
										</a>
									</li>
									
									
								</ul>
							</li>
							<!-- treatment -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="fa fa-plus-square"></i>
									<span class="title">Treatment</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addtreatment" class="nav-link "> <span class="title">Add
												Treatment</span>
										</a>
									</li>

									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showtreatment" class="nav-link "> <span class="title">Show Treatment</span>
										</a>
									</li>
							
								</ul>
							</li>
							<!-- meddicine -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="fa fa-medkit"></i>
									<span class="title">Medicine</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addmedicine" class="nav-link "> <span class="title">Add
												Medicine</span>
										</a>
									</li>

									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showmedicine" class="nav-link "> <span class="title">Show Medicine</span>
										</a>
									</li>
									
									<li class="nav-item  ">
										<a href="patient_profile.html" class="nav-link "> <span class="title">Edit Medicine </span>
										</a>
									</li>
								</ul>
							</li>
							<!-- prescription -->
							<!-- <li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons"> receipt</i>
									<span class="title">Prescription</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addprescription" class="nav-link "> <span class="title">Add
												Prescription</span>
										</a>
									</li>

									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showprescription" class="nav-link "> <span class="title">Show Prescription</span>
										</a>
									</li>
									
									<li class="nav-item  ">
										<a href="patient_profile.html" class="nav-link "> <span class="title">Edit Prescription </span>
										</a>
									</li>
								</ul>
							</li> -->
							<!-- bill -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="fa fa-rupee"></i>
									<span class="title">Bill</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showbill" class="nav-link "> <span class="title">view Bill</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addbill" class="nav-link "> <span class="title">Add
												Bill</span>
										</a>
									</li>
								</ul>
							</li>
							<!-- patient history	 -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="fa fa-history"></i>
									<span class="title">Patient history</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showhistory" class="nav-link "> <span class="title">show patient history</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addhistory" class="nav-link "> <span class="title">add patient history
												</span>
										</a>
									</li>
								</ul>
							</li>
							<!-- contactus -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">contacts</i>
									<span class="title">Contact us</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showcontact" class="nav-link "> <span class="title">View contactus</span>
										</a>
									</li>
								</ul>
							</li>		
				
						<?php } else {?>

						<?php if($_SESSION['user_type']=='doctor') { ?>
							<!-- dashboard -->
							<li class="nav-item start active open">
								<a href="<?php echo base_url();?>Admin/index" class="nav-link nav-toggle">
									<i class="material-icons">dashboard</i>
									<span class="title">Dashboard</span>
									<!-- <span class="selected"></span> -->
								</a>							
							</li>
							<!-- appoitmenent -->
							<!-- <li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"><i class="material-icons">assignment</i>
									<span class="title">Appointment</span><span class="arrow"></span></a>
								<ul class="sub-menu">						
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showappointment" class="nav-link "> <span class="title">View All
												Appointment</span>
										</a>
									</li>
								</ul>
							</li>
 -->
							<!-- book appointment -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"><i class="material-icons">assignment</i>
									<span class="title">Book Appointment</span><span class="arrow"></span></a>
								<ul class="sub-menu">
								
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showbookappointment" class="nav-link "> <span class="title">View All book
												Appointment</span>
										</a>
									</li>
								</ul>
							</li>
							<!-- patient -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">accessible</i>
									<span class="title">Patients</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showpatient" class="nav-link "> <span class="title">All
												Patients</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addpatient" class="nav-link "> <span class="title">Add
												Patient</span>
										</a>
									</li>
								</ul>
							</li>
								
							<!-- prescription -->
							<!-- <li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons"> receipt</i>
									<span class="title">Prescription</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addprescription" class="nav-link "> <span class="title">Add
												Prescription</span>
										</a>
									</li>

									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showprescription" class="nav-link "> <span class="title">Show Prescription</span>
										</a>
									</li>
									
									<li class="nav-item  ">
										<a href="patient_profile.html" class="nav-link "> <span class="title">Edit Prescription </span>
										</a>
									</li>
								</ul>
							</li> -->
							<!-- receptionist -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">group</i>
									<span class="title">Receptonist</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showreceptionist" class="nav-link "> <span class="title">All
												Receptionist</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addreceptionist" class="nav-link "> <span class="title">Add Receptionist</span>
										</a>
									</li>
									
									
								</ul>
							</li>
							<!-- patient history -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="fa fa-history"></i>
									<span class="title">Patient history</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showhistory" class="nav-link "> <span class="title">show patient history</span>
										</a>
									</li>
									
								</ul>
							</li>
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="fa fa-medkit"></i>
									<span class="title">Medicine</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addmedicine" class="nav-link "> <span class="title">Add
												Medicine</span>
										</a>
									</li>

									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showmedicine" class="nav-link "> <span class="title">Show Medicine</span>
										</a>
									</li>
									
									<!-- <li class="nav-item  ">
										<a href="patient_profile.html" class="nav-link "> <span class="title">Edit Medicine </span>
										</a>
									</li> -->
								</ul>
							</li>
							<!-- bill -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="fa fa-rupee"></i>
									<span class="title">Bill</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">									
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addbill" class="nav-link "> <span class="title">Add Bill</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showbill" class="nav-link "> <span class="title">view Bill</span>
										</a>
									</li>
								</ul>
							</li>
							<!-- contactus -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">contacts</i>
									<span class="title">Contact us</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showcontact" class="nav-link "> <span class="title">show contactus</span>
										</a>
									</li>
								</ul>
							</li>


							<?php } else {?>
							<?php if($_SESSION['user_type']=='receptionist') { ?>
								<!-- dashboard -->
							<li class="nav-item start active open">
								<a href="<?php echo base_url();?>Admin/index" class="nav-link nav-toggle">
									<i class="material-icons">dashboard</i>
									<span class="title">Dashboard</span>
									<!-- <span class="selected"></span> -->
								</a>
							</li>

							<!-- appointment -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"><i class="material-icons">assignment</i>
									<span class="title">Appointment</span><span class="arrow"></span></a>
								<ul class="sub-menu">						
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showappointment" class="nav-link "> <span class="title">View All
												Appointment</span>
										</a>
									</li>
								</ul>
							</li>

							<!-- book appointment -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"><i class="material-icons">assignment</i>
									<span class="title">Book Appointment</span><span class="arrow"></span></a>
								<ul class="sub-menu">
									
									
								
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showbookappointment" class="nav-link "> <span class="title">View All book
												Appointment</span>
										</a>
									</li>
								</ul>
							</li>
							<!-- patient -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">accessible</i>
									<span class="title">Patients</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showpatient" class="nav-link "> <span class="title">All
												Patients</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addpatient" class="nav-link "> <span class="title">Add
												Patient</span>
										</a>
									</li>
																		
								</ul>
							</li>
							<!-- patient history -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="fa fa-history"></i>
									<span class="title">Patient history</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showhistory" class="nav-link "> <span class="title">show patient history</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addhistory" class="nav-link "> <span class="title">add patient history
												</span>
										</a>
									</li>
								</ul>
							</li>
							<!-- bill -->
							<!-- <li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="fa fa-rupee"></i>
									<span class="title">Bill</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showbill" class="nav-link "> <span class="title">view Bill</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/addbill" class="nav-link "> <span class="title">Add
												Bill</span>
										</a>
									</li>
								</ul>
							</li> -->
							<!-- contactus -->
							<li class="nav-item  ">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">contacts</i>
									<span class="title">Contact us</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="<?php echo base_url();?>Admin/showcontact" class="nav-link "> <span class="title">show contactus</span>
										</a>
									</li>
								</ul>
							</li>

							<?php }}} ?>
								
						


							
							<!-- <li class="nav-item  ">
								<a href="javascript:;" class="nav-link nav-toggle">
									<i class="material-icons">timeline</i>
									<span class="title">Charts</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="charts_echarts.html" class="nav-link ">
											<span class="title">eCharts</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="charts_morris.html" class="nav-link ">
											<span class="title">Morris Charts</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="charts_chartjs.html" class="nav-link ">
											<span class="title">Chartjs</span>
										</a>
									</li>
								</ul>
							</li> -->
							<!-- <li class="nav-item  ">
								<a href="javascript:;" class="nav-link nav-toggle">
									<i class="material-icons">map</i>
									<span class="title">Maps</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item  ">
										<a href="google_maps.html" class="nav-link ">
											<span class="title">Google Maps</span>
										</a>
									</li>
									<li class="nav-item  ">
										<a href="vector_maps.html" class="nav-link ">
											<span class="title">Vector Maps</span>
										</a>
									</li>
								</ul>
							</li>
							 -->
							
						</ul>
					</div>
				</div>
			</div>
			<!-- end sidebar menu -->
			<!-- start chat sidebar -->
			<div class="chat-sidebar-container" data-close-on-body-click="false">
				<div class="chat-sidebar">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="#quick_sidebar_tab_1" class="nav-link active tab-icon" data-toggle="tab"> <i
									class="material-icons">chat</i>Chat
								<span class="badge badge-danger">4</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#quick_sidebar_tab_3" class="nav-link tab-icon" data-toggle="tab"> <i
									class="material-icons">settings</i>
								Settings
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<!-- Start Doctor Chat -->
						<div class="tab-pane active chat-sidebar-chat in active show" role="tabpanel"
							id="quick_sidebar_tab_1">
							<div class="chat-sidebar-list">
								<div class="chat-sidebar-chat-users slimscroll-style" data-rail-color="#ddd"
									data-wrapper-class="chat-sidebar-list">
									<div class="chat-header">
										<h5 class="list-heading">Online</h5>
									</div>
									<ul class="media-list list-items">
										<li class="media"><img class="media-object" src="<?= ASSETS_PATH?>img/doc/doc3.jpg" width="35"
												height="35" alt="...">
											<i class="online dot"></i>
											<div class="media-body">
												<h5 class="media-heading">John Deo</h5>
												<div class="media-heading-sub">Spine Surgeon</div>
											</div>
										</li>
										<li class="media">
											<div class="media-status">
												<span class="badge badge-success">5</span>
											</div> <img class="media-object" src="<?= ASSETS_PATH?>img/doc/doc1.jpg" width="35"
												height="35" alt="...">
											<i class="busy dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Rajesh</h5>
												<div class="media-heading-sub">Director</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="<?= ASSETS_PATH?>img/doc/doc5.jpg" width="35"
												height="35" alt="...">
											<i class="away dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Jacob Ryan</h5>
												<div class="media-heading-sub">Ortho Surgeon</div>
											</div>
										</li>
										<li class="media">
											<div class="media-status">
												<span class="badge badge-danger">8</span>
											</div> <img class="media-object" src="<?= ASSETS_PATH?>img/doc/doc4.jpg" width="35"
												height="35" alt="...">
											<i class="online dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Kehn Anderson</h5>
												<div class="media-heading-sub">CEO</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="<?= ASSETS_PATH?>img/doc/doc2.jpg" width="35"
												height="35" alt="...">
											<i class="busy dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Sarah Smith</h5>
												<div class="media-heading-sub">Anaesthetics</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="<?= ASSETS_PATH?>img/doc/doc7.jpg" width="35"
												height="35" alt="...">
											<i class="online dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Vlad Cardella</h5>
												<div class="media-heading-sub">Cardiologist</div>
											</div>
										</li>
									</ul>
									<div class="chat-header">
										<h5 class="list-heading">Offline</h5>
									</div>
									<ul class="media-list list-items">
										<li class="media">
											<div class="media-status">
												<span class="badge badge-warning">4</span>
											</div> <img class="media-object" src="<?= ASSETS_PATH?>img/doc/doc6.jpg" width="35"
												height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Jennifer Maklen</h5>
												<div class="media-heading-sub">Nurse</div>
												<div class="media-heading-small">Last seen 01:20 AM</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="<?= ASSETS_PATH?>img/doc/doc8.jpg" width="35"
												height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Lina Smith</h5>
												<div class="media-heading-sub">Ortho Surgeon</div>
												<div class="media-heading-small">Last seen 11:14 PM</div>
											</div>
										</li>
										<li class="media">
											<div class="media-status">
												<span class="badge badge-success">9</span>
											</div> <img class="media-object" src="<?= ASSETS_PATH?>img/doc/doc9.jpg" width="35"
												height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Jeff Adam</h5>
												<div class="media-heading-sub">Compounder</div>
												<div class="media-heading-small">Last seen 3:31 PM</div>
											</div>
										</li>
										<li class="media"><img class="media-object" src="<?= ASSETS_PATH?>img/doc/doc10.jpg" width="35"
												height="35" alt="...">
											<i class="offline dot"></i>
											<div class="media-body">
												<h5 class="media-heading">Anjelina Cardella</h5>
												<div class="media-heading-sub">Physiotherapist</div>
												<div class="media-heading-small">Last seen 7:45 PM</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- End Doctor Chat -->
						<!-- Start Setting Panel -->
						<div class="tab-pane chat-sidebar-settings" role="tabpanel" id="quick_sidebar_tab_3">
							<div class="chat-sidebar-settings-list slimscroll-style">
								<div class="chat-header">
									<h5 class="list-heading">Layout Settings</h5>
								</div>
								<div class="chatpane inner-content ">
									<div class="settings-list">
										<div class="setting-item">
											<div class="setting-text">Sidebar Position</div>
											<div class="setting-set">
												<select
													class="sidebar-pos-option form-control input-inline input-sm input-small ">
													<option value="left" selected="selected">Left</option>
													<option value="right">Right</option>
												</select>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Header</div>
											<div class="setting-set">
												<select
													class="page-header-option form-control input-inline input-sm input-small ">
													<option value="fixed" selected="selected">Fixed</option>
													<option value="default">Default</option>
												</select>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Footer</div>
											<div class="setting-set">
												<select
													class="page-footer-option form-control input-inline input-sm input-small ">
													<option value="fixed">Fixed</option>
													<option value="default" selected="selected">Default</option>
												</select>
											</div>
										</div>
									</div>
									<div class="chat-header">
										<h5 class="list-heading">Account Settings</h5>
									</div>
									<div class="settings-list">
										<div class="setting-item">
											<div class="setting-text">Notifications</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-1">
														<input type="checkbox" id="switch-1" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Show Online</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-7">
														<input type="checkbox" id="switch-7" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Status</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-2">
														<input type="checkbox" id="switch-2" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">2 Steps Verification</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-3">
														<input type="checkbox" id="switch-3" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="chat-header">
										<h5 class="list-heading">General Settings</h5>
									</div>
									<div class="settings-list">
										<div class="setting-item">
											<div class="setting-text">Location</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-4">
														<input type="checkbox" id="switch-4" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Save Histry</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-5">
														<input type="checkbox" id="switch-5" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
										<div class="setting-item">
											<div class="setting-text">Auto Updates</div>
											<div class="setting-set">
												<div class="switch">
													<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
														for="switch-6">
														<input type="checkbox" id="switch-6" class="mdl-switch__input"
															checked>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end chat sidebar -->