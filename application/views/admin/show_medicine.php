<?php include 'includes/header.php';?>


		<!-- start page container -->
		<div class="page-container">s
		
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Medicine List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo base_url();?>index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Medicine</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Medicine List</li>
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
												<a href="<?php echo base_url();?>Admin/addmedicine" id="addRow"
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
						<th>Medicine name</th>	
						<th> quantity </th>
						<th> Description </th>
						<th> price </th>
						<th> Action </th>
						</tr>
						</thead>
						<tbody>
						<?php $no=1;
						foreach($medicine_data as $medicine)
						{
						?>
						<tr>
						<td><?php echo $no++?></td>
						<td><?php echo $medicine['medicine_name'];?></td>
						<td><?php echo $medicine['quantity'];?></td>
						<td><?php echo $medicine['description'];?></td>
						<td><?php echo $medicine['price'].' ₹';?></td>
						

						<td>
						<a href="<?php echo base_url();?>Admin/editmedicine/<?php echo $medicine['medicine_id_pk'];?>"
						class="btn btn-primary btn-xs">
						<i class="fa fa-pencil"></i>
						</a>
						<a href="<?php echo base_url();?>Admin/deletemedicine/<?php echo $medicine['medicine_id_pk'];?>"
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