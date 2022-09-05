<?php include 'includes/header.php' ;?>


<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title"><?php echo (isset($prescription_data))?"Update " : "Add " ;?> prescription</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                        href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Prescription</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active"><?php echo (isset($prescription_data))?"Update " : "Add " ;?> prescription</li>
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
                                    <?php if(!isset($prescription_data)) { ?>
                                    <form method="post" action="<?php echo base_url();?>Admin/insertprescription" id="form_sample_1"  class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="patient_name" required>

                                                        <option  selected="" disable="" value="">select</option>

                                                        <?php foreach($patient_data as $patient)
                                                         { ?>
                                                         <option value="<?php echo $patient['patient_id_pk'];?>">
                                                            <?php echo $patient['patient_name'];?>
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
                                                <label class="control-label col-md-3">Medicine
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="medicine_name" multiple="multiple" required>

                                                        <option  selected="" disable="" value="">select</option>

                                                        <?php foreach($medicine_data as $medicine)
                                                         { ?>
                                                         <option value="<?php echo $medicine['medicine_id_pk'];?>">
                                                            <?php echo $medicine['medicine_name'];?>
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
                                                    <input type="Datetime-local" name="date" data-required data-val="true" class="form-control input-height" asp-for="DateTime" />
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea placeholder="description" required class="form-control-textarea" rows="5" name="description"></textarea>
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
                                    <form method="post" action="<?php echo base_url();?>Admin/updateprescription" id="form_sample_1"  class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Patient Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="patient_name" required>

                                                        <option  selected="" disable="" value="">select</option>

                                                        <?php foreach($patient_data as $patient)
                                                         { ?>
                                                            <option value="<?php echo $patient['patient_id_pk'];?>"
                                                        <?php if($patient['patient_id_pk']==$prescription_data['patient_id_fk']) echo 'selected';?>>
                                                                
                                                                <?php echo $patient['patient_name'];?>
                                                            </option>
                                                    <?php } ?>
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
                                                         { ?>
                                                <option value="<?php echo $treatment['treatment_id_pk'];?>"
                                                   <?php if($treatment['treatment_id_pk']==$prescription_data['treatment_id_fk']) echo 'selected';?>>
                                                                
                                                                <?php echo $treatment['treatment_name'];?>
                                                            </option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Medicine 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="medicine_name" required>

                                                        <option  selected="" disable="" value="">select</option>

                                                        <?php foreach($medicine_data as $medicine)
                                                         { ?>
                                                            <option value="<?php echo $medicine['medicine_id_pk'];?>"
                                                        <?php if($medicine['medicine_id_pk']==$prescription_data['medicine_id_fk']) echo 'selected';?>>
                                                                
                                                                <?php echo $medicine['medicine_name'];?>
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
                                                    <input type="Datetime-local" name="date" data-val="true"  data-required class="form-control input-height" asp-for="DateTime"  value="<?php echo $prescription_data['date'];?>"/>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="address" placeholder="description" required class="form-control-textarea" rows="5">
                                                        <?php echo $prescription_data['description'];?>
                                                        
                                                            
                                                        </textarea>
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