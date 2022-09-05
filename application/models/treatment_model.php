<?php

class treatment_model extends CI_Model
{
	function inserttreatment($data)
	{
		$this->db->insert('treatmenttb',$data);
		return $this->db->insert_id();
	}

	function treatmentdata($id)
	{
		$qry=$this->db->get_where('treatmenttb',array('is_active'=>1,'treatment_id_pk'=>$id));
		return $qry->row_array();
	}

	function treatmentlist()
	{
		$this->db->select('t.*,d.doctor_name');
		$this->db->from('treatmenttb t');
		$this->db->where('t.is_active',1);
		$this->db->join('doctortb d','d.doctor_id_pk=t.doctor_id_fk');

		$qry=$this->db->get();
		return $qry->result_array();
	}
	function treatmenttoplist()
	{
		$this->db->select('t.*,d.doctor_name');
		$this->db->from('treatmenttb t');
		$this->db->where('t.is_active',1);
		$this->db->limit(4);
		$this->db->join('doctortb d','d.doctor_id_pk=t.doctor_id_fk');

		$qry=$this->db->get();
		return $qry->result_array();
	}
	
	function updatetreatment($data)
	{
		$this->db->where('treatment_id_pk',$data['treatment_id_pk']);

		return $this->db->update('treatmenttb',$data);
	}

	function deletetreatment($id)
	{
		$this->db->where('treatment_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->update('treatmenttb');
	}
}
?>