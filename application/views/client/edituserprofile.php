<?php include 'includes/header.php';?>
<?php include 'includes/main.php';?>
<h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">My Profile</h1>
</div>
</div>
</div>
</section>


<form method="post" action="<?php echo base_url();?>Client/updatepatientprofile" id="form_sample_1"  class="form-horizontal" enctype="multipart/form-data" align="center">
    <br>
	<div class="form-body" align="center">
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
            <div class="col-md-2">
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
                    
                    <input type="text" class="form-control input-height" readonly
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
            <div class="col-md-2">
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
                <div class="offset-md-2 col-md-3">
                    <button type="submit"
                        class="btn btn-info m-r-20">Edit</button>
                    <button type="Cancel" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
     <br>                               
</section>
<?php include 'includes/footer.php';?>
