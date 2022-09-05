<?php include 'includes/header.php';?>


		<!-- start page container -->
		<div class="page-container">
		
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Doctor List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo base_url();?>Admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Doctors</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Doctor List</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="tabbable-line">
								
								<ul class="nav customtab nav-tabs" role="tablist">
									<li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">List
											View</a></li>
									<li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">Grid
											View</a></li>
								</ul>
				
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
												<a href="<?php echo base_url();?>Admin/adddoctor" id="addRow"
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
						<th>Profile pictue</th>	
						<th> Name </th>
						<th> Gender </th>
						<th> Age </th>
						<th> Degree </th>
						<th> Experience </th>
						<th> Mobile No </th>
						<th> Email Address </th>
						<th> charges </th>
						<th> Action </th>
						</tr>
						</thead>
						<tbody>
						<?php $no=1;
						foreach($doctor_data as $doctor)
						{
						?>
						<tr>
						<td><?php echo $no++?></td>
						<td><img src="<?php echo base_url().$doctor['doctor_image'];?>" width="70" height="70"/></td>
						<td><?php echo $doctor['doctor_name'];?></td>
						<td><?php echo $doctor['gender'];?></td>
						<td><?php echo $doctor['age'];?></td>
						<td><?php echo $doctor['degree'];?></td>
						<td><?php echo $doctor['experience'];?></td>
						<td><?php echo $doctor['mobile_no'];?></td>
						<td><?php echo $doctor['email_id'];?></td>
						<td><?php echo $doctor['consolation_charges'];?></td>

						<td>
						<a href="<?php echo base_url();?>Admin/editdoctor/<?php echo $doctor['doctor_id_pk'];?>"
						class="btn btn-primary btn-xs">
						<i class="fa fa-pencil"></i>
						</a>
						<a href="<?php echo base_url();?>Admin/deletedoctor/<?php echo $doctor['doctor_id_pk'];?>"
						class="btn btn-danger btn-xs">
						<i class="fa fa-trash-o "></i>
						</a>
						</td>
						</tr>
						<?php
                          }
                            ?>	
							</tbody> 
								</table>
							</div>
							</div>
							</div>
							</div>
							</div>
							</div>
							<div class="tab-pane" id="tab2">
										<div class="row">
											<?php foreach($doctor_data as $doctor)
														{ ?>
											<div class="col-md-4">
												<div class="card card-topline-aqua">
													<div class="card-body no-padding ">
														<div class="doctor-profile">

														
															<img src="<?php echo base_url().$doctor['doctor_image'];?>"  class="doctor-pic" >
															<div class="profile-usertitle">
																<div class="doctor-name"><?php echo $doctor['doctor_name'];?> 
															</div>
																<div class="name-center"> <b>Dentist</b> </div>

																<div class="name-center"><b>Age : </b><?php echo $doctor['age'];?></div>
 															<div class="name-center"><b>Degree : </b><?php echo $doctor['degree'];?></div>

                              <div class="name-center"><b>Experience : </b><?php echo $doctor['experience'];?></div>
                              <div class="name-center"><b>Email id : </b><?php echo $doctor['email_id'];?></div>
															 </div>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:<?php echo $doctor['mobile_no'];?>"> <?php echo $doctor['mobile_no'];?></a></p>
															</div>
															
														
														</div>
													</div>
												</div>
										</div>
										<?php } ?>		
							</div>
							</div> 
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
		
<?php include 'includes/footer.php';?>