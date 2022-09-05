<?php

class payment_model extends CI_Model
{
	function insertpayment($data)
	{
		$this->db->insert('paymenttb',$data);
		return $this->db->insert_id();
	}

	function paymentdata($id)
	{
		$qry=$this->db->get_where('paymenttb',array('is_active'=>1,'payment_id_pk'=>$id));
		return $qry->row_array();
	}

	function paymentlist()
	{
		// $this->db->select('p.*,d.doctor_name');
		// $this->db->from('patienttb p');
		// $this->db->where('p.is_active',1);
		// $this->db->join('doctortb d','d.doctor_id_pk=p.doctor_id_fk');

		$qry=$this->db->get_where('paymenttb',array('is_active' =>1));
		return $qry->result_array();
	}
	function updatepayment($data)
	{
		$this->db->where('payment_id_pk',$data['payment_id_pk']);
		return $this->db->update('paymenttb',$data);
	}

	function deletepayment($id)
	{
		$this->db->where('payment_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->update('paymenttb');


	}
}
?>