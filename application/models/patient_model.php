<?php

class patient_model extends CI_Model
{
	function insertpatient($data)
	{
		$this->db->insert('patienttb',$data);
		return $this->db->insert_id();
	}

	function patientdata($id)
	{
		$qry=$this->db->get_where('patienttb',array('is_active'=>1,'patient_id_pk'=>$id));
		return $qry->row_array();
	}

	function patient_check($data)
	{
		$qry=$this->db->get_where('patienttb',array('is_active'=>1,'email_id'=>$data['email_id']));
		return $qry->row_array();
	}
	function countpatient()
	{
		$this->db->select('*');
		$this->db->from('patienttb');
		return $this->db->count_all_results();
	}

	function patientlist()
	{
		 $qry=$this->db->get_where('patienttb',array('is_active'=>1));
		return $qry->result_array();
	}
	function updatepatient($data)
	{
		$this->db->where('patient_id_pk',$data['patient_id_pk']);
		return $this->db->update('patienttb',$data);
	}

	function deletepatient($id)
	{
		$this->db->where('patient_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->update('patienttb');
	}
}
?>