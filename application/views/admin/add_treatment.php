<?php include 'includes/header.php' ;?>


<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title"><?php echo (isset($treatment_data))?"Update " : "Add " ;?> treatment</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                        href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Doctors</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active"><?php echo (isset($treatment_data))?"Update " : "Add " ;?> Treatment</li>
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
                                    <?php if(!isset($treatment_data)) { ?>
                                    <form method="post" action="<?php echo base_url();?>Admin/inserttreatment" id="form_sample_1"  class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">
                                           <div class="form-group row">
                                                <label class="control-label col-md-3">Treatment name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="treatment_name" required>
                                                        <option value="" default>select</option>
                                                        <option value="Fillings">Fillings</option>
                                                        <option value="scaling and root planning">scaling and root planning</option>
                                                        <option value="Dental Bridges">Dental Bridges</option>
                                                        <option value="Dental and Implants">Dental and Implants</option>
                                                        <option value="Crowns and Caps">Crowns and Caps</option>
                                                        <option value="Root Canals">Root Canals</option>
                                                        <option value="Teeth Whitening">Teeth Whitening</option>
                                                        <option value="Dental Sealants">Dental Sealants</option>
                                                        <option value="Extraction">Extraction</option>
                                                        <option value="Impression">Impression</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Doctor
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="doctor_name" required>

                                                        <option  selected="" value="">select</option>

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
                                                <label class="control-label col-md-3">treatment_charges
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="treatment_charges" data-required="1" required
                                                        placeholder="treatment_charges"
                                                        class="form-control input-height" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="description" placeholder="description" required
                                                        class="form-control-textarea" rows="5">
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Picture
                                                </label>
                                                <div class="compose-editor">
                                                    <input type="file" class="default" name="treatment_pic" required>
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
                                    <form method="post" action="<?php echo base_url();?>Admin/updatetreatment" id="form_sample_1"  class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">
                                           <div class="form-group row">
                                            <input type="hidden" name="treatment_id_pk" value="<?php echo $treatment_data['treatment_id_pk'];?>">

                                                <label class="control-label col-md-3">Treatment name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="treatment_name" required >
                                                        
                                                        <option value="Fillings" <?php if($treatment_data['treatment_name'] == "Fillings"){echo "selected";}?>>Fillings</option>
                                                        
                                                        <option value="scaling and root planning" <?php if($treatment_data['treatment_name'] == "scaling and root planning"){echo "selected";}?>>scaling and root planning</option>
                                                        
                                                        <option value="Dental Bridges" <?php if($treatment_data['treatment_name'] == "Dental Bridges"){echo "selected";}?>>Dental Bridges</option>

                                                        <option value="Dental Implants" <?php if($treatment_data['treatment_name'] == "Dental and Implants"){echo "selected";}?> >Dental and Implants</option>

                                                        <option value="Crowns and Caps" <?php if($treatment_data['treatment_name'] == "Crowns and Caps"){echo "selected";}?>>Crowns and Caps</option>

                                                        <option value="Root Canals" <?php if($treatment_data['treatment_name'] == "Root Canals"){echo "selected";}?>>Root Canals</option>

                                                        <option value="Teeth Whitening" <?php if($treatment_data['treatment_name'] == "Teeth Whitening"){echo "selected";}?>>Teeth Whitening</option>
                                                        
                                                        <option value="Dental Sealants" <?php if($treatment_data['treatment_name'] == "Dental Sealantsc"){echo "selected";}?>>Dental Sealants</option>
                                                        <option value="Extraction" <?php if($treatment_data['treatment_name'] == "Extraction"){echo "selected";}?>>Extraction</option>
                                                        <option value="Impression" <?php if($treatment_data['treatment_name'] == "Impression"){echo "selected";}?>>Impression</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Doctor
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="doctor_name" required>

                                                        <option  selected="" disable="" default>select</option>

                                                        <?php foreach($doctor_data as $doctor)
                                                         {
                                                            ?>
                                                            <option value="<?php echo $doctor['doctor_id_pk'];?>"
                                                                <?php if($treatment_data['doctor_id_fk']==$doctor['doctor_id_pk']) echo 'selected';?>>
                                                                
                                                                <?php echo $doctor['doctor_name'];?>
                                                            </option>
                                                            
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">treatment_charges
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="treatment_charges" data-required="1" required value="<?php echo $treatment_data['treatment_charges'];?>" 
                                                        placeholder="treatment_charges" 
                                                        class="form-control input-height" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="description" placeholder="description" required
                                                        class="form-control-textarea" rows="5">
                                                        <?php echo $treatment_data['description'];?>
                                                        
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Upload Picture
                                                </label>
                                                <div class="compose-editor">
                                                    <input type="file" class="default" name="treatment_pic"><img src="<?php echo base_url().$treatment_data['treatment_pic'];?>" height="100" width="100">
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