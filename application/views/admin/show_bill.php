<?php include 'includes/header.php';?>
		<div class="page-container">
		
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Bill List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo base_url();?>Admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Bill</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Bill List</li>
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
									<a href="<?php echo base_url();?>Admin/addbill" id="addRow"
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
						<form method="get">
						<div class="table-scrollable">
						<table
              class="table table-hover table-checkable order-column full-width" id="example4">
			<thead>
			<tr>

			<th>No</th>
			<th>Patient name</th>
			<th> Treatment name </th>
		    <th> Doctor price </th>
			<th> Total amount </th>
			<th> Action </th>
			</tr>
			</thead>
			<tbody>
				
			<?php
			// if( (isset($_SESSION["user_id"])) && $_SESSION["user_type"]=="doctor")
			// {
			$no=1;
			
			 $bill_data=$this->bill_model->billdatalist($_SESSION['user_id']);
			
		        foreach($bill_data as $bill)
		        {

			?>
			<tr>
			<td><?php echo $no++?></td>
			<td><?php echo $bill['patient_name'];?></td>
		
		     <td><?php echo $bill['treatment_name'].'</br> ₹'. $bill['treatment_charges'];?></td> 
		    <td>₹ <?php echo $bill['consolation_charges'];?></td> 
			<td>₹ <?php echo $bill['total_amount'];?></td> 						

			<td>
		<a href="<?php echo base_url();?>Admin/editbill/<?php echo $bill['bill_id_pk'];?>"
			class="btn btn-primary btn-xs">
			<i class="fa fa-pencil"></i>
			</a>
		
			<a href="<?php echo base_url();?>Admin/deletebill/<?php echo $bill['bill_id_pk'];?>"
			class="btn btn-danger btn-xs">
			<i class="fa fa-trash-o "></i>

			</a>
			
			<br>
				<a href="<?php echo base_url();?>Admin/showmedicinebill/<?php echo $bill['bill_id_pk'];?>"class="btn dark btn-outline m-b-10">
			    medicine list

			</a>
		
			 <a href="<?php echo base_url();?>Admin/generatebill/<?php echo $bill['bill_id_pk'];?>"class="btn yellow btn-outline m-b-10">generate bill
			

			</a> 
                 
		
			</td>
			</tr>
					<?php }   ?>
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