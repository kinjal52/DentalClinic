<?php

class bill_model extends CI_model
{
	public function insertbill($data)
	{
		$this->db->insert('billtb',$data);
		return $this->db->insert_id();
	}

	public function updatebill($data)
	{
		$this->db->where('bill_id_pk',$data['bill_id_pk']);
		return $this->db->update('billtb',$data);
	}
	

	public function deletebill($id)
	{
		$this->db->where('bill_id_pk',$id);
		$this->db->set('is_active',0);
		return $this->db->update('billtb');
	}
	public function billdata($id)
	{
	 $query=$this->db->get_where('billtb',array('is_active'=>1,'bill_id_pk'=>$id));
		return $query->row_array();
	}
	public function billlist()
	{
		$this->db->select('b.*,pa.patient_name,t.treatment_name,t.treatment_charges,d.consolation_charges,d.doctor_name,pa.address,pa.email_id');
		$this->db->from('billtb b');
		$this->db->where('b.is_active',1);
		$this->db->join('patienttb pa','pa.patient_id_pk=b.patient_id_fk');
		$this->db->join('treatmenttb t','t.treatment_id_pk=b.treatment_id_fk');
		$this->db->join('doctortb d','d.doctor_id_pk=b.doctor_id_fk');
		
		$query=$this->db->get();
	  return $query->result_array();

  }
   public function billdatalist($id)
	{
		$this->db->select('b.*,pa.patient_name,t.treatment_name,t.treatment_charges,d.consolation_charges,d.doctor_name');
		$this->db->from('billtb b');
		$this->db->where(array('b.is_active'=>1,'b.doctor_id_fk'=>$id));
		$this->db->join('patienttb pa','pa.patient_id_pk=b.patient_id_fk');
		$this->db->join('treatmenttb t','t.treatment_id_pk=b.treatment_id_fk');
		$this->db->join('doctortb d','d.doctor_id_pk=b.doctor_id_fk');
		
		$query=$this->db->get();
	  return $query->result_array();

  }
	
   public function billgeneratelist($id)
	{
		$this->db->select('b.*,pa.patient_name,t.treatment_name,t.treatment_charges,d.consolation_charges,d.doctor_name,pa.address,pa.email_id');
		$this->db->from('billtb b');
		$this->db->where(array('b.is_active'=>1,'b.bill_id_pk'=>$id));
		$this->db->join('patienttb pa','pa.patient_id_pk=b.patient_id_fk');
		$this->db->join('treatmenttb t','t.treatment_id_pk=b.treatment_id_fk');
		$this->db->join('doctortb d','d.doctor_id_pk=b.doctor_id_fk');
		
		$query=$this->db->get();
	  return $query->result_array();

  	}
  	public function billgeneratedata($id)
	{
		$this->db->select('b.*,pa.patient_name,pa.email_id');
		$this->db->from('billtb b');
		$this->db->where(array('b.is_active'=>1,'b.patient_id_fk'=>$id));
		$this->db->join('patienttb pa','pa.patient_id_pk=b.patient_id_fk');		
		// $this->db->join('treatmenttb t','t.treatment_id_pk=b.treatment_id_fk');
		// $this->db->join('doctortb d','d.doctor_id_pk=b.doctor_id_fk');
		$query=$this->db->get();
	  return $query->result_array();

  	}
  	public function billdatahistory($id)
		{
		$this->db->select('b.*,pa.patient_name,t.treatment_name,t.treatment_charges,d.consolation_charges,d.doctor_name');
		$this->db->from('billtb b');
		$this->db->where(array('b.is_active'=>1,'b.patient_id_fk'=>$id));
		$this->db->join('patienttb pa','pa.patient_id_pk=b.patient_id_fk');
		$this->db->join('treatmenttb t','t.treatment_id_pk=b.treatment_id_fk');
		$this->db->join('doctortb d','d.doctor_id_pk=b.doctor_id_fk');
		
		$query=$this->db->get();
	  return $query->result_array();

  }
  public function avgbill()
	{
		$this->db->select_avg('total_amount');
		$this->db->from('billtb b');
		$this->db->where('b.is_active',1);
		$query=$this->db->get();
	 	return $query->row()->total_amount;
	}

	public function emailbillgenerate($id)
	{
		$this->db->select('b.*,pa.patient_name,t.treatment_name,t.treatment_charges,d.consolation_charges,d.doctor_name,pa.address,pa.email_id');
		$this->db->from('billtb b');
		$this->db->where(array('b.is_active'=>1,'b.bill_id_pk'=>$id));
		$this->db->join('patienttb pa','pa.patient_id_pk=b.patient_id_fk');
		$this->db->join('treatmenttb t','t.treatment_id_pk=b.treatment_id_fk');
		$this->db->join('doctortb d','d.doctor_id_pk=b.doctor_id_fk');
		
		$query=$this->db->get();
	  return $query->row_array();

  	}

}

?>