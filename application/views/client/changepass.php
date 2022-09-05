<?php include 'includes/header.php';?>
<?php include 'includes/main.php';?>
<h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Change Password</h1>
</div>
</div>
</div>
</section>

<center>
<section class="ftco-section contact-section ftco-degree-bg">
<div class="container">
<div class="row d-flex mb-5 contact-info">
<div class="col-md-12 mb-4">
<h2 class="h4"><b>Change Password</b></h2>
</div>
<div class="w-100"></div>
</div>
<div class="row block-9">
	
<div class="col-md-6 pr-md-5">
	
<form  method="post" action="<?php echo base_url();?>Client/updatepass">
<div class="form-group">


	<?php 
	$user_data= $this->user_model->userdata($_SESSION['user_id']);	
	?>
		

	<input type="hidden" name="user_id_fk" value="<?php echo $user_data['user_id_fk'] ;?>">
</div>

<div class="form-group">
	<label><b>NewPassword</b></label>
<input type="text" class="form-control" placeholder="new password" name="user_cpassword"  required>
</div>

<div class="form-group">
	<label><b>Confirm Password</b></label>
<input type="text" class="form-control" placeholder="confirm password" name="user_password"  required>
</div>



<div class="form-group">
<input type="submit" value="Save" name="submit" class="btn btn-primary py-3 px-5">
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
</div>
</section>
</center>
<?php include 'includes/footer.php';?>
