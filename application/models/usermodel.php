<?php
class Usermodel extends CI_Model
{
	public function __construct() 
	{
		parent::__construct();
	}
	
	public function getRows($table /*#sql*/)
	{
		//$rs=$this->db->query($sql); 
		
		$rs=$this->db->get($table);
		return $rs->num_rows();
	}
}
?>