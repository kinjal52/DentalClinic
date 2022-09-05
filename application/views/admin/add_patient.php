<?php include 'includes/header.php' ;?>


<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title"><?php echo (isset($patient_data))?"Update":"Add" ;?> Patient</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                        href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Doctors</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active"><?php echo (isset($patient_data))?"Update":"Add" ;?> Patient</li>
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
                                    <?php if(!isset($patient_data)) { ?>
                                    <form method="post" action="<?php echo base_url();?>Admin/insertpatient" id="form_sample_1"  class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text"  data-required="1" name="patient_name" required 
                                                        placeholder="enter full name"
                                                        class="form-control input-height" />
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
                                                <label class="control-label col-md-3">Age
                                                    <span class="required"> * </span>
                                                </label>
                                            
                                                <div class="col-md-5">
                                                    <input type="text" name="age" data-required="1" required 
                                                       placeholder="enter your age"

                                                        class="form-control input-height" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Mobile No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="number" name="mobile_no" data-required="1" required
                                                        placeholder="enter your mobile no"
                                                        class="form-control input-height" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Email
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        
                                                        <input type="text" class="form-control input-height" required
                                                            name="email_id" placeholder="Email Address">&nbsp;&nbsp;&nbsp;&nbsp;<span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span> </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="address" placeholder="address" required
                                                        class="form-control-textarea" rows="5"></textarea>
                                                </div>
                                            </div>

                                           
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Upload Picture
                                                </label>
                                                <div class="compose-editor">
                                                    <input type="file" class="default" name="picture" required>
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
                                    <form method="post" action="<?php echo base_url();?>Admin/updatepatient" id="form_sample_1"  class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group row">

                                                <input type="hidden" name="patient_id_pk" value="<?php echo $patient_data['patient_id_pk'] ;?>">

                                                <label class="control-label col-md-3">First Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text"  data-required="1" name="patient_name" value="<?php echo $patient_data['patient_name'];?>" 
                                                        placeholder="enter first name"
                                                        class="form-control input-height" />
                                                </div>
                                            </div>
                                           
                                            
                                            
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Gender
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    Male <input type="radio" name="gender" value="male" <?php if($patient_data['gender']=='male') echo "checked";?>>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    Female <input type="radio" name="gender" value="female" <?php if($patient_data['gender']=='female') echo "checked";?> >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Age
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="age" data-required="1" value="<?php echo $patient_data['age'];?>"
                                                        placeholder="enter your age"
                                                        class="form-control input-height" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Mobile No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="number" name="mobile_no" data-required="1" value="<?php echo $patient_data['mobile_no'];?>"
                                                        placeholder="enter your mobile no"
                                                        class="form-control input-height" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Email
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        
                                                        <input type="text" class="form-control input-height"
                                                            name="email_id" placeholder="Email Address" value="<?php echo $patient_data['email_id'];?>">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span> </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Address
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="address" placeholder="address" class="form-control-textarea" rows="5">
                                                    <?php echo $patient_data['address'];?>
                                                    </textarea>
                                                </div>
                                            </div>

                                        
                                           
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Upload Picture
                                                </label>
                                                <div class="compose-editor">
                                                    <input type="file" class="default" multiple name="picture"><img src="<?php echo base_url().$patient_data['picture'];?>" height="100" width="100">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="offset-md-3 col-md-9">
                                                        <button type="submit"
                                                            class="btn btn-info m-r-20">Edit</button>
                                                        <button type="Cancel" class="btn btn-default">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php  } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<?php include 'includes/footer.php' ;?>