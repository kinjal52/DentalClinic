<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $config = array(
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'kinjalpatel.kp39@gmail.com',
      'smtp_pass' => 'kinjal_1147',
      'mailtype'  => 'html',
      'charset'   => 'utf-8'
        );
      $this->email->initialize($config);
      $this->email->set_mailtype("html");
      $this->email->set_newline("\r\n");

    }
	 public function index()
	 {
    // $bill= $this->bill_model->billlist();
    // print_r($bill);die;
      $data['doctor_data']=$this->doctors_model->doctorlist();
      if(isset($_SESSION['user_id']) && ($_SESSION['user_type']))
      {
        $this->load->view('admin/index');  
      }
      else
      {
        redirect('Admin/login');
      }
    }
	

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

        redirect('Admin/index');    
    }
    else
    {
        $data['invalid']="invalid username and password";
        $this->load->view('admin/login',$data);

    }

  }
  //login
    public function login()
    {
       $this->load->view('admin/login');
    }
  //logout
  public function logout()
    {
      unset($_SESSION['user_name']);
      unset($_SESSION['user_password']);
      unset($_SESSION['user_type']);
      unset($_SESSION['user_id']);

      redirect('Admin/index');
    }
    //doctor profile
    public function doctorprofile()
    {
      $this->load->view('admin/doctorprofile');
    }
  //book_appoitnment
      public function addbookappointment()
      {  
        $data['doctor_data']=$this->doctors_model->doctorlist();
        $data['treatment_data']=$this->treatment_model->treatmentlist();
        $data['appointment_data']=$this->appointment_model->appointmentlist();
        $this->load->view('admin/add_bookappointment',$data);
      }

      public function insertbookappointment($id)
      {        
        $appointment_data = $this->appointment_model->appointmentdata($id);
        
        $patient_name=explode('(',rtrim($this->input->post('patient_name'), ')'));
        if(count($patient_name) == 2)
        {
          $case_id=$patient_name[1];
        }
        
        $data1['patient_name']=$patient_name[0];
        $data1['email_id']=$this->input->post('email');
        $data1['age']=$this->input->post('age');
        $data1['mobile_no']=$this->input->post('mobile_no');
        $data1['case_id'] = "CASE-".rand(1,999);
        $patient_data = $this->patient_model->patient_check($data1);

        if($patient_data != null){
          $data['patient_id_fk'] = $patient_data['patient_id_pk'];
        }else{
          $data['patient_id_fk'] = $this->patient_model->insertpatient($data1);
          
          $da['user_id_fk'] = $data['patient_id_fk'];
          $da['user_name'] = $data1['email_id'];
          $da['user_password'] = $data1['mobile_no'];
          $da['user_type'] = 'patient';

          $this->user_model->insertuser($da);
        }

        $data['treatment_id_fk']=$appointment_data['treatment_id_fk'];
        $data['doctor_id_fk']=$this->input->post('doctor_name');
        $data['date']=$appointment_data['date'];
        $data['time']=$this->input->post('time');
        $data['reason']=$appointment_data['reason'];
        $bid=$this->appointmentbook_model->insertbookappointment($data);

        $data2['ap_id_pk'] = $id;
        $data2['is_read'] = 0 ;
        $this->appointment_model->updateappointment($data2);
        $bookappointment_data = $this->appointmentbook_model->bookappointmentdata($bid);
        // print_r($bookappointment_data);
        // print_r($bookappointment_data);
        // print($bookappointment_data['doctor_name']);
        // print($bookappointment_data['time']);

        $msg = '<h1>Your Appoitment is confirm.</h1>';
        $msg .= '<b>Date : </b>'.$bookappointment_data['date'].'<br>';
        $msg .= '<b>Time : </b>'.$bookappointment_data['time'].'<br>';
        $msg .= '<b>Assign doctor : </b>'.$bookappointment_data['doctor_name'];

        $this->email->to($appointment_data['email']);
        $this->email->from('kinjalpatel.kp39@gmail.com','Dentshine');
        $this->email->subject('for Confirm Appoitment');
        $this->email->message($msg);
        $this->email->send();
        redirect('Admin/showbookappointment');  

      }
      public function showbookappointment()
      {   
       
          $data['bappointment_data']=$this->appointmentbook_model->bookappointmentlist();
          $this->load->view('admin/show_bookappointment',$data);

      }
       public function editbookappointment($id)
        {    
            $data['doctor_data']=$this->doctors_model->doctorlist(); 
            $data['treatment_data']=$this->treatment_model->treatmentlist();
            $data['appointment_data']=$this->appointment_model->appointmentlist();

            $data['bookappointment_data']=$this->appointmentbook_model->bookappointmentdata($id);
            $this->load->view('admin/add_bookappointment',$data);
      }
      public function updatebookappointment()
      {  
        $data['ap_book_id_pk']=$this->input->post('ap_book_id_pk');  
        $data['patient_id_fk']=$this->input->post('patient_name');
        $data['treatment_id_fk']=$this->input->post('treatment_name');
        $data['doctor_id_fk']=$this->input->post('doctor_name');
        $data['date']=$this->input->post('date');
        $data['time']=$this->input->post('time');
        $data['reason']=$this->input->post('reason');

          $this->appointmentbook_model->updatebookappointment($data);
             
          redirect('Admin/showbookappointment');
      }
      public function deletebookappointment($id)
      { 
          $this->appointmentbook_model->deletebookappointment($id);
          redirect('Admin/showbookappointment');
      }
  
	//doctor
	public function adddoctor()
      {

      	$this->load->view('admin/add_doctor');
      }
      public function insertdoctor()
      {

      	$data['doctor_name']=$this->input->post('doctor_name');
      	$data['gender']=$this->input->post('gender');
      	$data['age']=$this->input->post('age');
      	$data['degree']=$this->input->post('degree');
        $data['experience']=$this->input->post('experience');
      	$data['mobile_no']=$this->input->post('mobile_no');
      	$data['email_id']=$this->input->post('email_id');
        $data['consolation_charges']=$this->input->post('consolation_charges');
        $data['doctor_image']=$this->picupload();

      	$result = $this->doctors_model->insertdoctor($data);

        $da['user_id_fk'] = $result;
        $da['user_name'] = $data['email_id'];
        $da['user_password'] = $data['mobile_no'];
        $da['user_type'] = 'doctor';

        $this->user_model->insertUser($da);

      	redirect('Admin/showdoctor');

      }
      public function showdoctor()
      {
            $data['doctor_data']=$this->doctors_model->doctorlist();
            $this->load->view('admin/show_doctor',$data);

      }
      public function editdoctor($id)
      {
             $data['doctor_data']=$this->doctors_model->doctordata($id);
            $this->load->view('admin/add_doctor',$data);
      }
      public function updatedoctor()
      {
        $data['doctor_id_pk']=$this->input->post('doctor_id_pk');  
       	$data['doctor_name']=$this->input->post('doctor_name');
        $data['gender']=$this->input->post('gender');
        $data['age']=$this->input->post('age');
        $data['degree']=$this->input->post('degree');
        $data['experience']=$this->input->post('experience');
        $data['mobile_no']=$this->input->post('mobile_no');
        $data['email_id']=$this->input->post('email_id');
        $data['consolation_charges']=$this->input->post('consolation_charges');
            
        if($_FILES["doctor_image"]["name"]!=null)
        {
          	$data['doctor_image']=$this->picupload();
        }

        $this->doctors_model->updatedoctor($data);
        redirect('Admin/showdoctor');
      }
      public function deletedoctor($id)
      {
             $this->doctors_model->deletedoctor($id);
             redirect('Admin/showdoctor');
      }

      public function picupload()
      {
        $type = explode('.', $_FILES["doctor_image"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "admin_content/uploads/" . 'IMG_DOCTOR' . rand(1,999) . '.' . $type;
        if (in_array($type, array("jpeg", "jpg", "png", "gif")))
         {
            if (is_uploaded_file($_FILES["doctor_image"]["tmp_name"]))
             {
                if (move_uploaded_file($_FILES["doctor_image"]["tmp_name"], $url)) 
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
     //receptionist
     public function addreceptionist()
      {
        
        $this->load->view('admin/add_receptionist');
      }
      public function insertreceptionist()
      {
        $data['receptionist_name']=$this->input->post('receptionist_name');
        //$data['doctor_id_fk']=$this->input->post('doctor_name');
        $data['email_id']=$this->input->post('email_id');
        $data['mobile_no']=$this->input->post('mobile_no');
        
        $result=$this->receptionist_model->insertreceptionist($data);

        $da['user_id_fk'] = $result;
        $da['user_name'] = $data['email_id'];
        $da['user_password'] = $data['mobile_no'];
        $da['user_type'] = 'receptionist';

        $this->user_model->insertuser($da);

        redirect('Admin/showreceptionist');
      }
      public function showreceptionist()
      {
            $data['receptionist_data']=$this->receptionist_model->receptionistlist();
            $this->load->view('admin/show_receptionist',$data);

      }
       public function editreceptionist($id)
      {
         $data['doctor_data']=$this->doctors_model->doctorlist();
          $data['receptionist_data']=$this->receptionist_model->receptionistdata($id);
          $this->load->view('admin/add_receptionist',$data);
      }
      public function updatereceptionist()
      {
        $data['receptionist_id_pk']=$this->input->post('receptionist_id_pk');
        $data['receptionist_name']=$this->input->post('receptionist_name');
       // $data['doctor_id_fk']=$this->input->post('doctor_name');
        $data['email_id']=$this->input->post('email_id');
        $data['mobile_no']=$this->input->post('mobile_no');
      
            $this->receptionist_model->updatedreceptionist($data);
             
            redirect('Admin/showreceptionist');
      }
      public function deletereceptionist($id)
      {
             $this->receptionist_model->deletereceptionist($id);
             redirect('Admin/showreceptionist');
      }

	//patient
	public function addpatient()
	{
		$this->load->view('admin/add_patient');
	}
	public function insertpatient()
	{
		//$data['patient_id_pk']=$this->input->post('patient_id_pk');
		$data['patient_name']=$this->input->post('patient_name');		
		$data['gender']=$this->input->post('gender');
    $data['case_id'] = "CASE-".rand(1,999);
		$data['age']=$this->input->post('age');
		$data['mobile_no']=$this->input->post('mobile_no');
		$data['email_id']=$this->input->post('email_id');
		$data['address']=$this->input->post('address');
		$data['picture']=$this->pictureupload();

		$result=$this->patient_model->insertpatient($data);

    $da['user_id_fk'] = $result;
    $da['user_name'] = $data['email_id'];
    $da['user_password'] = $data['mobile_no'];
    $da['user_type'] = 'patient';

    $this->user_model->insertUser($da);
		redirect('Admin/showpatient');
	}
	public function showpatient()
	{
		$data['patient_data']=$this->patient_model->patientlist();
		$this->load->view('admin/show_patient',$data);
	}
	public function editpatient($id)
	{
		
		$data['patient_data']=$this->patient_model->patientdata($id);
		$this->load->view('admin/add_patient',$data);
	}
	public function updatepatient()
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


    
		redirect('Admin/showpatient');
	}
	public function deletepatient($id)
	{
		$this->patient_model->deletepatient($id);
		redirect('Admin/showpatient');

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
  //patient history
  public function addhistory()
      {
        $data['patient_data']=$this->patient_model->patientlist();
        $data['doctor_data']=$this->doctors_model->doctorlist();
        $data['treatment_data']=$this->treatment_model->treatmentlist();
        $this->load->view('admin/add_history',$data);
      }
      public function inserthistory()
      {
        $data['patient_id_fk']=$this->input->post('patient_name');
        $data['treatment_id_fk']=$this->input->post('treatment_name');
        $data['doctor_id_fk']=$this->input->post('doctor_name');
        $data['time']=$this->input->post('time');
        $data['date']=$this->input->post('date');
        $data['amount']=$this->input->post('amount');
        $data['return_date']=$this->input->post('return_date');
        
        $this->history_model->inserthistory($data);

        redirect('Admin/showhistory');
      }
      public function showhistory()
      {
            $data['history_data']=$this->history_model->historylist();
            $this->load->view('admin/show_history',$data);

      }
       public function edithistory($id)
      {
          $data['patient_data']=$this->patient_model->patientlist();
          $data['treatment_data']=$this->treatment_model->treatmentlist();
          $data['history_data']=$this->history_model->historydata($id);
          $this->load->view('admin/add_history',$data);
      }
      public function updatehistory()
      {
        $data['history_id_pk']=$this->input->post('history_id_pk');
        $data['patient_id_fk']=$this->input->post('patient_name');
        $data['treatment_id_fk']=$this->input->post('treatment_name');
        $data['time']=$this->input->post('time');
        $data['date']=$this->input->post('date');
        $data['return_date']=$this->input->post('return_date');

      
            $this->history_model->updatehistory($data);
             
            redirect('Admin/showhistory');
      }
      public function deletehistory($id)
      {
             $this->history_model->deletehistory($id);
             redirect('Admin/showhistory');
      }


	
	
	//treatment
	public function addtreatment()
	{
		$data['doctor_data']=$this->doctors_model->doctorlist();
		$this->load->view('admin/add_treatment',$data);
	}
	public function inserttreatment()
	{
		$data['treatment_name']=$this->input->post('treatment_name');
		$data['doctor_id_fk']=$this->input->post('doctor_name');
    $data['treatment_charges']=$this->input->post('treatment_charges');
		$data['description']=$this->input->post('description');
    $data['treatment_pic']=$this->tpictupload();
		
		$this->treatment_model->inserttreatment($data);
		redirect('Admin/showtreatment');
	}
	public function showtreatment()
	{
		$data['treatment_data']=$this->treatment_model->treatmentlist();
		$this->load->view('admin/show_treatment',$data);
	}
	public function edittreatment($id)
	{
		// $data['operation'] = "update";
		$data['doctor_data']=$this->doctors_model->doctorlist();
		$data['treatment_data']=$this->treatment_model->treatmentdata($id);
		$this->load->view('admin/add_treatment',$data);
	}
	public function updatetreatment()
	{
		$data['treatment_id_pk']=$this->input->post('treatment_id_pk');
		$data['treatment_name']=$this->input->post('treatment_name');
		$data['doctor_id_fk']=$this->input->post('doctor_name');
    $data['treatment_charges']=$this->input->post('treatment_charges');
		$data['description']=$this->input->post('description');
    if($_FILES["treatment_pic"]["name"]!=null)
    {
      $data['treatment_pic']=$this->tpictupload();
    }
		
		$this->treatment_model->updatetreatment($data);
		redirect('Admin/showtreatment');

	}
	public function deletetreatment($id)
	{
		$this->treatment_model->deletetreatment($id);
		redirect('Admin/showtreatment');

	}
  public function tpictupload()
  {
    $type=explode('.',$_FILES["treatment_pic"]["name"]);
    $type=strtolower($type[count($type)-1]);
    $url="uploads/". 'treatment_name'.rand(1,999).'.'.$type;
    if(in_array($type,array("jpeg","jpg","png","gif")))
    {
      if(is_uploaded_file($_FILES["treatment_pic"]["tmp_name"]))
      {
        if(move_uploaded_file($_FILES["treatment_pic"]["tmp_name"],$url))
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

	//medicine
	public function addmedicine()
      {
        $this->load->view('admin/add_medicine');
      }
      public function insertmedicine()
      {
        $data['medicine_name']=$this->input->post('medicine_name');
        $data['quantity']=$this->input->post('quantity');
        $data['description']=$this->input->post('description');
        $data['price']=$this->input->post('price');

      	$this->medicine_model->insertmedicine($data);
	 	redirect('Admin/showmedicine');
      }
      public function showmedicine()
      {
        $data['medicine_data']=$this->medicine_model->medicinelist();
        $this->load->view('admin/show_medicine',$data);

      }
      public function editmedicine($id)
      {
             $data['medicine_data']=$this->medicine_model->medicinedata($id);
            $this->load->view('admin/add_medicine',$data);
      }
      public function updatemedicine()
      {
        $data['medicine_id_pk']=$this->input->post('medicine_id_pk');  
        $data['medicine_name']=$this->input->post('medicine_name');
        $data['quantity']=$this->input->post('quantity');
        $data['description']=$this->input->post('description');
        $data['price']=$this->input->post('price');
            
        $this->medicine_model->updatemedicine($data);
		redirect('Admin/showmedicine');
      }
      public function deletemedicine($id)
      {
        $this->medicine_model->deletemedicine($id);
        redirect('Admin/showmedicine');
      }

	//prescription
	public function addprescription()
	{
		$data['patient_data']=$this->patient_model->patientlist();
		$data['treatment_data']=$this->treatment_model->treatmentlist();
		$data['medicine_data']=$this->medicine_model->medicinelist();
		$this->load->view('admin/add_prescription',$data);
	}
	public function insertprescription()
	{
		$data['patient_id_fk']=$this->input->post('patient_name');
		$data['treatment_id_fk']=$this->input->post('treatment_name');
		$data['medicine_id_fk']=$this->input->post('medicine_name');
		$data['date']=$this->input->post('date');
		$data['description']=$this->input->post('description');
		
		$this->prescription_model->insertprescription($data);
		redirect('Admin/showprescription');
	}
	public function showprescription()
	{
		$data['prescription_data']=$this->prescription_model->prescriptionlist();
		$this->load->view('admin/show_prescription',$data);
	}
	public function editprescription($id)
	{
		$data['treatment_data']=$this->treatment_model->treatmentlist();
		$data['medicine_data']=$this->medicine_model->medicinelist();
		$data['patient_data']=$this->patient_model->patientlist();
		$data['prescription_data']=$this->prescription_model->prescriptiondata($id);
		$this->load->view('admin/add_prescription',$data);
	}
	public function updateprescription()
	{
		$data['prescription_id_pk']=$this->input->post('prescription_id_pk');
		$data['patient_id_fk']=$this->input->post('patient_name');
		$data['treatment_id_fk']=$this->input->post('treatment_name');
		$data['medicine_id_fk']=$this->input->post('medicine_name');
		$data['date']=$this->input->post('date');
		$data['description']=$this->input->post('description');
		
		$this->prescription_model->updateprescription($data);
		redirect('Admin/showprescription');

	}
	public function deleteprescription($id)
	{
		$this->prescription_model->deleteprescription($id);
		redirect('Admin/showprescription');
	}

	//appointment
	public function addappointment()
    {
        $data['doctor_data']=$this->doctors_model->doctorlist();
        $this->load->view('admin/add_appointment',$data);
    }

    public function showappointment()
    {
        $data['doctor_data']=$this->doctors_model->doctorlist();
        $data['appointment_data']=$this->appointment_model->appointmentlist();
        $this->load->view('admin/show_appointment',$data);

    }
    public function editappointment($id)
    {
        $data['treatment_data']=$this->treatment_model->treatmentlist();       
        $data['appointment_data']=$this->appointment_model->appointmentdata($id);

        $this->load->view('admin/add_appointment',$data);
    }
    public function updateappointment()
    {
        $data['ap_id_pk']=$this->input->post('ap_id_pk');  
        $data['patient_name']=$this->input->post('patient_name');    
        $data['ap_type']=$this->input->post('ap_type');
        $data['treatment_id_fk']=$this->input->post('treatment_name');
        $data['email']=$this->input->post('email');  
        $data['age']=$this->input->post('age');
        $data['date']=$this->input->post('date');
        $data['mobile_no']=$this->input->post('mobile_no');
        $data['reason']=$this->input->post('reason');
      
        $this->appointment_model->updateappointment($data);     
        redirect('Admin/showappointment');
    }
    public function deleteappointment($id)
    {
    	$this->appointment_model->deleteappointment($id);
        redirect('Admin/showappointment');
    }

    // contact us
       public function showcontact()
       {
          $data['contactus_data']=$this->contactus_model->contactuslistmain();
          $this->load->view('admin/show_contactus',$data);
       }
   
      public function deletecontactus($id)
      {
        $this->contactus_model->deletecontactus($id);
        redirect('Admin/showcontactus');
      }
    //bill
      public function addbill()
      { 

        $data['medicine_data']=$this->medicine_model->medicinelist(); 
        $data['doctor_data']=$this->doctors_model->doctorlist(); 
        $data['treatment_data']=$this->treatment_model->treatmentlist(); 
        $data['patient_data']=$this->patient_model->patientlist();
       
        $this->load->view('admin/add_bill',$data);
      }
      public function insertbill()
      {
        $data['patient_id_fk']=$this->input->post('patient_name');
        $data['treatment_id_fk']=$this->input->post('treatment_name');
        // $data['medicine_id_fk']=$this->input->post('medicine_name01');
        $data['doctor_id_fk']= $_SESSION['user_id'];
        $treatment_data = $this->treatment_model->treatmentdata($data['treatment_id_fk']);
        $doctor_data = $this->doctors_model->doctordata($data['doctor_id_fk']);
        $total_amount = (int)$treatment_data['treatment_charges']+(int)$doctor_data['consolation_charges'];
        $data['total_amount'] = $total_amount;
        $bill_id = $this->bill_model->insertbill($data);

        $no_of_medicine=$this->input->post('no_of_medicine');

        for($i=1;$i<=$no_of_medicine;$i++)
        {
          $data1['bill_id_fk']=$bill_id;
          $data1['medicine_id_fk']=$this->input->post('medicine_name'.'0'.$i);

          $data1['time']=$this->input->post('time'.'0'.$i);
          $data1['meal']=$this->input->post('meal'.'0'.$i);
          $data1['qty']=$this->input->post('qty'.'0'.$i);
          $medicine_data = $this->medicine_model->medicinedata($data1['medicine_id_fk']);
          $data1['price']= (int)$medicine_data['price']*(int)$data1['qty'];

          $this->bill_medicine_model->insertmedicinebill($data1);
        }
         
        redirect('Admin/showbill');
      }
      public function showbill()
      {  
        // $data['treatment_data']=$this->treatment_model->treatmentlist();              
        $data['bill_data']=$this->bill_model->billlist();
        $this->load->view('admin/show_bill',$data);      
      }
      
      public function generatebill($id)
      {
        $data['doctor_data']=$this->doctors_model->doctorlist(); 
        $data['treatment_data']=$this->treatment_model->treatmentlist(); 
        $data['patient_data']=$this->patient_model->patientlist();
        $data['bill_id_pk']=$this->input->post('bill_id_fk');
        $data['bill_data1']=$this->bill_medicine_model->medicinebilldatalist($id);
        $data['bill_data']=$this->bill_model->billgeneratelist($id);

        $bill_data=$this->bill_model->emailbillgenerate($id);
        $msg = '<h1>your bill details.</h1>';
        $msg .= '<a href = "http://192.168.29.142/dentshine/Admin/generatebill/'.$id.'">Your Bill Summary</a>';
        

        $this->email->to($bill_data['email_id']);
        $this->email->from('kinjalpatel.kp39@gmail.com','Dentshine');
        $this->email->subject('for Bill Receipt');
        $this->email->message($msg);
        $this->email->send();

        $this->load->view('admin/generatebill',$data);
      }
      public function editbill($id)
      {   
        $data['medicine_data']=$this->medicine_model->medicinelist(); 
        $data['doctor_data']=$this->doctors_model->doctorlist(); 
        $data['treatment_data']=$this->treatment_model->treatmentlist(); 
        $data['patient_data']=$this->patient_model->patientlist();
          
             $data['bill_data']=$this->bill_model->billdata($id);
            $this->load->view('admin/add_bill',$data);
      }
      public function updatebill()
      {
        $data['bill_id_pk']=$this->input->post('bill_id_pk');  
        $data['patient_id_fk']=$this->input->post('patient_name');
        
        $data['treatment_id_fk']=$this->input->post('treatment_name');
       
        $data['doctor_id_fk']=$this->input->post('charges');
        $data['total_amount']=$this->input->post('total_amount');
            
         
            $this->bill_model->updatebill($data);

            redirect('Admin/showbill');
      }
      public function deletebill($id)
      {      
             $this->bill_model->deletebill($id);
             redirect('Admin/showbill');
      }
  
      //medicine bill
      public function addmedicinebill()
      { 

        $data['medicine_data']=$this->medicine_model->medicinelist(); 
        $this->load->view('admin/add_medicinebill',$data);
      }
      public function insertmedicinebill()
      {
       
        $data['medicine_id_fk']=$this->input->post('medicine_name');
        $data['qty']=$this->input->post('qty');
        $data['price']=$this->input->post('price');
        $data['total']=$this->input->post('total');

        $this->bill_medicine_model->insertmedicinebill($data);
        redirect('Admin/showmedicinebill');
      }

      public function showmedicinebill($id)
      {    
        $data['bill_id_pk']=$this->input->post('bill_id_fk');
        $data['bill_data1']=$this->bill_medicine_model->medicinebilldatalist($id);
        $this->load->view('admin/showmedicinebill',$data);

      }
      
      public function editmedicinebill($id)
      {   
           $data['medicine_data']=$this->medicine_model->medicinebilllist(); 
            $this->load->view('admin/addmedicinebill',$data);
      }
      public function updatemedicinebill()
      {
        $data['medicine_bill_id_pk']=$this->input->post('medicine_bill_id_pk');  
        $data['medicine_id_fk']=$this->input->post('medicine_name');
        $data['qty']=$this->input->post('qty');
        $data['price']=$this->input->post('price');
            
        $this->bill_medicine_model->updatemedicinebill($data);
        redirect('Admin/showmedicinebill');
      }

      public function deletemedicinebill($id)
      {      
          $this->bill_medicine_model->deletemedicinebill($id);
          redirect('Admin/showmedicinebill');
     }

     //forget password
     public function forgetpassword()
    {
      // echo "hello";
       $this->load->view('admin/forgotpassword');
    }
    public function forgetpass()
    {
      $this->load->view('admin/forgetpass');
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
       redirect('admin/forgetpass');
    }
    else
    {
        $data['invalid']="invalid email address";
        $this->load->view('admin/forgotpassword',$data);
    }
  }
  public function updatepassword()
  {
      $user_password=$this->input->post('user_password');
      $user_cpass=$this->input->post('user_cpass'); 

        if($user_password!=$user_cpass)
        {
            $data['invalid']="password doesn't match";
            $this->load->view('admin/forgetpass',$data);
        }
        else
        {
          $data['user_id_pk']=$this->input->post('user_id_pk');
          $data['user_password']=$this->input->post('user_password');    
        
          $this->user_model->updatedpass($data);
          print_r($data);
          redirect('admin/login');

        }
  }  
} 
?>