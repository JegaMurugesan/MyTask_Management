<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Common_model extends CI_Model

{

	

	public function __construct()

	{

		parent::__construct();

	}

	

	/**

	 * [record_counts description]

	 * @param  [type] $user_id [users id]

	 * @return [INT]   user's id [description]

	 * @author Ganesh Ananthan

	 */

	

	public function common_insert($table,$data)

	{

	   $this->db->insert($table, $data);
	   $result = $this->db->insert_id();
		//$sql = $this->db->last_query();
		 //echo $sql;die;
		return $result;

	}

	function common_edit($table,$data,$where_array)

	{

		$str = $this->db->update($table , $data , $where_array);
		
		//echo $this->db->last_query();die;

		$result = $this->db->affected_rows();
		
		return $result;	

	}

	public function records_all($table,$constraint_array='')

	{

		$this->db->select('*');

		$this->db->from($table);

		if(!empty($constraint_array))

		{

			$this->db->where($constraint_array);	

		}

		$results= $this->db->get()->result();

		return $results;

	}
	
	function common_edit1($table,$data,$where_array)

	{

		$result = $this->db->update($table , $data , $where_array);
		return $result;	

	}
	/*
	 * @description: This function is used deleteRow
	 * 
	 */
	public function common_delete($table,$where_array)

	{

	   return $this->db->delete($table, $where_array);

	}
	

	
}