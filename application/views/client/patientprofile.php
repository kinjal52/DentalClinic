<?php include 'includes/header.php';?>
<?php include 'includes/main.php';?>
<h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">My Profile</h1>
</div>
</div>
</div>
</section>
<style type="text/css">
img{
  border-radius: 50%;

}
table, td, th {  
  border: 0px solid #ddd;
  /*text-align: left;*/
  border-collapse: collapse;
  word-spacing: 10px;
  padding: 15px;
}
#box {
  border: 0px solid;
  padding: 10px;
  box-shadow: 5px 5px 5px 5px #888888;
  /*box-shadow: 10px 10px 5px 5px #888888;*/
}
.row{
	  margin-left:50px;
	   margin-right:50px;
}
.row::after {
  content: "";
  clear: both;
  display: table;
}
.column {
  float: left;
  width: 50%;
  padding: 50px;
}  
</style>

<section class="ftco-section">
	<form action="<?php echo base_url();?>Client/edituserprofile">
	<div class="row">
		<div class="column">
<div class="container">
	<div class="fxt-content">


<table  id="box">

<div class="row">
  <?php if(isset($_SESSION["user_id"]))
	{  
		$patient_data = $this->patient_model->patientdata($_SESSION['user_id']); 
		$user_data= $this->user_model->userdata($_SESSION['user_id']);?>

<div class="col-lg-6 col-md-6 d-flex mb-sm-4 ftco-animate">
	<div class="info text-center">

	<tr>
		<td colspan="2" align="center"><img src="<?php echo base_url().$patient_data['picture'];?>" style="width:190px; height: 200px;" ></td>
	</tr>
	
	<tr>
		<th>Name</th>
		<td><?php echo $patient_data['patient_name'];?></td>
	</tr>
	<tr>
		<th>Gender</th>
		<td><?php echo $patient_data['gender'];?></td>
	</tr>
	<tr>
		<th>Age</th>
		<td><?php echo $patient_data['age'];?></td>
	</tr>
	<tr>
		<th>Email Address</th>
		<td><?php echo $patient_data['email_id'];?></td>
	</tr>
	<tr>
		<th>Mobile No</th>
		<td><?php echo $patient_data['mobile_no'];?></td>
	</tr>
	<tr>
		<th>Address</th>
		<td><?php echo $patient_data['address'];?></td>
	</tr>
	<tr>
		<th></th>
				<td><button type="submit" class="btn btn-info m-r-20">Edit</button>
					<a href="<?php echo base_url();?>Client/changepass/<?php echo $_SESSION
					['user_id']; ?>" id="addRow"class="btn btn-info">Change password</a>
				</td>
	</tr>
</div>

</div>

<?php } ?>
</div>
</table>

</div>
</div>
</div>
<div class="column">
	<table id="box">
		<div class="row">
			<div class="col-lg-6 col-md-6 d-flex mb-sm-4 ftco-animate">
				<div class="info text-center">
					<tr>
						<td align="center"><b>View History</b></td>
					</tr>
		<tr>
			<th>
				<a href="<?php echo base_url();?>Client/appoitmentdetail" id="addRow"class="btn btn-info">Appoitment History</a>
			</th> 
			<td></td>
		</tr>

		<tr>
			<th>
				<a href="<?php echo base_url();?>Client/billdetail" id="addRow"class="btn btn-info">Bill History</a>
			</th>
			<td></td>
		</tr>
	</div>
</div>

		</div>
	</table>
</div>
</div>

</form>
</section>





<?php include 'includes/footer.php';?>