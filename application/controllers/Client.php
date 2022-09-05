<?php

class Client extends CI_Controller
{
	 public function index()
	 {
      $data['toptreatment_data']=$this->treatment_model->treatmenttoplist();
      $data['topdoctor_data']=$this->doctors_model->topdoctorlist();
      $data['treatment_data']=$this->treatment_model->treatmentlist();
      $data['user_data']=$this->user_model->userlist();
      
		  $this->load->view('client/index',$data);
	 }
  
    public function insertappointment()
    {
        $data['patient_name']= $this->input->post('patient_name') . "(". $this->input->post('case_id') .")";
        
        $data['ap_type']=$this->input->post('ap_type');
        $data['treatment_id_fk']=$this->input->post('treatment_name');
        $data['email']=$this->input->post('email');        
        $data['age']=$this->input->post('age');
        $data['date']=$this->input->post('date');        
        $data['mobile_no']=$this->input->post('mobile_no');
        $data['reason']=$this->input->post('reason');

        
        $this->appointment_model->insertappointment($data);
        
        redirect('client/index');
    }

      //login
    public function login()
	  {
	 	   $this->load->view('client/login');
	  }
    
    

  //profile
    public function patientprofile()
    {
          $data['treatment_data']=$this->treatment_model->treatmentlist();
          $this->load->view('client/patientprofile');
    }
  public function edituserprofile()
  {
      // $data['patient_data']=$this->patient_model->patientdata($id);
      $this->load->view('client/edituserprofile');
  }
  public function updatepatientprofile()
  {
    $data['patient_id_pk']=$this->input->post('patient_id_pk');
    $data['patient_name']=$this->input->post('patient_name');    
    $data['gender']=$this->input->post('gender');
    $data['age']=$this->input->post('age');
    $data['mobile_no']=$this->input->post('mobile_no');
    $data['email_id']=$this->input->post('email_id');
    $data['address']=$this->input->post('address');
    
    if($_FILES["picture"]["name"]!=null)
    {
      $data['picture']=$this->pictureupload();
    }
    $this->patient_model->updatepatient($data);
    // print_r($data);
    redirect('Client/patientprofile');
  }
      public function pictureupload()
      {
        $type=explode('.',$_FILES["picture"]["name"]);
        $type=strtolower($type[count($type)-1]);
        $url="admin_content/uploads/".$data['patient_name'].rand(1,999).'.'.$type;
        if(in_array($type,array("jpeg","jpg","png","gif")))
        {
          if(is_uploaded_file($_FILES["picture"]["tmp_name"]))
          {
            if(move_uploaded_file($_FILES["picture"]["tmp_name"],$url))
            {
              return $url;
            }
          }
        }
        else
        {
          echo "file not supported";
        } 
      }


  //View appoitment
  public function appoitmentdetail()
  {
      // $data['treatment_data']=$this->treatment_model->treatmentlist();
      // $data['doctor_data']=$this->doctors_model->doctorlist();
         $data['appointment_data']=$this->appointmentbook_model->bookappointmentlist();
      // $data['doctor_data']=$this->doctors_model->doctorlist(); 
      // $data['treatment_data']=$this->treatment_model->treatmentlist();
      $this->load->view('client/show_appoitmentdetail');
  }
  //bill details
  public function billdetail()
  {
      $this->load->view('client/show_billdetails');

  }
  
  
  //user
  public function user_auth()
  {
    $user_name=$this->input->post('user_name');
    $user_password=$this->input->post('user_password');

    $res=$this->user_model->user_auth($user_name,$user_password);

    if($res != null)
    {
    	
        $_SESSION['user_name']=$res['user_name'];    
        $_SESSION['user_password']=$res['user_password'];  
        $_SESSION['user_type']=$res['user_type'];
        $_SESSION['user_id']=$res['user_id_fk'];

        if($res['user_type'] == 'patient')
        {
          redirect('Client/index');

        }
        else
        {
          redirect('Admin/index');
        }    
    }
    else
    {
        $data['invalid']="invalid username and password";
        $this->load->view('client/login',$data);

    }

  }
  //logout
    public function logout()
    {
      unset($_SESSION['user_name']);
      unset($_SESSION['user_password']);
      unset($_SESSION['user_type']);
      unset($_SESSION['user_id']);

      redirect('Client/index');
    }
    
