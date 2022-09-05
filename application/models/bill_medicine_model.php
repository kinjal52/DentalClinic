<?php

class bill_medicine_model extends CI_model
{
	public function insertmedicinebill($data)
	{
		$this->db->insert('medicine_billtb',$data);
		return $this->db->insert_id();
	}

	public function updatemedicinebill($data)
	{
		$this->db->where('medicine_bill_id_pk',$data['medicine_bill_id_pk']);
		return $this->db->update('medicine_billtb',$data);
	}

	public function deletemedicinebill($id)
	{
		$this->db->where('medicine_bill_id_pk',$id);
		$this->db->set('is_active',0);
		$this->db->update('medicine_billtb');
	}
	public function medicinebilldata($id)
	{
	 $query=$this->db->get_where('medicine_billtb',array('is_active'=>1,'medicine_bill_id_pk'=>$id));
		return $query->row_array();
	}
	public function medicinebilllist()
	{
		$this->db->select('mb.*,m.medicine_name');
		$this->db->from('medicine_billtb mb');
		$this->db->where('mb.is_active',1);
		
		 $this->db->join('medicinetb m','m.medicine_id_pk=mb.medicine_id_fk');
		 $query=$this->db->get();
	      return $query->result_array();

  }
   public function medicinebilldatalist($id)
	{
		$this->db->select('mb.*,m.medicine_name');
		$this->db->from('medicine_billtb mb');
		$this->db->where(array('mb.is_active'=>1,'mb.bill_id_fk'=>$id));
		$this->db->join('billtb b','b.bill_id_pk=mb.bill_id_fk');
		$this->db->join('medicinetb m','m.medicine_id_pk=mb.medicine_id_fk');
		
		$query=$this->db->get();
	  	return $query->result_array();
  	}
}

?>