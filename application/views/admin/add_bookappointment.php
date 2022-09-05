<?php include 'includes/header.php';?>

 	<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title"><?php echo (isset($bookappoint_data))?"Update":"Add" ;?> Appointment</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                        href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Appointment</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active"><?php echo (isset($bookappoint_data))?"Update":"Add" ;?> Appointment</li>
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
                                    <?php if(!isset($bookappointment_data)){
                                    // $data['patient_data']=$this->patient_model->patientdata($id);
                                      // if(!isset($_patient_id_fk)){ 
                                      	?> 
									<form method="post"action="<?php echo base_url()?>Admin/insertbookappointment" id="form_sample_1" class="form-horizontal">
										<div class="form-body">

											
											<div class="form-group row">
												<label class="control-label col-md-3">Patient Name
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<select class="form-control input-height" name="patient_name">
														<option selected="" disabled="" value="">select</option>

															<?php foreach($appointment_data as $appointment) { ?>
																<option value="<?php echo $appointment['ap_id_pk'];?>">
																	<?php echo $appointment['patient_name'];?>
																</option>
															<?php } ?>
													</select>
												</div>
											</div>
											
											 <div class="form-group row">
                                                <label class="control-label col-md-3">Treatment
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="treatment_name" required>

                                                        <option   disable="" value="">select</option>

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
                                                <label class="control-label col-md-3">Doctor Name
                                                    <span class="required"> * </span>
                                                </label>
                                             <div class="col-md-5">
                                                    <select class="form-control input-height" name="doctor_name" required>
                                                     
                                                        <option  selected="" disable="" value="">select</option>

                                                        <?php foreach($doctor_data as $doctor)
                                                         { ?>
                                                         <option value="<?php echo $doctor['doctor_id_pk'];?>">
                                                            <?php echo $doctor['doctor_name'];?>
                                                        </option>
                                                         <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
												<label class="control-label col-md-3">Date
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="Date" name="date" data-required="1"
														placeholder="enter date name"
														class="form-control input-height" />
												</div>
											</div>
                                            <div class="form-group row">
												<label class="control-label col-md-3">Time
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="time" name="time" data-required="1"
														placeholder=" time"
														class="form-control input-height" />
												</div>
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

								<?php  } else { ?>
									<form method="post"action="<?php echo base_url()?>Admin/updatebookappointment" id="form_sample_1" class="form-horizontal">
										<div class="form-body">

											 
											<input type="hidden" name="ap_book_id_pk" value="<?php echo $bookappointment_data['ap_book_id_pk'];?>">

										<div class="form-group row">
												<label class="control-label col-md-3">Patient Name
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
											<select class="form-control input-height" name="patient_name">

                                                <?php foreach($appointment_data as $appointment)
                                                {
                                                	?>
                                                <option value="<?php echo $appointment['ap_id_pk'];?>" <?php if($appointment['ap_id_pk']==$bookappointment_data['patient_id_fk']) echo 'selected';?>>
                                                		<?php echo $appointment['patient_name'];?>
                                                	</option>
                                                	<?php
                                                }
                                                ?>
												
												</select>
												</div>
											</div>
											
											  <div class="form-group row">
                                                <label class="control-label col-md-3">Treatment Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                 <select class="form-control input-height" name="treatment_name" required>

                                                        <option  selected="" disable="" value="">select</option>

                                                      <?php foreach($treatment_data as $treatment)
                                                {
                                                ?>
                                            <option value="<?php echo $treatment['treatment_id_pk'];?>" <?php if($treatment['treatment_id_pk']==$bookappointment_data['treatment_id_fk']) echo 'selected';?>>

                                                    <?php echo $treatment['treatment_name'];?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Doctor Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                 <select class="form-control input-height" name="doctor_name" required>

                                                        <option  selected="" disable="" value="">select</option>

                                                      <?php foreach($doctor_data as $doctor)
                                                {
                                                ?>
                                            <option value="<?php echo $doctor['doctor_id_pk'];?>" <?php if($doctor['doctor_id_pk']==$bookappointment_data['doctor_id_fk']) echo 'selected';?>>

                                                    <?php echo $doctor['doctor_name'];?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                                    </select>
                                                </div>
                                            </div>
                                             
											 <div class="form-group row">
												<label class="control-label col-md-3">Date
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="Date" name="date" data-required="1" value="<?php echo $bookappointment_data['date']?>" 
														placeholder="enter date name"
														class="form-control input-height" />
												</div>
											</div>
                                            <div class="form-group row">
												<label class="control-label col-md-3">Time
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<input type="time" name="time" data-required="1"value="<?php echo $bookappointment_data['time']?>" 
														placeholder=" time"
														class="form-control input-height" />
												</div>
											</div>
										
											<div class="form-group row">
												<label class="control-label col-md-3">Reason
													<span class="required"> * </span>
												</label>
												<div class="col-md-5">
													<textarea name="reason" placeholder="Reason"
														class="form-control-textarea" rows="5">
															<?php echo $bookappointment_data['reason'];?>
														</textarea>
														
												</div>
											</div>
											
											
										</div>
										<div class="form-actions">
											<div class="row">
												<div class="offset-md-3 col-md-9">
													<button type="submit" class="btn btn-info m-r-20">Update</button>
													<button type="Cancel" class="btn btn-default">Cancel</button>
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