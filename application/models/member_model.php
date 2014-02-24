<?php
class Member_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function findBtKey($key){
		
		$this->db->select('*');
		$this->db->from('tb_user');
		//$this->db->join('tb_team', 'tb_team.UID = tb_user.UID', 'left');
		$this->db->like('NAME', $key);
		$this->db->or_like('EMAIL', $key);
		//$this->db->where('tb_user.UID', null);
		
		$query = $this->db->get();
		//echo $this->db->last_query();    
		return $query;
	}
	public function findByProject($pid){
		$this->db->select('*');
		$this->db->from('tb_team');
		$this->db->join('tb_user', 'tb_user.UID = tb_team.UID');
		$this->db->join('tb_role', 'tb_role.RID = tb_team.RID');
		$this->db->where('tb_team.PID', $pid);
		
		$query = $this->db->get();
		$member = $query->result_array();
		//echo $this->db->last_query();
		
		return $member;
		
	}
	
	Public function getMemberOption($pid)
	{
		$return = array();
		
		$this->db->select('tb_team.UID,tb_user.NAME');
		$this->db->from('tb_team');
		$this->db->join('tb_user', 'tb_user.UID= tb_team.UID','left');
		$this->db->where('PID', $pid);
		$query = $this->db->get();
		$res = $query->result_array();

		if( is_array( $res ) && count( $res ) > 0 )
		{
			$return[''] = 'Select Member';
			foreach($res as $row)
			{
				$return[$row['UID']] = $row['NAME'];
			}
		}
		return $return;
	}
	Public function checkmailforget($email)
	{
		$this->db->select('tb_user.EMAIL');
		$this->db->from('tb_user');
		$this->db->where('tb_user.EMAIL', $email);
		
		$query = $this->db->get();
	
		if ( $query->num_rows() > 0) {
			$chkMail = TRUE;
		}else {
			$chkMail = FALSE;
		}
	
		return $chkMail;
	}
	Public function savekey($email,$savekey)
	{
		$post = array(
				'UKEY' =>$savekey
		);
		
		$this->db->where('tb_user.EMAIL', $email);
		$this->db->update('tb_user', $post);
		//echo $this->db->last_query();
		return true;
	
	}
	
}
