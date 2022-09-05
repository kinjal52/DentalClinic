<?php

class prescription_model extends CI_Model
{
	function insertprescription($data)
	{
		$this->db->insert('prescriptiontb',$data);
		return $this->db->insert_id();
	}

	function prescriptiondata($id)
	{
		$qry=$this->db->get_where('prescriptiontb',array('is_active'=>1,'prescription_id_pk'=>$id));
		return $qry->row_array();
	}

	function prescriptionlist()
	{
		$this->db->select('p.*,pa.patient_name,t.treatment_name,m.medicine_name');
		$this->db->from('prescriptiontb p');
		$this->db->where('p.is_active',1);
		$this->db->join('patienttb pa','pa.patient_id_pk=p.patient_id_fk');
		$this->db->join('treatmenttb t','t.treatment_id_pk=p.treatment_id_fk');
		$this->db->join('medicinetb m','m.medicine_id_pk=p.medicine_id_fk');

		$qry=$this->db->get();
		//$qry=$this->db->get_where('prescriptiontb',array('is_active'=>1));
		return $qry->result_array();
	}
	function updateprescription($data)
	{
		$this->db->where('prescription_id_pk',$data['prescription_id_pk']);
		return $this->db->update('prescriptiontb',$data);
	}

	function deleteprescription($id)
	{
		$this->db->where('prescription_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->update('prescriptiontb');
	}
}
?>