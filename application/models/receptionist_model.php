<?php
class receptionist_model extends CI_Model
{
	function insertreceptionist($data)
	{
		$this->db->insert('receptionisttb',$data);
		return $this->db->insert_id();
	}

	function receptionistdata($id)
	{
		$qry=$this->db->get_where('receptionisttb',array('is_active'=>1,'receptionist_id_pk'=>$id));
		return $qry->row_array();
	}

	function receptionistlist()
	{
		$qry=$this->db->get_where('receptionisttb',array('is_active'=>1));
		return $qry->result_array();
		
	}
	function updatedreceptionist($data)
	{
		$this->db->where('receptionist_id_pk',$data['receptionist_id_pk']);
		return $this->db->update('receptionisttb',$data);
	}

	function deletereceptionist($id)
	{	
		$this->db->where('receptionist_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->update('receptionisttb');
	}
}
?>