<?php

class appointmentbook_model extends CI_model
{
	public function insertbookappointment($data)
	{
		$this->db->insert('appointment_booktb',$data);
		$this->db->set('is_read',1);
		return $this->db->insert_id();
	}
	
	public function updatebookappointment($data)
	{
		$this->db->where('ap_book_id_pk',$data['ap_book_id_pk']);
		return $this->db->update('appointment_booktb',$data);
	}

	public function deletebookappointment($id)
	{
		$this->db->where('ap_book_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->update('appointment_booktb');
	}
	public function bookappointmentdata($id)
	{
		$this->db->select('a.*,p.patient_name,d.doctor_name,t.treatment_name');
        $this->db->from('appointment_booktb a');
        $this->db->where(array('a.is_active'=>1,'a.ap_book_id_pk'=>$id));
        $this->db->join('patienttb p','p.patient_id_pk=a.patient_id_fk');
        $this->db->join('treatmenttb t','t.treatment_id_pk=a.treatment_id_fk');
        $this->db->join('doctortb d','d.doctor_id_pk=a.doctor_id_fk');
        $query=$this->db->get();
	    return $query->row_array();
	}
	public function bookappointmentlist()
	{
		   
           $this->db->select('a.*,p.patient_name,t.treatment_name,d.doctor_name');
           $this->db->from('appointment_booktb a');
           $this->db->where('a.is_active',1);
           $this->db->join('patienttb p','p.patient_id_pk=a.patient_id_fk');
           $this->db->join('treatmenttb t','t.treatment_id_pk=a.treatment_id_fk');
           $this->db->join('doctortb d','d.doctor_id_pk=a.doctor_id_fk');
           $query=$this->db->get();
	       return $query->result_array();
    }
    public function topbookappointmentlist()
	{
		   $this->db->limit(5);
           $this->db->select('a.*,p.patient_name,t.treatment_name,d.doctor_name');
           $this->db->from('appointment_booktb a');
           $this->db->where('a.is_active',1);
           $this->db->join('patienttb p','p.patient_id_pk=a.patient_id_fk');
           $this->db->join('treatmenttb t','t.treatment_id_pk=a.treatment_id_fk');
           $this->db->join('doctortb d','d.doctor_id_pk=a.doctor_id_fk');
           $query=$this->db->get();
	       return $query->result_array();
    }

    public function appoitmentdatalist($id)
    {
    	$this->db->select('a.*,p.patient_name,d.doctor_name,t.treatment_name');
        $this->db->from('appointment_booktb a');
        $this->db->where(array('a.is_active'=>1,'a.patient_id_fk'=>$id));
        $this->db->join('patienttb p','p.patient_id_pk=a.patient_id_fk');
        $this->db->join('treatmenttb t','t.treatment_id_pk=a.treatment_id_fk');
        $this->db->join('doctortb d','d.doctor_id_pk=a.doctor_id_fk');
        $query=$this->db->get();        
	    return $query->result_array();
    } 
    
}

?>