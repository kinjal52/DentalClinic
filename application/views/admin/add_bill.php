<?php include 'includes/header.php';?>
<
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript">


  $(document).ready(function (){
    // alert('in');
            $("#Add").on("click", function() {  
                nextElement($('#medicine'));
            });  
            var current_id =1; 
           function nextElement(element) {
            var newElement = element.clone();
            console.log(newElement);
            var id = current_id + 1;
            current_id = id;
            if (id < 10) id = "0" + id;
            newElement.attr("name", element.attr("id").split("01")[0] + id);
            var field = $(':input[type="number"]', newElement).attr("id");
            $(':input[type="number"]', newElement).attr("name", field.split("01")[0] + id);
            $(':input[type="number"]', newElement).attr("id", field.split("01")[0] + id);

            var field1 = $('select', newElement).attr("id");
            $('select', newElement).attr("name", field1.split("01")[0] + id);
            $('select', newElement).attr("id", field1.split("01")[0] + id);
            newElement.appendTo($("#medicine_list"));
            $('#no_of_medicine').val(current_id);

            var field2 = $(':input[type="radio"]', newElement).attr("id");
            $(':input[type="radio"]', newElement).attr("name", field2.split("01")[0] + id);
            $(':input[type="radio"]', newElement).attr("id", field2.split("01")[0] + id);

              var field3 = $(':input[type="text"]', newElement).attr("id");
            $(':input[type="text"]', newElement).attr("name", field3.split("01")[0] + id);
            $(':input[type="text"]', newElement).attr("id", field3.split("01")[0] + id);
        }



  });


</script>  
  
<div class="page-content-wrapper">
<div class="page-content">
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title"><?php echo(isset($bill_data))?"Update":"Add";?>Bill</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                        href="<?php echo base_url();?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="#">Bill</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active"><?php echo (isset($bill_data))?"Update":"Add";?> Bill</li>
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
                    <?php if(!isset($bill_data)) { ?>
                    <form method="post" action="<?php echo base_url();?>Admin/insertbill" id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="control-label col-md-3"> Patient Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                     <select class="form-control input-height" name="patient_name" required>

                                        <option  selected="" disable="" value="">select</option>

                                        <?php foreach($patient_data as $patient)
                                         { 
                                            ?>
                                        <option value="<?php echo $patient['patient_id_pk'];?>">
                                            <?php echo $patient['patient_name'];?>

                                        </option>
                                         <?php 
                                     } 
                                     ?>
                                    </select>
                                </div>
                            </div>
                             
                         
                             <div class="form-group row">
                                <label class="control-label col-md-3">
                                    Treatment charges
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <select class="form-control input-height" name="treatment_name" required>

                                        <option  selected="" disable="" value="">select</option>

                                        <?php foreach($treatment_data as $treatment)
                                         { 
                                            ?>
                                        <option value="<?php echo $treatment['treatment_id_pk'];?>">
                                          <?php echo $treatment['treatment_charges'];?> 
                                            <?php echo $treatment['treatment_name'];?>
                                        </option>
                                         <?php 
                                     } 
                                     ?>
                                    </select>
                                   <!--  <input type="text" name="treatment_charges" id="n1">-->
                                    </div> 
                            </div>
                           
                      
                             <div class="form-group row">

                                 <label class="control-label col-md-3">medicine Name
                                    <span class="required"> * </span>
                                </label>

                                <div id="medicine_list" class="col-md-5">
                                   <table id="medicine">
                                        <tr>
                                            <td>

                                    <select class="form-control input-height" id="medicine_name01" name="medicine_name01" required>

                                        <option  selected="" disable="" value="">select</option>

                                    <?php foreach($medicine_data as $medicine)
                                         { ?>
                                <option value="<?php echo $medicine['medicine_id_pk'];?>">
                                        <?php echo $medicine['medicine_name'];?>
                                        <?php echo $medicine['price'];?> 
                                        </option>
                                         <?php } ?>
                                    </select>
                                 </td>
                                <td>
                                    <input class="form-control input-height" type="number"
                                    id="qty01" name="qty01" value="0" placeholder="qty">
                                </td>
                            </tr>
                                <tr>
                                    <td>
                                    <input class="form-control input-height" type="text"
                                    id="time01" name="time01" placeholder="time">
                                </td>

                                <td>
                                    
                                    AM <input type="radio" name="meal01" id="meal01" value="AM" required >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    BM <input type="radio" name="meal01" id="meal01" value="BM"  required>
                                
                                </td>
                                
                                </tr>
                              
                                 </table> 
                             </div>
                             <center>
                                     <a> <i class="material-icons" id="Add">add_circle</i></a>  
                                </center>
                             </div> 
                            
                            <input type="hidden" name="no_of_medicine" value="1" id="no_of_medicine">
                                                                                                                                                    
                                    
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
            <form method="post" action="<?php echo base_url();?>Admin/updatebill" id="form_sample_1" class="form-horizontal" >
                         <div class="form-body">
                            <input type="hidden" name="bill_id_pk" value="<?php echo $bill_data['bill_id_pk'];?>">
                            <div class="form-group row">
                                <label class="control-label col-md-3"> Patient Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                     <select class="form-control input-height" name="patient_name" required>

                                        <option  selected="" disable="" value="">select</option>

                                        <?php foreach($patient_data as $patient)
                                         { 
                                            ?>
                                        <option value="<?php echo $patient['patient_id_pk'];?>" <?php if($patient['patient_id_pk']==$bill_data['patient_id_fk']) echo 'selected';?>>

                                    <?php echo $patient['patient_name'];?>
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
                            <option value="<?php echo $treatment['treatment_id_pk'];?>" <?php if($treatment['treatment_id_pk']==$bill_data['treatment_id_fk']) echo 'selected';?>>

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
                                    <select class="form-control input-height" name="charges" required>

                                        <option  selected="" value="">select</option>

                                        <?php foreach($doctor_data as $doctor)
                                         { ?>
                                      <option value="<?php echo $doctor['doctor_id_pk'];?>" <?php if($doctor['doctor_id_pk']==$bill_data['doctor_id_fk']) echo 'selected';?>>

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
                                    <input type="date" name="date" data-required="1" value="<?php echo $bill_data['date'];?>"
                                        class="form-control input-height" required />
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="control-label col-md-3">Total Amount.
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-5">
                                    <input  name="total_amount" type="text" id="total_amount" 
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
                     <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
             

<?php include 'includes/footer.php';?>