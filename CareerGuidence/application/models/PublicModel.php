<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublicModel extends CI_Model {

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
	public function insertcontact($data)
	{
		return $this->db->insert('contact_us',$data);
	}
	public function insertusers($data)
	{
		return $this->db->insert('reg_user',$data);
	}
	public function loginuser($e,$p)
	{
 		$this->db->where(array('u_email'=>$e,'u_pwd'=>$p));
 		return $this->db->count_all_results('reg_user');
	}

	public function selectstatus($email)
	{
		$this->db->select('u_status');
		$this->db->from('reg_user');
		$this->db->where('u_email',$email);
		return $query = $this->db->get()->row()->u_status;
	    
	}

}
