<?php include 'includes/header.php';?>

            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title"><?php echo(isset($doctor_data))?"Update":"Add";?> Doctor</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                        href="<?php echo base_url();?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Doctors</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active"><?php echo (isset($doctor_data))?"Update":"Add";?> Doctor</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Basic Information</header>
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
                                            here
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body" id="bar-parent">
                                    <?php if(!isset($doctor_data)) { ?>
                                <form method="post" action="<?php echo base_url();?>Admin/insertdoctor" id="form_sample_1"class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="doctor_name" data-required="1"
                                                        placeholder="enter  name"
                                                        class="form-control input-height" required>
                                                </div>
                                            </div>
                                              <div class="form-group row">
                                                <label class="control-label col-md-3">Gender
                                                    <span class="required"> * </span>
                                                </label>
                                               
                                                <div class="col-md-5">
                                                    Male <input type="radio" name="gender" value="male" required >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    Female <input type="radio" name="gender" value="female"  required>
                                                </div>
                                            
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">age
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="age" data-required="1"
                                                        placeholder="enter age"
                                                        class="form-control input-height" required />
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Degree
                                                	<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="degree" class="form-control-textarea"
                                                        placeholder="degree" rows="5"required></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Experience
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="experience" data-required="1"
                                                        placeholder="enter Experience"
                                                        class="form-control input-height" required />
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Mobile No.
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="mobile_no" type="text" placeholder="mobile number"
                                                        class="form-control input-height" required/> 
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Email_id
                                                	 <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                
                                                        <span class="input-group-addon">
                                                          
                                                        </span>
                                                        <input type="text" class="form-control input-height"
                                                            name="email_id" placeholder="Email Address"required> </div>
                                                </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Charges
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input class="form-control input-height" type="text" name="consolation_charges" placeholder="enter charges">
                                                </div>
                                            </div>
                                           
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Profile Picture
                                                </label>
                                                <div class="compose-editor">
                                                    <input type="file" name="doctor_image" class="default" id="doctor_image">
                                                </div>
                                            </div>
                                           
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="offset-md-3 col-md-9">
                                                        <button type="submit"
                                                            class="btn btn-info m-r-20">Submit</button>
                                                        <button type="reset" class="btn btn-default">Cancel</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php } else { ?>
                            <form method="post" action="<?php echo base_url();?>Admin/updatedoctor" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group row">

                                        <input type="hidden" name="doctor_id_pk" value="<?php echo $doctor_data['doctor_id_pk'];?>">

                                                <label class="control-label col-md-3"> Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="doctor_name" data-required="1"
                                                        placeholder="enter  name"
                                                        class="form-control input-height" required value="<?php echo $doctor_data['doctor_name'];?>">
                                                </div>
                                            </div>
                                              <div class="form-group row">
                                                <label class="control-label col-md-3">Gender
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    Male <input type="radio" name="gender" value="male" <?php if($doctor_data['gender']=='male') echo "checked";?>>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    Female <input type="radio" name="gender" value="female" <?php if($doctor_data['gender']=='female') echo "checked";?> >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">age
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="age" data-required="1"
                                                        placeholder="enter age"
                                                        class="form-control input-height" required value="<?php echo $doctor_data['age'];?>"/>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Degree
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="degree" class="form-control-textarea"
                                                        placeholder="degree" rows="5"required ><?php echo $doctor_data['degree'];?></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Experience
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="experience" data-required="1"
                                                        placeholder="enter Experience"
                                                        class="form-control input-height" required value="<?php echo $doctor_data['experience'];?>"/>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Mobile No.
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="mobile_no" type="text" placeholder="mobile number"
                                                        class="form-control input-height" required value="<?php echo $doctor_data['mobile_no'];?>"/> 
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Email_id
                                                     <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                
                                                        <span class="input-group-addon">
                                                          
                                                        </span>
                                                        <input type="text" class="form-control input-height"
                                                            name="email_id" placeholder="Email Address"required value="<?php echo $doctor_data['email_id'];?>"> </div>
                                                </div>
                                           
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Charges
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input class="form-control input-height" type="text" name="consolation_charges"  value="<?php echo $doctor_data['consolation_charges'];?>"placeholder="enter charges">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Profile Picture
                                                </label>
                                                <div class="compose-editor">
                                                    <input type="file" class="default"  name="doctor_image"><img src="<?php echo base_url().$doctor_data['doctor_image'];?>" height="100" width="100">
                                                </div>
                                            </div>
                                           
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="offset-md-3 col-md-9">
                                                        <button type="submit"
                                                            class="btn btn-info m-r-20">Update</button>
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