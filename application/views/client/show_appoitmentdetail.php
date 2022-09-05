<?php include 'includes/header.php';?>
<?php include 'includes/main.php';?>
<h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">My Appoitment Details</h1>
</div>
</div>
</div>
</section>

<section class="ftco-section">
<div class="container">
<div class="row justify-content-center mb-5 pb-5">
<div class="col-md-7 text-center heading-section ftco-animate">
<h2 class="mb-4"><b>Appoitment History Details</b></h2><hr>

</div>
</div>

<div class="row">
	<?php if(isset($_SESSION["user_id"]))
			{
				$appoitment_data = $this->appointmentbook_model->appoitmentdatalist($_SESSION['user_id']);
   foreach ($appoitment_data as $appointment)
  { ?>
<div class="col-lg-4 col-md-6 d-flex mb-sm-4 ftco-animate">
<div class="staff">
<div class="info text-center">
<div class="text">
<p ><b>Doctor : </b><?php echo $appointment['doctor_name'];?></p>
<p><b>Treatment : </b><?php echo $appointment['treatment_name'];?></p>
<p><b>Date : </b><?php echo $appointment['date'];?></p>
<p><b>Time : </b><?php echo $appointment['time'];?></p>
</div>
</div>
</div>
</div>

<?php } } ?>
</div>
</div>
</section>


<?php include 'includes/footer.php';?>
