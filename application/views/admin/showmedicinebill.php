<?php include 'includes/header.php';?>


		<!-- start page container -->
		<div class="page-container">
		
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Medicine Bill List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo base_url();?>Clinic_controller/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#"> Medicine Bill</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active"> Medicine Bill List</li>
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
												<a href="<?php echo base_url();?>Clinic_controller/addmedicinebill" id="addRow"
													class="btn btn-info">
													Add New <i class="fa fa-plus"></i>
														</a>
														</div>
														</div>
															
												</div>
									<form method="get">
									<div class="table-scrollable">
									<table
			              class="table table-hover table-checkable order-column full-width" id="example4">
						<thead>
						<tr>

						<th>No</th>
					    <th> Medicine Name </th>
					    <th>Time</th>
					    <th>Meal</th>
					    <th>qty </th>
							<th>price </th>
							<th>Action </th>
						</tr>
						</thead>
						<tbody>
							<?php 
						$no=1;

					
					        foreach($bill_data1 as $bill1)
					        {
						?>						
						<tr>
						<td><?php echo $no++?></td>
					   <td><?php  echo $bill1['medicine_name'];?></td>
					    <td><?php  echo $bill1['time'];?></td>
					     <td><?php  echo $bill1['meal'];?></td>
					   <td><?php echo $bill1['qty'];?></td> 
						<td id="loop"><?php echo $bill1['price'];?></td>
						
					<td>
						<a href="<?php echo base_url();?>Clinic_controller/deletebill/<?php echo $bill1['medicine_bill_id_pk'];?>"
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
								</form>
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