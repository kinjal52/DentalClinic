<?php include 'includes/header.php';?>

            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title"><?php echo(isset($medicine_data))?"Update":"Add";?> Medicine</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                        href="<?php echo base_url();?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Medicine</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active"><?php echo (isset($medicine_data))?"Update":"Add";?> Medidcine</li>
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
                                    <?php if(!isset($medicine_data)) { ?>
                                    <form method="post" action="<?php echo base_url();?>Admin/insertmedicine" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3"> Medicine Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="medicine_name" data-required="1"
                                                        placeholder="enter medicine name"
                                                        class="form-control input-height" required>
                                                </div>
                                            </div>
                                             
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Quantity
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="quantity" data-required="1"
                                                        placeholder="enter qty"
                                                        class="form-control input-height" required />
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Description
                                                	<span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="description" class="form-control-textarea"
                                                        placeholder="description" rows="5"required></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">price.
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="price" type="text" placeholder="enter price"
                                                        class="form-control input-height" required/> 
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
                            <form method="post" action="<?php echo base_url();?>Admin/updatemedicine" id="form_sample_1" class="form-horizontal" >
                                        <div class="form-body">
                                            <div class="form-group row">

                                        <input type="hidden" name="medicine_id_pk" value="<?php echo $medicine_data['medicine_id_pk'];?>">

                                               <label class="control-label col-md-3"> Medicine Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="medicine_name" data-required="1"
                                                        placeholder="enter medicine name"
                                                        class="form-control input-height" required value="<?php echo $medicine_data['medicine_name'];?>">
                                                </div>
                                            </div>
                                             
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Quantity
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="quantity" data-required="1"
                                                        placeholder="enter qty"
                                                        class="form-control input-height" required value="<?php echo $medicine_data['quantity'];?>"/>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="description" class="form-control-textarea"
                                                        placeholder="Description" rows="5"required><?php echo $medicine_data['description'];?></textarea>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Price
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="price" type="text" placeholder="enter price"
                                                        class="form-control input-height" required value="<?php echo $medicine_data['price'];?>"/> 
                                                    </div>
                                            </div>
                                           
                                           
                                           
                                          
                                           
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="offset-md-3 col-md-9">
                                                        <button type="submit"
                                                            class="btn btn-info m-r-20">Submit</button>
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