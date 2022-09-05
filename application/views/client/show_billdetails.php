<?php include 'includes/header.php';?>
<?php include 'includes/main.php';?>
<h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Bill History</h1>
</div>
</div>
</div>
</section>

<section class="ftco-section">
<div class="container">
<div class="row justify-content-center mb-5 pb-5">
<div class="col-md-7 text-center heading-section ftco-animate">
<h2 class="mb-4"><b>Bill History Details</b></h2><hr>

</div>
</div>

<div class="row">
	<?php if(isset($_SESSION["user_id"]))
			{
				$bill_data = $this->bill_model->billdatahistory($_SESSION['user_id']);
   foreach ($bill_data as $bill)
  { ?>
  	
<div class="col-lg-4 col-md-6 d-flex mb-sm-4 ftco-animate">
<div class="staff">
<div class="info text-center">
<div class="text">
<p ><b>Patient : </b><?php echo $bill['patient_name'];?></p>
<p><b>Treatment : </b><?php echo $bill['treatment_name'];?></p>
<p><b>Doctor : </b><?php echo $bill['doctor_name'];?></p>
<p><b>Total amount : </b><?php echo $bill['total_amount'];?></p>
</div>
</div>
</div>
</div>

<?php } } ?>
</div>
</div>
<!-- <div class="row">
	<?php if(isset($_SESSION["user_id"]))
			{
				$bill_data = $this->bill_model->billdatahistory($_SESSION['user_id']);
   foreach ($bill_data as $bill)
  { ?>
  	
<div class="col-lg-4 col-md-6 d-flex mb-sm-4 ftco-animate">
<div class="staff">
<div class="info text-center">
<div class="text">
<p ><b>Doctor : </b><?php echo $bill['patient_name'];?></p>
<p><b>Treatment : </b><?php echo $bill['treatment_name'];?></p>
<p><b>Doctor : </b><?php echo $bill['doctor_name'];?></p>
<p><b>Total amount : </b><?php echo $bill['total_amount'];?></p>
</div>
</div>
</div>
</div>

<?php } } ?>
</div>
</div> -->
</section>



<?php include 'includes/footer.php';?>
