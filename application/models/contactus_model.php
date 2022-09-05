<?php

class contactus_model extends CI_Model
{
	function insertcontactus($data)
	{
		$this->db->insert('contactustb',$data);
		return $this->db->insert_id();
	}

	function contactusdata($id)
	{
		$qry=$this->db->get_where('contactustb',array('is_active'=>1,'contact_id_pk'=>$id));
		return $qry->row_array();
	}

	function contactuslist()
	{
		$qry=$this->db->get_where('contactustb',array('is_active'=>1,'is_read'=>1));
		return $qry->result_array();
	}

	function contactuslistmain()
	{
		$this->db->set('is_read',0);
		$this->db->update('contactustb');
		 $qry=$this->db->get_where('contactustb',array('is_active'=>1));
		return $qry->result_array();
		
	}
	function updatecontactus($data)
	{
		$this->db->where('contact_id_pk',$data['contact_id_pk']);
		return $this->db->update('contactustb',$data);
	}
	function countmsg()
	{
		$this->db->select('*');
		$this->db->from('contactustb');
		$this->db->where('is_active',1);
		$this->db->where('is_read',1);
		return $this->db->count_all_results();
	}

	function deletecontactus($id)
	{
		$this->db->where('contact_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->set('is_read',0);
		$this->db->update('contactustb');
	}
}
?>