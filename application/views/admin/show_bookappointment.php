<?php include 'includes/header.php';?>


	<div class="page-container">s
		
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title"> Book appointment List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo base_url();?>Admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Appointment</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Book appointment List</li>
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
												<a href="<?php echo base_url();?>Admin/addbookappointment" id="addRow"
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
															
												</div>
									<div class="table-scrollable">
									<table
			              class="table table-hover table-checkable order-column full-width" id="example4">
						<thead>
						<tr>
						<th>No</th>
						<th>Patient name</th>	
						<!-- <th> Appointment type </th> -->
						<th> Treatment name </th>
            <th> Doctor name </th>
						<th> Date </th>
						<th> Time </th>
						<th> Reason </th>
						<th> Action </th>
						</tr>
						</thead>
						<tbody>
						<?php $no=1;
						foreach($bappointment_data as $appointment)
						{
							
						?>
						<tr>
						<td><?php echo $no++?></td>
						
						<td><?php echo $appointment['patient_name'];?></td>
						<td><?php echo $appointment['treatment_name'];?></td>
						<td><?php echo $appointment['doctor_name'];?></td>
						<td><?php echo $appointment['date'];?></td>						
						<td><?php echo $appointment['time'];?></td>
						<td><?php echo $appointment['reason'];?></td>



						<td>
						<a href="<?php echo base_url();?>Admin/editbookappointment/<?php echo $appointment['ap_book_id_pk'];?>"
						class="btn btn-primary btn-xs">
						<i class="fa fa-pencil"></i>
						</a>
						<a href="<?php echo base_url();?>Admin/deletebookappointment/<?php echo $appointment['ap_book_id_pk'];?>"
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
								
							</div>
							</div> 
						</div>
					</div> 
				</div>
			</div>




<?php include 'includes/footer.php';?>