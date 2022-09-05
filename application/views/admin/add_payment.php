<?php include 'includes/header.php' ?>

<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title"><?php echo (isset($payment_data))?"Update " : "Add " ;?> Payment</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                        href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Doctors</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active"><?php echo (isset($payment_data))?"Update " : "Add " ;?>Payment</li>
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
                                    <?php if(!isset($payment_data)) { ?>
                                    <form method="post" action="<?php echo base_url();?>Admin/insertpayment" id="form_sample_1"  class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">
                                            
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Payment Method
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="payment_type" required>
                                                        <option value="">Select...</option>
                                                        <option value="Cash">Cash</option>
                                                        <option value="Card">Card</option>
                                                        <option value="UPI">UPI</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Bill_no
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="bill_id_fk" data-required="1" required
                                                        placeholder="bill no"
                                                        class="form-control input-height" />
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
                                   <form method="post" action="<?php echo base_url();?>Admin/updatepayment" id="form_sample_1"  class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">

                                            <input type="hidden" name="payment_id_pk" value="<?php echo $payment_data['payment_id_pk'] ;?>">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Payment Method
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="payment_type">s
                                                        
                                                        <option value="cash" <?php if($payment_data['payment_type'] == "cash"){echo "selected";}?>>Cash</option>

                                                        <option value="Card" <?php if($payment_data['payment_type']=="Card"){echo "selected";}?>>Card</option>

                                                        <option value="UPI" <?php if($payment_data['payment_type'] == "UPI"){echo "selected";}?>>UPI</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">bill no
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="bill_no_fk" data-required="1" required
                                                        placeholder="bill no" value="<?php echo $payment_data['bill_id_fk'];?>"
                                                        class="form-control input-height" />
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

<?php include 'includes/footer.php' ?>