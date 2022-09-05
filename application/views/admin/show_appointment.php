<?php include 'includes/header.php';?>
<head><meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</head>

	<div class="page-container">s
		
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Appointment List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo base_url();?>index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Doctors</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Appointment List</li>
							</ol>
						</div>
					</div>
				
			<div class="tab-content">
				<div class="tab-pane active fontawesome-demo" id="tab1">
				<div class="row">
				   <div class="col-md-12">
					  <div class="card card-topline-red">
						<div class="card-head">
							<div class="tools">
							<a class="fa fa-repeat btn-color box-refresh"
								href="javascript:;"></a>
									<a class="t-collapse btn-color fa fa-chevron-down"
									href="javascript:;"></a>
									<a class="t-close btn-color fa fa-times"
									href="javascript:;"></a>
									</div>
									</div>
									<div class="card-body ">
										<div class="row">
											<div class="col-md-6 col-sm-6 col-xs-6">
												<div class="btn-group">
												<a href="<?php echo base_url();?>Admin/addappointment" id="addRow"
													class="btn btn-info">
													Add New <i class="fa fa-plus"></i>
														</a>
														</div>
														</div>
														<div class="col-md-6 col-sm-6 col-xs-6">
														<div class="btn-group pull-right">
															<a class="btn deepPink-bgcolor  btn-outline dropdown-toggle"data-toggle="dropdown">Tools
															<i class="fa fa-angle-down"></i>
															</a>
															<ul class="dropdown-menu pull-right">
																<li><a href="javascript:window.print();">
																	<i class="fa fa-print"></i> Print </a>
																</li>
																<li><a href="javascript:;">
																	<i class="fa fa-file-pdf-o"></i> Save as PDF </a>
																</li>
																<li><a href="javascript:;">
																	<i class="fa fa-file-excel-o"></i>Export to Excel </a>
																</li>
															</ul>
														</div>
													</div>
															
												</div>
									<div class="table-scrollable">

									<table
			              class="table table-hover table-checkable order-column full-width" id="example4">
						<thead>
						<tr>
						<th>No</th>
						<th> Action </th>
						<th> Date </th>
						<th> Patient Details</th>	
						<th> Appointment type </th>
						<th> Treatment Details</th>
						<!-- <th> Reason </th> -->
						
						</tr>
						</thead>
						<tbody>
						<?php $no=1;
						foreach($appointment_data as $appointment)
						{
						?>
						<tr>
						<td><?php echo $no++?></td>
						<td>
						

						<a href="<?php echo base_url();?>Admin/deleteappointment/<?php echo $appointment['ap_id_pk'];?>"
						class="btn btn-danger btn-xs">
						<i class="fa fa-trash-o "></i>
						</a>
						
						<a class="label label-sm label-warning" data-toggle="modal" data-target="#myModal<?php echo $appointment['ap_id_pk'];?>"><i>Book Appoitment</i>
						</a>

						</td>
						<td><?php echo $appointment['date'];?></td>
						<td><?php echo '</br><b>Name : </b>'.$appointment['patient_name'].'</br><b>Email : </b>'.$appointment['email'].'</br><b>Age : </b>'.$appointment['age'].'</br><b>Mobile no : </b>'.$appointment['mobile_no'];?></td>
						<td><?php echo $appointment['ap_type'];?></td>
						<td><?php echo '</br><b>Name : </b>'.$appointment['treatment_name'].'</br><b>Reason</b> : '.$appointment['reason'];?></td>
						</tr>
						<?php } ?>	
							</tbody> 
								</table>
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
				</div>
			</div>


<!-- popup -->
<?php 
foreach($appointment_data as $appointment)
	{ ?>
<div class="modal fade" id="myModal<?php echo $appointment['ap_id_pk'];?>" role="dialog" >
    <div class="modal-dialog modal-sm" >
      <div class="modal-content">
        <div class="modal-header">
        	<form action="<?php echo base_url();?>Admin/insertbookappointment/<?php echo $appointment['ap_id_pk'];?>" method="post">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h5 class="modal-title">Modal Header</h5> -->
        </div>
        
        <div class="modal-body">
        	<table >
        		
        	<tr>
        		<th>patient name :</th>
        		<td><input type="text" class="form-control input-height" name="patient_name" readonly value="<?php echo $appointment['patient_name'];?>"></td>
        	</tr>
        	<tr>
        		<!-- <th>Email :</th> -->
        		<td><input type="text" class="form-control input-height" name="email" hidden readonly value="<?php echo $appointment['email'];?>"></td>
        	</tr>
        	<tr>
        		<!-- <th>Age :</th> -->
        		<td><input type="text" name="age" class="form-control input-height" hidden value="<?php echo $appointment['age'];?>"></td>
        	</tr>
        	<tr>
        		<th>Mobile No :</th>
        		<td><input type="text" name="mobile_no" class="form-control input-height" readonly value="<?php echo $appointment['mobile_no'];?>"></td>
        	</tr>
        	<tr>
        		<th>Treatment :</th>
        		<td><input type="text" name="treatment_name" class="form-control input-height" readonly value="<?php echo $appointment['treatment_name'];?>"></td>
        	</tr>
        	<tr>
        		<th>Doctor :</th>
        		<td><select class="form-control input-height" name="doctor_name" required>
                  <option  selected="" disable="" value="">select</option>
                  	<?php foreach($doctor_data as $doctor)
                      { ?>
                      <option value="<?php echo $doctor['doctor_id_pk'];?>">
                        <?php echo $doctor['doctor_name'];?>
                      </option>
                    <?php } ?>
               </select>
            </td>
        	</tr>
        	<tr>
        		<!-- <th>Appoitment type :</th> -->
        		<td><input type="text" class="form-control input-height"  hidden readonly value="<?php echo $appointment['ap_type'];?>"></td>
        	</tr>
        	<tr>
        		<!-- <th>Reason :</th> -->
        		<td><input type="text" hidden class="form-control input-height" name="reason" value="<?php echo $appointment['reason'];?>"></td>
        	</tr>
        	<tr>
          		<th>Date : </th>
          		<td><input type="date" class="form-control input-height" name="date"  value="<?php echo $appointment['date'];?>"></td>
        	</tr>
        	<tr>
          		<th>Time : </th>
          		<td><input type="Time" name="time"required class="form-control input-height" ></td>
        	</tr>
         
        </table>
        </div>

        <div class="modal-footer">
        	<button type="submit" class="btn btn-round btn-info" >Book</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      
       </form>
    </div>
  </div>
</div>
<!-- end popup -->
<?php }?>



<?php include 'includes/footer.php';?>