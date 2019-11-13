<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	public function loginadmin($email,$pwd)
	{
		$this->db->where(array('a_email'=>$email,'a_pwd'=>$pwd));
 		return $this->db->count_all_results('admin_login');
	}

	public function selectadmin($email)
	{
		$this->db->select('*');
		$this->db->from('admin_login');
		$this->db->where('a_email',$email);
		$query = $this->db->get();
	    return $query->result();
	}

	public function changepwd($email,$data)
	{
		$this->db->where('a_email',$email);
	    $this->db->update('admin_login',$data);
	  	if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function checkoldpwd($email,$pwd)
	{
	 $this->db->where(array('a_email'=>$email,'a_pwd'=>$pwd));
	 $count=$this->db->count_all_results('admin_login');
	 if($count==1)
	 {
		return true;
	 }
	 else
	 {
	 	return false;
	 }
	}

	public function selectusers()
	{
		$this->db->select('*');
		$this->db->from('reg_user');
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectcontacts()
	{
		$this->db->select('*');
		$this->db->from('contact_us');
		$query = $this->db->get();
	    return $query->result();
	}

	public function userinactive($uid,$data)
	{
		$this->db->where('u_id',$uid);
	    $this->db->update('reg_user',$data);	
	    if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function useractive($uid,$data)
	{
		$this->db->where('u_id',$uid);
	    $this->db->update('reg_user',$data);
	    if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
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

	public function insertcollege($data)
	{
		$this->db->insert('college_details',$data);
		if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function selectcolleges()
	{
		$this->db->select('*');
		$this->db->from('college_details');
		$query = $this->db->get();
	    return $query->result();
	}

	public function insertcourse($data)
	{
		$this->db->insert('course_details',$data);
		if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function selectcourses()
	{
		$this->db->select('*');
		$this->db->from('course_details');
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectcollege($ceid)
	{
		$this->db->select('*');
		$this->db->from('college_details');
		$this->db->where('ce_id',$ceid);
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectcourse($coid)
	{
		$this->db->select('*');
		$this->db->from('course_details');
		$this->db->where('co_id',$coid);
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

	public function insertcourseadd($data)
	{
		$this->db->insert('college_course',$data);
		if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function coursetocollegeid($coid)
	{
		$this->db->select('*');
		$this->db->from('college_course');
		$this->db->where('co_id',$coid);
		$query = $this->db->get();
	    return $query->result();
	}

	public function updatecollege($ceid,$data)
	{
		$this->db->where('ce_id',$ceid);
	    $this->db->update('college_details',$data);
	  	if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function updatecourse($coid,$data)
	{
		$this->db->where('co_id',$coid);
	    $this->db->update('course_details',$data);
	  	if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function deletecoursefrom($coid)
	{
		$this->db->where('co_id',$coid);
		return $this->db->delete('college_course');
	}

	public function deletecourse($coid)
	{
		$this->db->where('co_id',$coid);
		return $this->db->delete('course_details');
	}

	public function removecoursefrom($data)
	{
		$this->db->where($data);
		return $this->db->delete('college_course');
	}

	public function blockcollege($ceid,$data)
	{
		$this->db->where('ce_id',$ceid);
	    $this->db->update('college_details',$data);
	  	if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function allowcollege($ceid,$data)
	{
		$this->db->where('ce_id',$ceid);
	    $this->db->update('college_details',$data);
	  	if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function insertnotifications($data)
	{
		$this->db->insert('notifications',$data);
		if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function updatenotifications($nid,$data)
	{
		$this->db->where('n_id',$nid);
	    $this->db->update('notifications',$data);
	  	if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function selectnotifications()
	{
		$this->db->select('*');
		$this->db->from('notifications');
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectnotification($nid)
	{
		$this->db->select('*');
		$this->db->from('notifications');
		$this->db->where('n_id',$nid);
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

	public function insertvideos($data)
	{
		$this->db->insert('videos',$data);
		if ($this->db->affected_rows() > 0) {
         return true;
        }
        else {
         return false;
        }
	}

	public function selectebooks()
	{
		$this->db->select('*');
		$this->db->from('ebooks');
		$query = $this->db->get();
	    return $query->result();
	}

	public function insertebooks($data)
	{
		$this->db->insert('ebooks',$data);
		if ($this->db->affected_rows() > 0) {
         return true;
        }
        else {
         return false;
        }
	}

	public function insertquizcategories($data)
	{
		$this->db->insert('quiz_categories',$data);
		if ($this->db->affected_rows() > 0) {
         return true;
        }
        else {
         return false;
        }
	}

	public function updatequizcategories($qcid,$data)
	{
		$this->db->where('qc_id',$qcid);
	    $this->db->update('quiz_categories',$data);
	  	if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function deletequizcategories($qcid)
	{
		$this->db->where('qc_id',$qcid);
		$return1=$this->db->delete('quiz_categories');

		$this->db->where('qc_id',$qcid);
		$return2= $this->db->delete('quizcat_course');

		$this->db->select('*');
		$this->db->from('category_questions');
		$this->db->where('qc_id',$qcid);
		$query = $this->db->get();
		$result = $query->row();
		$qid = $result->q_id;

		$this->db->where('q_id',$qid);
		$return3= $this->db->delete('questions');

		$this->db->where('qc_id',$qcid);
		$return3= $this->db->delete('category_questions');
		$this->db->where('qc_id',$qcid);
		return $this->db->delete('quiz_results');
	}

	public function selectquizcategories()
	{
		$this->db->select('*');
		$this->db->from('quiz_categories');
		$query = $this->db->get();
	    return $query->result();
	}

	public function selectquizcategory($qcid)
	{
		$this->db->select('*');
		$this->db->from('quiz_categories');
		$this->db->where('qc_id',$qcid);
		$query = $this->db->get();
	    return $query->result();
	}

	public function insertquestion($data,$qcid)
	{
		$returnId = $this->db->insert('questions',$data);
		$qid = $this->db->insert_id();
		$datas = array('q_id'=>$qid,'qc_id'=>$qcid);
		return $this->db->insert('category_questions',$datas);
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

	public function selectquestion($qid)
	{
		$this->db->select('*');
		$this->db->from('questions');
		$this->db->where('q_id',$qid);
		$query = $this->db->get();
	    return $query->result();
	}

	public function deletevideos($vid)
	{
		$this->db->where('v_id',$vid);
		return $this->db->delete('videos');
	}

	public function deleteebooks($eid)
	{
		$this->db->where('e_id',$eid);
		return $this->db->delete('ebooks');
	}

	public function deletecontacts($cid)
	{
		$this->db->where('c_id',$cid);
		return $this->db->delete('contact_us');
	}

	public function deletenotifications($nid)
	{
		$this->db->where('n_id',$nid);
		return $this->db->delete('notifications');
	}

	public function selectquizcourse($qcid)
	{
		$this->db->select('co_id');
		$this->db->from('quizcat_course');
		$this->db->where('qc_id',$qcid);
		$query = $this->db->get();
	    return $query->result();
	}

	public function insertquizcatcourses($data)
	{
		$this->db->insert('quizcat_course',$data);
		if ($this->db->affected_rows() > 0) {
         return true;
        }
        else {
         return false;
        }
	}

	public function deletequizcourse($data)
	{
		$this->db->where($data);
		return $this->db->delete('quizcat_course');
	}

	public function deletequestions($qid)
	{
		$this->db->where('q_id',$qid);
		$return1 = $this->db->delete('questions');
		$this->db->where('q_id',$qid);
		return $this->db->delete('category_questions');
	}

	public function updatequestions($data,$qid)
	{
		$this->db->where('q_id',$qid);
	    $this->db->update('questions',$data);
	  	if ($this->db->affected_rows() > 0) {
         return true;
         }
         else {
         return false;
         }
	}

	public function selectquizresults()
	{
		$this->db->select('*');
		$this->db->from('quiz_results');
		$this->db->order_by('u_id');
		$query = $this->db->get();
	    return $query->result();
	}

}