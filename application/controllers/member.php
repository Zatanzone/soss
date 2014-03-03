<?php
class Member extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Member_model');
	//	$this->load->model('Role_model');
		$this->load->model('Project_model');
		$this->load->library('encrypt');
	}
 
	public function index($pid){
		//$pro['roleOption'] = $this->Role_model->getRoleOption();
				
		//print_r($pro['member']);
		$pro['roleOption']=array(
				'null'=>'<-- Select Role -->',
				'1'=>'Analyst ',
				'2'=>'Customer',
				'3'=>'Designer',
				'4'=>'Programmer',
				'5'=>'Project Manager',
				'6'=>'Technical Leader ',
				'7'=>'Work Team ',
		);
			
		$pro['member']= $this->memberList($pid);
		$project = $this->Project_model->getProject($pid);
		//print_r($project);
		foreach ($project as $pj){
			$pro['name']  = $pj['PROJECT'];
			$pro['role']  = $pj['ROLE'];		
			$pro['status']  = $pj['STATUS'];
		}
		
		$pro['pid'] = $pid;

		$checkPM= $this->Project_model->checkPM($pid);

		if($checkPM && $pro['status'] == 'N' ){ 
			$this->load->view('projectheader');
			$this->load->view('member/member',$pro);
			$this->load->view('projectside');
		}else{
			$this->load->view('projectheader');
			$this->load->view('member/memberview',$pro);
			$this->load->view('projectside');
		}
		
	
		
	}
	
	public function search($data){
		//$data = $this->input->get('data');
		
		$query = $this->Member_model->findBtKey($data);		
		$find = $query->result_array();

		echo json_encode($find);
	}
	
	public function add($uid,$pid){
		$data = array(
			'PID' => $pid,
			'UID' => $uid,
			'RID' => 7
		);
		
		if ($this->db->insert('tb_team', $data)) {
			redirect(base_url()."member/index/".$pid,"refresh");
		}
		
	}
	
	public function setRole(){
		
		 foreach($_POST['uid'] as $val )
		{
			if($val == $_POST['pm']){
				$post = array(
 				'RID' => '5',
 			);
			}else{
 			$post = array(
 				'RID' => $_POST['role'][$val],
 			);
			}
 			$this->db->where('PID', $_POST['pid']);
 			$this->db->where('UID', $val);
 			$this->db->update('tb_team', $post);

		} 
		redirect("member/index/".$_POST['pid'],"refresh");
	}
	
	public function del($id,$pid){
		$this->db->delete('tb_team', array('TID' => $id));
		redirect("member/index/".$pid,"refresh");
	}
	
	
	
	public function memberList($pid){
		//$pro['member'] = $this->memberList($_GET['pid']);
		$member = $this->Member_model->findByProject($pid);
		
		//echo json_encode($member);
		return $member;
	}
	
	public function forget(){
		
		
		
		
		if (isset($_REQUEST['email']))
		//if "email" is filled out, send email
		{
			$chkMail = $this->Member_model->checkmailforget($_REQUEST['email']);
			
			if($chkMail==true){
			
			//send email
			$to = $_REQUEST['email'] ;
			$subject = "Forget Password From Soss Website" ;
			$email = "soss.phuket@gmail.com" ;
			$message = "Press link to change password form"."\r\n\r\n\n"."http://soss.netau.net/form/forgetpassword"."\r\n\r\n"."keys: " . $_REQUEST['keys'] . "\r\n\r\n\n\n"."Thank You!! \n"."Soss Developer Team";
				
			$headers = 'From: '.$email."\r\n".'Reply-To: '.$email."\r\n" .'X-Mailer: PHP/' . phpversion();
				
			mail($to, $subject, $message, $headers);
			$savekey = $this->Member_model->savekey($_REQUEST['email'],$_REQUEST['keys']);
			if($savekey==true){

			echo "<script>";
				echo "alert('Sending Url and Key to your e-mail.');";
				echo "</script>";
				redirect("form/signin","refresh");
			
			}else{
				echo "<script>";
				echo "alert('Try again ! Have a Problem at method send key');";
				echo "</script>";
				redirect("form/signin","refresh");	
			}
			}else{
				echo "<script>";
				echo "alert('Try again! : this email is invalid');";
				echo "</script>";
				redirect("form/signin","refresh");
			}
		}
		else{
			echo "<script>";
			echo "alert('Try again!');";
			echo "</script>";
			redirect("form/signin");
		}
			
	}
	
	public function chgPwd(){
		
		$chg['email']=$this->input->post('email');
		$hashPassword = $this->encrypt->sha1($this->input->post('password'));
		$chg['password']=$hashPassword;
		$chg['ukey']=$this->input->post('ukey');
		
		
		
		
		$post = array(
				'PASSWORD' =>$chg['password']
		);
		
		$this->db->where('tb_user.EMAIL', $chg['email']);
		$this->db->where('tb_user.UKEY', $chg['ukey']);
		$this->db->update('tb_user', $post);
		//echo $this->db->last_query();
		echo "<script>";
		echo "alert('Success ! Your password is changed');";
		echo "</script>";
		redirect("form/signin","refresh");
		
		
	}
	
	
}
