<?php

class doctors_model extends CI_Model
{
	function insertdoctor($data)
	{
		$this->db->insert('doctortb',$data);
		return $this->db->insert_id();
	}

	function doctordata($id)
	{
		$qry=$this->db->get_where('doctortb',array('is_active'=>1,'doctor_id_pk'=>$id));
		return $qry->row_array();
	}

	function doctorlist()
	{
		$qry=$this->db->get_where('doctortb',array('is_active'=>1));
		return $qry->result_array();
	}
	function topdoctorlist()
	{
		$this->db->limit(4);
		$qry=$this->db->get_where('doctortb',array('is_active'=>1));
		return $qry->result_array();
	}
	function updatedoctor($data)
	{
		$this->db->where('doctor_id_pk',$data['doctor_id_pk']);
		return $this->db->update('doctortb',$data);
	}

	function deletedoctor($id)
	{
		$this->db->where('doctor_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->update('doctortb');
	}
	function countdoctors()
	{
		$this->db->select('*');
		$this->db->from('doctortb');
		$this->db->where('is_active',1);
		return $this->db->count_all_results();
	}
}
?>