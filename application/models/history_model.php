<?php

class history_model extends CI_Model
{
	function inserthistory($data)
	{
		$this->db->insert('historytb',$data);
		return $this->db->insert_id();
	}

	function historydata($id)
	{
		$qry=$this->db->get_where('historytb',array('is_active'=>1,'history_id_pk'=>$id));
		return $qry->row_array();
	}

	function historylist()
	{
		$this->db->select('h.*,pa.patient_name,t.treatment_name,d.doctor_name');
		$this->db->from('historytb h');
		$this->db->where('h.is_active',1);
		$this->db->join('patienttb pa', 'pa.patient_id_pk=h.patient_id_fk');
		$this->db->join('treatmenttb t','t.treatment_id_pk=h.treatment_id_fk');
		$this->db->join('doctortb d','d.doctor_id_pk=h.doctor_id_fk');

		$qry=$this->db->get();
		return $qry->result_array();
	}
	function updatedhistory($data)
	{
		$this->db->where('history_id_pk',$data['history_id_pk']);
		return $this->db->update('historytb',$data);
	}

	// function deletehistory($id)
	// {
	// 	$this->db->where('history_id_pk',$id);
	// 	$this->db->set('is_active',0);
	// 	$this->db->update('historytb');
	// }
}
?>