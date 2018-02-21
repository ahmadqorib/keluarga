<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends CI_Model { 

	public function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query($tbl, $column_order, $column_search, $order)
	{
		
		$this->db->from($tbl);

		$i = 0;
	
		foreach ($column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($order))
		{
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($tbl, $column_order, $column_search, $order)
	{
		$this->_get_datatables_query($tbl, $column_order, $column_search, $order);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($tbl, $column_order, $column_search, $order)
	{
		$this->_get_datatables_query($tbl, $column_order, $column_search, $order);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($tbl)
	{
		$this->db->from($tbl);
		return $this->db->count_all_results();
	}

}