     //user
	     public function adduser()
	     {
	       	$this->load->view('client/login');
	     }
	    public function insertuser()
      {
      		$data['user_type']=$this->input->post('user_type');
      		$data['user_name']=$this->input->post('user_name');
      		$data['user_password']=$this->input->post('user_password');
      		
      		$this->user_model->insertuser($data);
      		redirect('Admin/index');
      }
    
    //services
      public function service()
      {
        $data['treatment_data']=$this->treatment_model->treatmentlist();
        $data['treatment_data']=$this->treatment_model->treatmentlist();
        $this->load->view('client/services',$data);
      }
      //doctors
      public function doctors()
      {
        $data['treatment_data']=$this->treatment_model->treatmentlist();
        $data['doctor_data']=$this->doctors_model->doctorlist();
        $this->load->view('client/doctors',$data);
      }

      //aboutus
      public function aboutus()
      {
        $data['treatment_data']=$this->treatment_model->treatmentlist();
          $this->load->view('client/aboutus');
      }    

    //contactus
     public function contactus()
     {
         $this->load->view('client/contact');
     }
      public function insertcontactus()
      {
        $data['name']=$this->input->post('name');     
        $data['email']=$this->input->post('email');
        $data['subject']=$this->input->post('subject');
        $data['message']=$this->input->post('message');
    
        $this->contactus_model->insertcontactus($data);
        redirect('Client/index');
      }
      public function showcontactus()
      {
        $data['contactus_data']=$this->contactus_model->contactuslist();
        $this->load->view('client/show_contactus',$data);
      }
 
    public function deletecontactus($id)
    {
      $this->contactus_model->deletecontactus($id);
      redirect('Client/showcontactus');
    }

    //forget password
    public function forgetpassword()
    {
      // echo "hello";
       $this->load->view('client/forgotpassword');
    }
    public function forgetpass()
    {
      $this->load->view('client/forgetpass');
    }
  public function checkemail()
  {
    $user_name=$this->input->post('user_name');
    $res=$this->user_model->user_pass($user_name);

    if($res != null)
    {
       $_SESSION['user_name']=$res['user_name']; 
       $_SESSION['user_type']=$res['user_type'];
       $_SESSION['user_id']=$res['user_id_fk'];
       redirect('Client/forgetpass');
    }
    else
    {
        $data['invalid']="invalid email address";
        $this->load->view('client/forgotpassword',$data);
    }
  }
  public function updatepassword()
  {
      $user_password=$this->input->post('user_password');
      $user_cpass=$this->input->post('user_cpass'); 

        if($user_password!=$user_cpass)
        {
            $data['invalid']="password doesn't match";
            $this->load->view('client/forgetpass',$data);
        }
        else
        {
          $data['user_id_pk']=$this->input->post('user_id_pk');
          $data['user_password']=$this->input->post('user_password');    
        
          $this->user_model->updatedpass($data);
          print_r($data);
          redirect('Client/login');

        }
  }
    //change pass
    public function changepass()
    {
        $this->load->view('client/changepass');
    }
    public function updatepass()
    {
        $pass=$this->input->post('user_cpassword');
        $cpass=$this->input->post('user_password');

        if($pass!=$cpass)
        {
            $data['invalid']="password doesn't match";
            $this->load->view('client/changepass',$data);
        }
        else
        {
          $data['user_id_fk']=$this->input->post('user_id_fk');
          $data['user_password']=$this->input->post('user_password');
      
          $this->user_model->updateduser($data);
          redirect('Client/patientprofile');
        }
        
    }
}
?>