<!DOCTYPE html>
<html lang="en">
<!-- <style type="text/css">
	a:hover {
  color: red;
}
a:active{
	color: transparent;
}
</style> -->

<!-- Mirrored from preview.colorlib.com/theme/dentacare/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 May 2021 17:19:10 GMT -->
<head>
<title>Dentshine</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" href="<?= USER_PATH?>css/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="<?= USER_PATH?>css/animate.css">
<link rel="stylesheet" href="<?= USER_PATH?>css/owl.carousel.min.css">
<link rel="stylesheet" href="<?= USER_PATH?>css/owl.theme.default.min.css">
<link rel="stylesheet" href="<?= USER_PATH?>css/magnific-popup.css">
<link rel="stylesheet" href="<?= USER_PATH?>css/aos.css">
<link rel="stylesheet" href="<?= USER_PATH?>css/ionicons.min.css">
<link rel="stylesheet" href="<?= USER_PATH?>css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?= USER_PATH?>css/jquery.timepicker.css">
<link rel="stylesheet" href="<?= USER_PATH?>css/flaticon.css">
<link rel="stylesheet" href="<?= USER_PATH?>css/icomoon.css">
<link rel="stylesheet" href="<?= USER_PATH?>css/style.css">
<link rel="shortcut icon" href="<?= USER_PATH?>images/icon.png" />

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
<div class="container">
<a class="navbar-brand" href="index.html"><span>Dentshine</span></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
<span class="oi oi-menu"></span> Menu
</button>
<!-- <a class="nav-link" id="v-pills-mission-tab" href="#v-pills-mission" role="tab" aria-controls="v-pills-mission" aria-selected="false">Our mission</a> -->
<div class="collapse navbar-collapse" id="ftco-nav">
<ul class="navbar-nav ml-auto">
<li class="nav-item "><a href="<?php echo base_url()?>Client/index" class="nav-link">Home</a></li>

<li class="nav-item "><a href="<?php echo base_url()?>Client/aboutus" class="nav-link">About</a></li>
<li class="nav-item "><a href="<?php echo base_url()?>Client/service" class="nav-link">Services</a></li>
<li class="nav-item"><a href="<?php echo base_url()?>Client/doctors" class="nav-link">Doctors</a></li>



<?php if(isset($_SESSION['user_id'])){?>
<li class="nav-item"><a href="<?php echo base_url()?>Client/patientprofile" class="nav-link">My Profile</a></li>

<li class="nav-item"><a href="<?php echo base_url()?>Client/contactus" class="nav-link">Contact</a></li>

<li class="nav-item"><a href="<?php echo base_url()?>Client/logout" class="nav-link">Log Out</a></li>

<?php } else { ?>
<li class="nav-item"><a href="<?php echo base_url()?>Client/adduser" class="nav-link">Login</a></li>

<?php } ?>
<li class="nav-item cta"><a href=""class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Make an Appointment</span></a></li>
</ul>
</div>
</div>
</nav>


<div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modalRequestLabel">Make an Appointment</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">



