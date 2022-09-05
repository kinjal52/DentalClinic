<?php

class user_model extends CI_Model
{
	function insertuser($data)
	{
		$this->db->insert('usertb',$data);
		return $this->db->insert_id();
	}

	function userdata($id)
	{
		$qry=$this->db->get_where('usertb',array('user_id_fk'=>$id));
		return $qry->row_array();
	}
	function user_auth($username,$password)
	{
		$qry=$this->db->get_where('usertb',array('user_name'=>$username,'user_password'=>$password));
		return $qry->row_array();
	}
	function user_pass($username)
	{
		$qry=$this->db->get_where('usertb',array('user_name'=>$username));
		return $qry->row_array();
	}

	function userlist()
	{
		$qry=$this->db->get_where('usertb');
		return $qry->result_array();
	}
	function updateduser($data)
	{
		$this->db->where('user_id_fk',$data['user_id_fk']);
		return $this->db->update('usertb',$data);
	}
	function updatedpass($data)
	{
		$this->db->where('user_id_pk',$data['user_id_pk']);
		return $this->db->update('usertb',$data);
	}
	function deleteuser($id)
	{
		$this->db->where('user_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->update('usertb');
	}
}
?>