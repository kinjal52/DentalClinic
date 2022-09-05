<?php include 'includes/header.php';?>

 	<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title"><?php echo (isset($receptionist_data))?"Update":"Add";?> Receptionist</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo base_url();?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Receptionist</a>&nbsp;<i
										class="fa fa-angle-right"></i>
								</li>
								<li class="active"><?php echo (isset($receptionist_data))?"Update":"Add";?>Receptionist</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Receptionist</header>
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul>
								</div>
								<div class="card-body" id="bar-parent">
                                    <?php if(!isset($receptionist_data)) { ?>
									<form method="post"action="<?php echo base_url()?>Admin/insertreceptionist" id="form_sample_1" class="form-horizontal">
										<div class="form-body">

											<div class="form-group row">
												<label class="control-label col-md-3">Receptionist Name
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="receptionist_name" 
														placeholder="enter  name"
													class="form-control input-height"/>
												</div>
											</div>
											
											
											<div class="form-group row">
												<label class="control-label col-md-3">Email_address
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="email_id" data-required="1"
													placeholder="enter email address"
													class="form-control input-height" />
												</div>
											</div>
											
											
											
												<div class="form-group row">
												<label class="control-label col-md-3">Mobile No.
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input name="mobile_no" type="text" placeholder="mobile no"
														class="form-control input-height" /> </div>
											</div>
											
										</div>
										<div class="form-actions">
											<div class="row">
												<div class="offset-md-3 col-md-9">
													<button type="submit" class="btn btn-info m-r-20">Submit</button>
													<button type="reset" class="btn btn-default">Cancel</button>
												</div>
											</div>
										</div>
									</form>


								<?php } else { ?>
									<form method="post"action="<?php echo base_url()?>Admin/updatereceptionist" id="form_sample_1" class="form-horizontal">
										<div class="form-body">

										<input type="hidden" name="receptionist_id_pk" value="<?php echo $receptionist_data['receptionist_id_pk'];?>">

											<div class="form-group row">
												<label class="control-label col-md-3">Receptionist Name
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="receptionist_name" 
														placeholder="enter  name"
													class="form-control input-height" value="<?php echo $receptionist_data['receptionist_name'];?>"/>
												</div>
											</div>
											
											
											
											<div class="form-group row">
												<label class="control-label col-md-3">Email_address
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="email_id" data-required="1"
													placeholder="enter email address"
													class="form-control input-height" value="<?php echo $receptionist_data['email_id'];?>"/>
												</div>
											</div>
											
											
											
												<div class="form-group row">
												<label class="control-label col-md-3">Mobile No.
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input name="mobile_no" type="text" placeholder="mobile no"
														class="form-control input-height" value="<?php echo $receptionist_data['mobile_no'];?>"/> </div>
											</div>
											
										</div>
										<div class="form-actions">
											<div class="row">
												<div class="offset-md-3 col-md-9">
													<button type="submit" class="btn btn-info m-r-20">update</button>
													<button type="Cancel" class="btn btn-default">Cancel</button>
												</div>
											</div>
										</div>
									</form>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		








<?php include 'includes/footer.php';?>