<?php if(isset($_SESSION["user_id"]))

	{  
		$patient_data = $this->patient_model->patientdata($_SESSION['user_id'])?>

<form method="post"action="<?php echo base_url()?>Client/insertappointment" id="form_sample_1" class="form-horizontal">
<!-- <script type="text/javascript">alert("hello");</script> -->
	<div class="form-body">
		<div class="form-group row">
			
			<!-- <input type="hidden" name="case_id" value="<?php echo $patient_data['case_id'];?>"> -->

			<label class="control-label col-md-3">Patient Name</label>				

			<div class="col-md-6">
				<div class="form-group">
				<input type="text" name="patient_name" class="form-control" placeholder="Full Name" value="<?php echo $patient_data['patient_name'].'(' . $patient_data['case_id']. ')';?>" >
				</div>
			</div>
		</div>
		
	<div class="form-group row">
		<label class="control-label col-md-3">Appointment type</label>
		<div class="col-md-6">
			<select class="form-control input-height" name="ap_type" required>
				<option value="">Select...</option>
				<option value="Routine Appointments">Routine Appointments </option>
				<option value="Minor Pain">Minor Pain</option>
				<option value="Emergency">Emergency</option>
			</select>
		</div>
	</div>

	 <div class="form-group row">
        <label class="control-label col-md-3">Treatment </label> 
        	<div class="col-md-6">
                <select class="form-control input-height" name="treatment_name" required>
                    <option  selected="" disable="" value="">select</option>
                        <?php foreach($treatment_data as $treatment)
                        { ?>
                    <option value="<?php echo $treatment['treatment_id_pk'];?>">
                       <?php echo $treatment['treatment_name'];?>
                    </option>
                        <?php } ?>
                </select>
            </div>
     </div> 

	<div class="form-group row">
			<label class="control-label col-md-3">Email id</label>
			<div class="col-md-6">
				<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="email id" value="<?php echo $patient_data['email_id']?>">
				</div>
			</div>
	</div>

	<div class="form-group row">
			<label class="control-label col-md-3">Age</label>
			<div class="col-md-6">
				<div class="form-group">
				<input type="number" name="age" class="form-control" placeholder="age" value="<?php echo $patient_data['age']?>">
				</div>
			</div>
	</div>

	<div class="form-group row">
		<label class="control-label col-md-3">Date</label>
		<div class="col-md-6">
			<input type="date" name="date" placeholder="Date" class="form-control" required >
		</div>
	</div>											
											
	<div class="form-group row">
		<label class="control-label col-md-3">Mobile No.</label>
		<div class="col-md-6">
			<input name="mobile_no" type="text" placeholder="Mobile No" class="form-control input-height" value="<?php echo $patient_data['mobile_no']?>" required /> 
		</div>
	</div>

	<div class="form-group row">
		<label class="control-label col-md-3">Message</label>
		<div class="col-md-5">
			<textarea name="reason" placeholder="Reason" class="form-control-textarea" cols="30" rows="7">
			</textarea>
		</div>
	</div>
											
	</div>
	<div class="form-actions">
		<div class="row">
			<div class="offset-md-3 col-md-9">
				<button type="submit" class="btn btn-info m-r-20">Submit</button>
				<button type="reset" class="btn btn-default">Cancel</button>
			</div>
		</div>
	</div>

</form>

<?php } else {  ?> 
	<form method="post"action="<?php echo base_url()?>Client/insertappointment" id="form_sample_1" class="form-horizontal">
<!-- <script type="text/javascript">alert("hello");</script> -->

	<div class="form-body">
		<div class="form-group row">
		<input type="hidden" name="case_id" value="NEW CASE">
			<label class="control-label col-md-3">Patient Name</label>				
			<div class="col-md-6">
				<div class="form-group">
				<input type="text" name="patient_name" class="form-control" placeholder="Full Name" >
				</div>
			</div>
		</div>
		
	<div class="form-group row">
		<label class="control-label col-md-3">Appointment type</label>
		<div class="col-md-6">
			<select class="form-control input-height" name="ap_type" required>
				<option value="">Select...</option>
				<option value="Routine Appointments">Routine Appointments </option>
				<option value="Minor Pain">Minor Pain</option>
				<option value="Emergency">Emergency</option>
				<option value="Emergency">Surgival procedure</option>
			</select>
		</div>
	</div>

	 <div class="form-group row">
        <label class="control-label col-md-3">Treatment </label> 
        	<div class="col-md-6">
                <select class="form-control input-height" name="treatment_name" required>
                    <option  selected="" disable="" value="">select</option>
                        <?php foreach($treatment_data as $treatment)
                        { ?>
                    <option value="<?php echo $treatment['treatment_id_pk'];?>">
                       <?php echo $treatment['treatment_name'];?>
                    </option>
                        <?php } ?>
                </select>
            </div>
     </div> 

	<div class="form-group row">
			<label class="control-label col-md-3">Email id</label>
			<div class="col-md-6">
				<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="email id" >
				</div>
			</div>
	</div>

	<div class="form-group row">
			<label class="control-label col-md-3">Age</label>
			<div class="col-md-6">
				<div class="form-group">
				<input type="number" name="age" class="form-control" placeholder="age" >
				</div>
			</div>
	</div>

	<div class="form-group row">
		<label class="control-label col-md-3">Date</label>
		<div class="col-md-6">
			<input type="date" name="date" placeholder="Date" class="form-control" required  />
		</div>
	</div>
											
	<div class="form-group row">
		<label class="control-label col-md-3">Mobile No.</label>
		<div class="col-md-6">
			<input name="mobile_no" type="text" placeholder="Mobile No" class="form-control input-height"  required /> 
		</div>
	</div>

	<div class="form-group row">
		<label class="control-label col-md-3">Message</label>
		<div class="col-md-5">
			<textarea name="reason" placeholder="Reason" class="form-control-textarea" cols="30" rows="7">
			</textarea>
		</div>
	</div>
											
	</div>
	<div class="form-actions">
		<div class="row">
			<div class="offset-md-3 col-md-9">
				<button type="submit" class="btn btn-info m-r-20">Submit</button>
				<button type="reset" class="btn btn-default">Cancel</button>
			</div>
		</div>
	</div>

</form>
<?php }?>

</div>
</div>
</div>
</div>

