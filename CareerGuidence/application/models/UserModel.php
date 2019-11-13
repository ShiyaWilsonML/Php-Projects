<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function selectuser($email)
	{
		$this->db->select('*');
		$this->db->from('reg_user');
		$this->db->where('u_email',$email);
		$query = $this->db->get();
	    return $query->result();
	}
	public function updateprofile($data,$email)
	{
		$this->db->where('u_email',$email);
		$returnId = $this->db->update('reg_user',$data);
		return $returnId;
	}

	public function changepwd($email,$data)
	{
		$this->db->where('u_email',$email);
	    $this->db->update('reg_user',$data);
	  	if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function checkoldpwd($email,$pwd)
	{
	 $this->db->where(array('u_email'=>$email,'u_pwd'=>$pwd));
	 $count=$this->db->count_all_results('reg_user');
	 if($count==1)
	 {
		return true;
	 }
	 else
	 {
	 	return false;
	 }
	}

	public function selectchat($u)
	{
		$this->db->select('*');
		$this->db->from('chat_box');
		$this->db->where('chat_from',$u);
		$this->db->or_where('chat_to', $u);
		$query = $this->db->get();
	    $chats = $query->result();
		$this->db->where('chat_from',$u);
		$this->db->or_where('chat_to', $u);
		$count=$this->db->count_all_results('chat_box');
	    return array(
    	'chats' => $chats,
    	'count' => $count,
		);
	}

	public function sendchat($data)
	{
		$this->db->insert('chat_box',$data);
	}

	public function selectcolleges()
	{
		$this->db->select('*');
		$this->db->from('college_details');
		$this->db->where('ce_status','allow');
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectcourses()
	{
		$this->db->select('*');
		$this->db->from('course_details');
		$query = $this->db->get();
	    return $query->result();
	}

	public function collegetocourseid($ceid)
	{
		$this->db->select('*');
		$this->db->from('college_course');
		$this->db->where('ce_id',$ceid);
		$query = $this->db->get();
	    return $query->result();
	}

	public function coursetocollegeid($coid)
	{
		$this->db->select('*');
		$this->db->from('college_course');
		$this->db->where('co_id',$coid);
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectnotifications()
	{
		$this->db->select('*');
		$this->db->from('notifications');
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectvideos()
	{
		$this->db->select('*');
		$this->db->from('videos');
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectebooks()
	{
		$this->db->select('*');
		$this->db->from('ebooks');
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectquestionid($qcid)
	{
		$this->db->select('q_id');
		$this->db->from('category_questions');
		$this->db->where('qc_id',$qcid);
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectquestions()
	{
		$this->db->select('*');
		$this->db->from('questions');
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectqcid()
	{
		$this->db->distinct();
		$this->db->select('qc_id');
		$this->db->from('category_questions');
		$this->db->order_by('qc_id','asc');
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectqcids($uid)
	{
		$this->db->distinct();
		$this->db->select('qc_id');
		$this->db->from('quiz_results');
		$this->db->where('u_id',$uid);
		$this->db->order_by('qc_id','asc');
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectqcidz($uid)
	{
    	$data ="qc_id NOT IN (SELECT qc_id FROM quiz_results WHERE u_id = $uid) AND qc_id IN (SELECT qc_id FROM category_questions)";
    	$this->db->select('qc_id');
    	$this->db->from('quiz_categories');
    	$this->db->where($data);
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectquizresult($uid)
	{
		$this->db->select('*');
		$this->db->from('quiz_results');
		$this->db->where('u_id',$uid);
		$query = $this->db->get();
	    return $query->result();
	}
	public function checkselectquizresult($uid)
	{
		$a="1";
		$array=array('qc_id'=>$a,'u_id'=>$uid);
		$this->db->select('qr_answers');
		$this->db->from('quiz_results');
		$this->db->where($array);
		$query=$this->db->get();
		return $query->result();
		
	}

	public function selectqname()
	{
		$this->db->select('*');
		$this->db->from('quiz_categories');
		$this->db->order_by('qc_id','asc');
		$query = $this->db->get();
	    return $query->result();
	}

	public function insertresult($data)
	{
		return $this->db->insert('quiz_results',$data);
	}

	public function updateresult($uid,$qcid,$data)
	{
		$this->db->where('u_id',$uid);
		$this->db->where('qc_id',$qcid);
		$returnId = $this->db->update('quiz_results',$data);
		return $returnId;
	}

	public function selectquizcourse($qcid)
	{
		$this->db->select('co_id');
		$this->db->from('quizcat_course');
		$this->db->where('qc_id',$qcid);
		$query = $this->db->get();
	    return $query->result();
	}

}
