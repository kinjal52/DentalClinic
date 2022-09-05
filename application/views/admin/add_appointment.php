<?php include 'includes/header.php';?>

 	<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title"><?php echo (isset($appointment_data))?"Update":"Add";?> Appointment</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo base_url();?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="#">Appointment</a>&nbsp;<i
										class="fa fa-angle-right"></i>
								</li>
								<li class="active"><?php echo (isset($appointment_data))?"Update":"Add";?> Appointment</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Book Appointment</header>
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
                                    <?php if(!isset($appointment_data)) { ?>
									<form method="post"action="<?php echo base_url()?>Admin/insertappointment" id="form_sample_1" class="form-horizontal">
										<div class="form-body">
											
											<div class="form-group row">
												<label class="control-label col-md-3">Patient Name
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="patient_name" data-required="1"
														placeholder="enter full name"
														class="form-control input-height" required />
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Appointment type
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select class="form-control input-height" name="ap_type" required>
														<option value="">Select...</option>
														<option value="Routine Appointments">Routine Appointments </option>
														<option value="Minor Pain">Minor Pain</option>
														<option value="Emergency">Emergency</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
                                                <label class="control-label col-md-3">Treatment
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="treatment_name" required>

                                                        <option  selected="" disable="" value="">select</option>

                                                        <?php foreach($treatment_data as $treatment)
                                                         { ?>
                                                         <option value="<?php echo $treatment['treatment_id_pk'];?>">
                                                            <?php echo $treatment['treatment_name'];?>
                                                        </option>
                                                         <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
											

											<div class="form-group row">
												<label class="control-label col-md-3">email id
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="email" data-required="1"
														placeholder="email id"
														class="form-control input-height" required />
												</div>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3">Age
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="age" data-required="1"
														placeholder="Age"
														class="form-control input-height" required />
												</div>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3">Date
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="Date" name="date" data-required="1"
														placeholder="enter date"
														class="form-control input-height" required />
												</div>
											</div>
											<!-- <div class="form-group row">
												<label class="control-label col-md-3">F</label>
												<div class="col-md-5">
													<div class="row">
														<div class="col-md-5">
															<input class="form-control input-height" type="time"
																value="13:45:00" name="from">
														</div>
														<label class="control-label small-label col-md-2">To</label>
														<div class="col-md-5">
															<input class="form-control input-height" type="time"
																value="13:45:00" name="to">
														</div>
													</div>
												</div>
											</div>
											 -->
												<div class="form-group row">
												<label class="control-label col-md-3">Mobile No.
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input name="mobile_no" type="text" placeholder="mobile no"
														class="form-control input-height" required /> </div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Reason
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<textarea name="reason" placeholder="Reason"
														class="form-control-textarea" rows="5"></textarea>
												</div>
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
									<form method="post"action="<?php echo base_url()?>Admin/updateappointment" id="form_sample_1" class="form-horizontal">
										<div class="form-body">

											 <input type="hidden" name="ap_id_pk" value="<?php echo $appointment_data['ap_id_pk'];?>">

											<div class="form-group row">
                                                <label class="control-label col-md-3">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="patient_name" value="<?php echo $appointment_data['patient_name'];?>"data-required="1" placeholder="enter full name"
														class="form-control input-height" required />
                                                </div>
                                            </div>
											<div class="form-group row">
												<label class="control-label col-md-3">Appointment type
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select class="form-control input-height" name="ap_type">
                                                         
														<option value="Routine Appointments"<?php if($appointment_data['ap_type']=="Routine Appointment"){echo 'selected';}?>>Routine Appointments </option>
														<option value="Minor Pain"<?php if($appointment_data['ap_type']=="Minor Pain"){echo 'selected';}?>>Minor Pain</option>
														<option value="Emergency"<?php if($appointment_data['ap_type']=="Emergency"){echo 'selected';}?>>Emergency</option>
													</select>
												</div>
											</div>
											
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Treatment 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="treatment_name" required>

                                                        <option  selected="" disable="" value="">select</option>

                                                        <?php foreach($treatment_data as $treatment)
                                                         { ?>
                                                            <option value="<?php echo $treatment['medicine_id_pk'];?>"
                                                        <?php if($treatment['treatment_id_pk']==$appointment_data['treatment_id_fk']) echo 'selected';?>>
                                                                
                                                                <?php echo $treatment['treatment_name'];?>
                                                            </option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
												<label class="control-label col-md-3">email id
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="email" data-required="1"
														placeholder="email id" value="<?php echo $appointment_data['email']?>" 
														class="form-control input-height" required />
												</div>
											</div>

                                            <div class="form-group row">
												<label class="control-label col-md-3">Age
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="text" name="age" data-required="1"
														placeholder="Age" value="<?php echo $appointment_data['age'];?>"
														class="form-control input-height" required />
												</div>
											</div>

											<div class="form-group row">
												<label class="control-label col-md-3">Date
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="Date" name="date" data-required="1" value="<?php echo $appointment_data['date'];?>"
														placeholder="enter date name"
														class="form-control input-height" />
												</div>
											</div>
											
											
												<div class="form-group row">
												<label class="control-label col-md-3">Mobile No.
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input name="mobile_no" type="text" placeholder="mobile no" 
														class="form-control input-height" value="<?php echo $appointment_data['mobile_no'];?>"> </div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3">Reason
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<textarea name="reason" placeholder="Reason"
														class="form-control-textarea" rows="5"><?php echo $appointment_data['reason'];?></textarea>
												</div>
											</div>
											
										</div>
										<div class="form-actions">
											<div class="row">
												<div class="offset-md-3 col-md-9">
													<button type="submit" class="btn btn-info m-r-20">Update</button>
													<button type="reset" class="btn btn-default">Cancel</button>
												</div>
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