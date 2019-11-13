<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModule extends CI_Controller {

	public function index()
	{
		$this->load->view('ad_login');
	}

	public function loginform()
	{
		$email=$this->input->post('email');
		$pwd=$this->input->post('pwd');
		$data=array('a_email'=>$email,'a_pwd'=>$pwd);
		$this->load->model('AdminModel');
		$count=$this->AdminModel->loginadmin($email,$pwd);
	    if($count)
		{
			//$this->session->set_userdata('email',$e);
			$_SESSION['a_email']=$email;
			redirect('AdminModule/admin_index');
		}
		else
		{
			redirect('AdminModule/index');
		}
		
	}

	public function admin_index()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->view('a_index',$query);
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function logout()
	{
		if($this->session->has_userdata('a_email'))
		{
			$this->session->unset_userdata('a_email');			
			redirect('AdminModule/index');
		}
		
	}

	public function check_old_pwd()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$opwd = $this->input->post('opwd');
			$result=$this->AdminModel->checkoldpwd($email,$opwd);
			echo json_encode($result);
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function pwd_change()
	{
		$this->load->model('AdminModel');
		$npwd = $this->input->post('npwd');
		$email = $this->session->userdata('a_email');
		$data = array('a_pwd'=>$npwd); 
		$result=$this->AdminModel->changepwd($email,$data);
		echo json_encode($result);
	}

	public function change_pwd()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->view('a_change_pwd',$query);
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function view_users()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['userdetails']=$this->AdminModel->selectusers();
				if($query['userdetails'])
				{
					$this->load->view('a_view_users',$query);
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function view_contacts()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['contacts']=$this->AdminModel->selectcontacts();
				if($query['contacts'])
				{
					$this->load->view('a_view_contacts',$query);
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function user_inactive($uid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$userid = $uid;
			$this->load->model('AdminModel');
			$status='inactive';
			$data=array('u_status'=>$status);
			$query=$this->AdminModel->userinactive($userid,$data);
			if($query == true)
			{
				redirect('AdminModule/view_users');
			}
			else if($query == false)
			{
				redirect('AdminModule/admin_index');
			}
			else
			{
				
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function user_active($uid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$userid = $uid;
			$this->load->model('AdminModel');
			$status="active";
			$data=array('u_status'=>$status);
			$query=$this->AdminModel->useractive($userid,$data);
			if($query == true)
			{
				redirect('AdminModule/view_users');
			}
			else if($query == false)
			{
				redirect('AdminModule/admin_index');
			}
			else
			{

			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function chat_box($uid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$u=$uid;
			$query['user']=$u;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$datas=$this->AdminModel->selectchat($u);
				// $this->load->library('upload');
				// $query=array('upload_data'=>$this->upload->data());
				$query['chats'] = $datas['chats'];
				$query['count'] = $datas['count'];
				$this->load->view('a_chat_box',$query);
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function sendchat($aid,$uid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$a=$aid;
			$u=$uid;
			$msg=$this->input->post('msg');
			$data=array('chat_from'=>$a,'chat_to'=>$u,'chat_msg'=>$msg);			
			$this->load->model('AdminModel');
			$querys=$this->AdminModel->sendchat($data);
			if($querys)
			{
				redirect('AdminModule/chat_box/'.$u);
			}
			else
			{
				redirect('AdminModule/chat_box/'.$u);
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function add_colleges()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->view('a_add_college',$query);
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function insert_colleges()
	{
		if($this->session->has_userdata('a_email'))
		{
			$cename=$this->input->post('name');
			$ceowner=$this->input->post('owner');
			$cetype=$this->input->post('type');
			$ceun=$this->input->post('university');
			$cephone=$this->input->post('phone');
			$ceaddr=$this->input->post('address');
			$celoc=$this->input->post('loc');
			$ceurl=$this->input->post('url');
			$cerate=$this->input->post('rating');
			$cestatus="allow";
			$data=array('ce_name'=>$cename,'ce_ownership'=>$ceowner,'ce_type'=>$cetype,'ce_university'=>$ceun,'ce_phone'=>$cephone,'ce_address'=>$ceaddr,'ce_location'=>$celoc,'ce_url'=>$ceurl,'ce_status'=>$cestatus,'ce_ratings'=>$cerate);
			$this->load->model('AdminModel');
			$query=$this->AdminModel->insertcollege($data);
			if($query)
			{
				redirect('AdminModule/view_colleges');
			}
			else
			{
				redirect('UserModule/error_404');
			}

		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function view_colleges()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['college']=$this->AdminModel->selectcolleges();
				if($query['college'])
				{
					$this->load->view('a_view_colleges',$query);
				}
				else
				{
					redirect('UserModule/error_404');
				}
			}
			else
			{
				redirect('UserModule/error_404');
			}

		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function add_courses()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->view('a_add_course',$query);
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function insert_courses()
	{
		if($this->session->has_userdata('a_email'))
		{
			$coname=$this->input->post('name');
			$costream=$this->input->post('stream');
			$cocat=$this->input->post('category');
			$cotype=$this->input->post('type');
			$codur=$this->input->post('dur');
			$coeli=$this->input->post('eligible');
			$data=array('co_name'=>$coname,'co_stream'=>$costream,'co_category'=>$cocat,'co_type'=>$cotype,'co_duration'=>$codur,'co_eligibility'=>$coeli);
			$this->load->model('AdminModel');
			$query=$this->AdminModel->insertcourse($data);
			if($query)
			{
				redirect('AdminModule/view_courses');
			}
			else
			{
				redirect('UserModule/error_404');
			}

		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function view_courses()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['course']=$this->AdminModel->selectcourses();
				if($query['course'])
				{
					$this->load->view('a_view_courses',$query);
				}
				else
				{
					redirect('UserModule/error_404');
				}
			}
			else
			{
				redirect('UserModule/error_404');
			}

		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function course_add($cid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$ceid=$cid;
			$query['ceid']=$ceid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['college']=$this->AdminModel->selectcollege($ceid);
				$this->load->model('AdminModel');
				$query['course']=$this->AdminModel->selectcourses();
				if($query['course'])
				{
					$this->load->view('a_college_course',$query);
				}
				else
				{
					redirect('UserModule/error_404');
				}
			}
			else
			{
				redirect('UserModule/error_404');
			}

		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function insert_addcourse($ceid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$ce_id=$ceid;
			$co_id=$this->input->post('courseid');
			$data=array('ce_id'=>$ce_id,'co_id'=>$co_id);
			$this->load->model('AdminModel');
			$query=$this->AdminModel->insertcourseadd($data);
			if($query)
			{
				redirect('AdminModule/course_add/'.$ce_id);
			}
			else
			{
				redirect('UserModule/error_404');
			}

		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function college_tocourses($ceid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$ce_id = $ceid;
			$query['ceid']=$ce_id;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['cid']=$this->AdminModel->collegetocourseid($ce_id);
				$this->load->model('AdminModel');
				$query['course']=$this->AdminModel->selectcourses();
				if($query['course'])
				{
					$this->load->view('a_college_tocourse',$query);
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function course_tocolleges($coid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$co_id = $coid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['ceid']=$this->AdminModel->coursetocollegeid($co_id);
				$this->load->model('AdminModel');
				$query['college']=$this->AdminModel->selectcolleges();
				if($query['college'])
				{
					$this->load->view('a_course_tocollege',$query);
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function edit_college($ceid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$ce_id=$ceid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['college']=$this->AdminModel->selectcollege($ce_id);
				if($query['college'])
				{
					$this->load->view('a_edit_college',$query);
				}
				else
				{
					redirect('AdminModule/view_colleges');
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function update_college($ceid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$ce_id=$ceid;
			$cename=$this->input->post('name');
			$ceowner=$this->input->post('owner');
			$cetype=$this->input->post('type');
			$ceun=$this->input->post('university');
			$cephone=$this->input->post('phone');
			$ceaddr=$this->input->post('address');
			$celoc=$this->input->post('loc');
			$ceurl=$this->input->post('url');
			$cerate=$this->input->post('rating');
			$cestatus="allow";
			$data=array('ce_name'=>$cename,'ce_ownership'=>$ceowner,'ce_type'=>$cetype,'ce_university'=>$ceun,'ce_phone'=>$cephone,'ce_address'=>$ceaddr,'ce_location'=>$celoc,'ce_url'=>$ceurl,'ce_status'=>$cestatus,'ce_ratings'=>$cerate);
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['colleges']=$this->AdminModel->updatecollege($ce_id,$data);
				if($query['colleges'])
				{
					redirect('AdminModule/view_colleges');
				}
				else
				{
					redirect('AdminModule/view_colleges');
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function edit_course($coid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$co_id=$coid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['course']=$this->AdminModel->selectcourse($co_id);
				if($query['course'])
				{
					$this->load->view('a_edit_course',$query);
				}
				else
				{
					redirect('AdminModule/view_courses');
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function update_course($coid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$co_id=$coid;
			$coname=$this->input->post('name');
			$costream=$this->input->post('stream');
			$cocat=$this->input->post('category');
			$cotype=$this->input->post('type');
			$codur=$this->input->post('dur');
			$coeli=$this->input->post('eligible');
			$data=array('co_name'=>$coname,'co_stream'=>$costream,'co_category'=>$cocat,'co_type'=>$cotype,'co_duration'=>$codur,'co_eligibility'=>$coeli);
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['courses']=$this->AdminModel->updatecourse($co_id,$data);
				if($query['courses'])
				{
					redirect('AdminModule/view_courses');
				}
				else
				{
					redirect('AdminModule/view_courses');
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function delete_course($coid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$co_id=$coid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['courses']=$this->AdminModel->deletecoursefrom($co_id);	
				if($query['courses'])
				{
					$this->load->model('AdminModel');
					$query['course']=$this->AdminModel->deletecourse($co_id);
					if($query['course'])
					{
						redirect('AdminModule/view_courses');
					}
					else
					{
						redirect('AdminModule/view_courses');
					}
				}
				else
				{
					redirect('AdminModule/view_courses');
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function remove_coursefrom($coid,$ceid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$co_id=$coid;
			$ce_id=$ceid;
			$email=$this->session->userdata('a_email');
			$data= array('ce_id'=>$ce_id,'co_id'=>$co_id);
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['courses']=$this->AdminModel->removecoursefrom($data);	
				if($query['courses'])
				{
					redirect('AdminModule/college_tocourses/'.$ce_id);
				}
				else
				{
					redirect('AdminModule/college_tocourses/'.$ce_id);
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function college_block($ceid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$ce_id=$ceid;
			$cestatus="block";
			$data=array('ce_status'=>$cestatus);
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['colleges']=$this->AdminModel->blockcollege($ce_id,$data);
				if($query['colleges'])
				{
					redirect('AdminModule/view_colleges');
				}
				else
				{
					redirect('AdminModule/view_colleges');
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function college_allow($ceid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$ce_id=$ceid;
			$cestatus="allow";
			$data=array('ce_status'=>$cestatus);
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['colleges']=$this->AdminModel->allowcollege($ce_id,$data);
				if($query['colleges'])
				{
					redirect('AdminModule/view_colleges');
				}
				else
				{
					redirect('AdminModule/view_colleges');
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function add_notifications()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->view('a_add_notifications',$query);
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function view_notifications()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['notify']=$this->AdminModel->selectnotifications();
				if($query['notify'])
				{
					$this->load->view('a_view_notifications',$query);
				}
				else
				{
					$this->load->view('a_view_notifications',$query);
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function edit_notifications($noid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$nid=$noid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['notify']=$this->AdminModel->selectnotification($nid);
				if($query['notify'])
				{
					$this->load->view('a_edit_notifications',$query);
				}
				else
				{
					$this->load->view('a_edit_notifications',$query);
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function update_notifications($noid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$nid=$noid;
			$name = $this->input->post('name');
			$dept = $this->input->post('dept');
			$cat = $this->input->post('category');
			$datetime = $this->input->post('datetime');
			$des = $this->input->post('des');
			$data = array('n_name'=>$name,'n_department'=>$dept,'n_category'=>$cat,'n_datetime'=>$datetime,'n_describe'=>$des);
			$this->load->model('AdminModel');
			$query['notify']=$this->AdminModel->updatenotifications($nid,$data);
			if($query['notify'])
			{
				redirect('AdminModule/view_notifications');
			}
			else
			{
				redirect('AdminModule/view_notifications');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function delete_notifications($noid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$nid=$noid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['notify']=$this->AdminModel->deletenotifications($nid);
				if($query['notify'])
				{
					redirect('AdminModule/view_notifications');
				}
				else
				{
					redirect('AdminModule/view_notifications');
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function insert_notifications()
	{
		if($this->session->has_userdata('a_email'))
		{
			$name = $this->input->post('name');
			$dept = $this->input->post('dept');
			$cat = $this->input->post('category');
			$datetime = $this->input->post('datetime');
			$des = $this->input->post('des');
			$data = array('n_name'=>$name,'n_department'=>$dept,'n_category'=>$cat,'n_datetime'=>$datetime,'n_describe'=>$des);
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['notify']=$this->AdminModel->insertnotifications($data);
				if($query['notify'])
				{
					redirect('AdminModule/view_notifications');
				}
				else
				{
					redirect('AdminModule/view_notifications');
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function add_videos()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->view('a_add_videos',$query);
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function view_videos()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['videos']=$this->AdminModel->selectvideos();
				if($query['videos'])
				{
					$this->load->view('a_view_videos',$query);
				}
				else
				{
					$this->load->view('a_view_videos',$query);
				}
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function delete_videos($viid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$vid=$viid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['video']=$this->AdminModel->deletevideos($vid);
				if($query['video'])
				{
					redirect('AdminModule/view_videos');
				}
				else
				{
					redirect('AdminModule/view_videos');
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function delete_contacts($cid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$cids=$cid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['contacts']=$this->AdminModel->deletecontacts($cids);
				if($query['contacts'])
				{
					redirect('AdminModule/view_contacts');
				}
				else
				{
					redirect('AdminModule/view_contacts');
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function insert_videos()
	{
		if($this->session->has_userdata('a_email'))
		{
			$vdes = $this->input->post('des');
			$video = $_FILES['video']['name'];
			if (isset($video)) 
			{
				$time = Time();
          		$videos = explode('.',$video);
          		$video_name =$time.'.'.end($videos);
            	unset($config);
           		$date = date("ymd");
            	$configVideo['upload_path'] = './videos';
            	$configVideo['allowed_types'] = 'mp4|3gp|avi|flv|wmv';
            	$configVideo['overwrite'] = FALSE;
            	$configVideo['remove_spaces'] = TRUE;
            	$configVideo['file_name'] = $video_name;
            	$this->load->library('upload', $configVideo);
            	$this->upload->initialize($configVideo);
            	if (!$this->upload->do_upload('video')) 
            	{
            	    echo $this->upload->display_errors();
            	} 
            	else 
            	{
            	    $data = array('v_video'=>$video_name,'v_describe'=>$vdes);
					$email=$this->session->userdata('a_email');
					$this->load->model('AdminModel');
					$query['videos']=$this->AdminModel->insertvideos($data);
					if($query['videos'])
					{
						redirect('AdminModule/view_videos');
					}
					else
					{
						redirect('AdminModule/view_videos');
					}
            	}	
        	}
        	else
        	{
        		redirect('AdminModule/view_videos');
        	}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function add_ebooks()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->view('a_add_ebooks',$query);
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function view_ebooks()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['ebook']=$this->AdminModel->selectebooks();
				if($query['ebook'])
				{
					$this->load->view('a_view_ebooks',$query);
				}
				else
				{
					$this->load->view('a_view_ebooks',$query);
				}
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function delete_ebooks($ebid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$eid=$ebid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['book']=$this->AdminModel->deleteebooks($eid);
				if($query['book'])
				{
					redirect('AdminModule/view_ebooks');
				}
				else
				{
					redirect('AdminModule/view_ebooks');
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function insert_ebooks()
	{
		if($this->session->has_userdata('a_email'))
		{
			$edes = $this->input->post('des');
			$ename = $this->input->post('name');
			$eauthor = $this->input->post('author');
			$image = $_FILES['image']['name'];
			$book = $_FILES['book']['name'];
			if (isset($image) && isset($book)) 
			{
				$time = Time();
          		$img = explode('.',$image);
          		$img_name =$time.'.'.end($img);
            	unset($config);
           		$date = date("ymd");
            	$configImage['upload_path'] = './ebooks';
            	$configImage['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
            	$configImage['overwrite'] = FALSE;
            	$configImage['remove_spaces'] = TRUE;
            	$configImage['file_name'] = $img_name;
            	$this->load->library('upload', $configImage);
            	$this->upload->initialize($configImage);
            	if (!$this->upload->do_upload('image')) 
            	{
            	    echo $this->upload->display_errors();
            	} 
            	else 
            	{
            		$time = Time();
          			$books = explode('.',$book);
          			$ebook =$time.'.'.end($books);
            		unset($config);
           			$date = date("ymd");
            		$configBook['upload_path'] = './ebooks';
            		$configBook['allowed_types'] = 'pdf';
            		$configBook['overwrite'] = FALSE;
            		$configBook['remove_spaces'] = TRUE;
            		$configBook['file_name'] = $ebook;
            		$this->load->library('upload', $configBook);
            		$this->upload->initialize($configBook);
            		if (!$this->upload->do_upload('book')) 
            		{
            		    echo $this->upload->display_errors();
            		}
            		else
            		{
            	    	$data = array('e_name'=>$ename,'e_author'=>$eauthor,'e_describe'=>$edes,'e_image'=>$img_name,'e_book'=>$ebook);
						$email=$this->session->userdata('a_email');
						$this->load->model('AdminModel');
						$query['ebooks']=$this->AdminModel->insertebooks($data);
						if($query['ebooks'])
						{
							redirect('AdminModule/view_ebooks');
						}
						else
						{
							redirect('AdminModule/view_ebooks');
						}
					}
            	}	
        	}
        	else
        	{
        		redirect('AdminModule/view_ebooks');
        	}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function add_quiz_categories()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->view('a_add_quiz_category',$query);
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function view_quiz_categories()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['quiz']=$this->AdminModel->selectquizcategories();
				if($query['quiz'])
				{
					$this->load->view('a_view_quiz_categories',$query);
				}
				else
				{
					$this->load->view('a_view_quiz_categories',$query);
				}
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function edit_quiz_categories($qcid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$qc_id=$qcid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['quiz']=$this->AdminModel->selectquizcategory($qc_id);
				if($query['quiz'])
				{
					$this->load->view('a_edit_quiz_category',$query);
				}
				else
				{
					$this->load->view('a_edit_quiz_category',$query);
				}
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function update_quiz_categories($qc_id)
	{
		if($this->session->has_userdata('a_email'))
		{
			$qcid=$qc_id;
			$name=$this->input->post('name');
			$des=$this->input->post('des');
			$data=array('qc_name'=>$name,'qc_describe'=>$des);
			$this->load->model('AdminModel');
			$query['quiz']=$this->AdminModel->updatequizcategories($qcid,$data);
			if($query['quiz'])
			{
				redirect('AdminModule/view_quiz_categories');
			}
			else
			{
				redirect('AdminModule/view_quiz_categories');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function delete_quiz_categories($qc_id)
	{
		if($this->session->has_userdata('a_email'))
		{
			$qcid=$qc_id;
			$this->load->model('AdminModel');
			$query['quiz']=$this->AdminModel->deletequizcategories($qcid);
			if($query['quiz'])
			{
				redirect('AdminModule/view_quiz_categories');
			}
			else
			{
				redirect('AdminModule/view_quiz_categories');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function insert_quiz_categories()
	{
		if($this->session->has_userdata('a_email'))
		{
			$name=$this->input->post('name');
			$des=$this->input->post('des');
			$data=array('qc_name'=>$name,'qc_describe'=>$des);
			$this->load->model('AdminModel');
			$query['quiz']=$this->AdminModel->insertquizcategories($data);
			if($query['quiz'])
			{
				redirect('AdminModule/view_quiz_categories');
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function add_question($qcid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$query['qcid']=$qcid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->view('a_add_question',$query);
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function insert_question($qcid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$qc_id=$qcid;
			$que=$this->input->post('que');
			$op1=$this->input->post('op1');
			$op2=$this->input->post('op2');
			$op3=$this->input->post('op3');
			$op4=$this->input->post('op4');
			$ans=$this->input->post('ans');
			$data=array('q_name'=>$que,'q_option1'=>$op1,'q_option2'=>$op2,'q_option3'=>$op3,'q_option4'=>$op4,'q_answer'=>$ans);
			$this->load->model('AdminModel');
			$query['question']=$this->AdminModel->insertquestion($data,$qc_id);
			if($query['question'])
			{
				redirect('AdminModule/view_question/'.$qc_id);
			}
			else
			{
				redirect('AdminModule/view_question/'.$qc_id);
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function view_question($qcid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$qc_id=$qcid;
			$query['qcid']=$qcid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['qid']=$this->AdminModel->selectquestionid($qcid);
				if($query['qid'])
				{
					$this->load->model('AdminModel');
					$query['question']=$this->AdminModel->selectquestions();
					if($query['question'])
					{
						$this->load->view('a_view_questions',$query);
					}
					else
					{
						$this->load->view('a_view_questions',$query);
					}
				}
				else
				{
					$this->load->view('a_view_questions',$query);
				}
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function add_course_qcat($qcid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$qc_id=$qcid;
			$query['qcid']=$qcid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['quizcat']=$this->AdminModel->selectquizcategory($qc_id);
				$this->load->model('AdminModel');
				$query['course']=$this->AdminModel->selectcourses();
				if($query['course'])
				{
					$this->load->view('a_add_course_quizcat',$query);
				}
				else
				{
					redirect('AdminModule/view_quiz_categories');
				}
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function insert_addquizcourse($qcid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$cid = $this->input->post('courseid');
			$qcids=$qcid;
			$data=array('qc_id'=>$qcids,'co_id'=>$cid);
			$this->load->model('AdminModel');
			$query['course']=$this->AdminModel->insertquizcatcourses($data);
			if($query['course'])
			{
				redirect('AdminModule/view_quiz_categories');
			}
			else
			{
				redirect('AdminModule/view_quiz_categories');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}

	}

	public function view_course_qcat($qcid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$query['qcids']=$qcid;
			$qcids=$qcid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['cid']=$this->AdminModel->selectquizcourse($qcids);
				if($query['cid'])
				{
					$this->load->model('AdminModel');
					$query['course']=$this->AdminModel->selectcourses();
					if($query['course'])
					{
						$this->load->view('a_view_quiz_courses',$query);
					}
					else
					{
						$this->load->view('a_view_quiz_courses',$query);
					}
				}
				else
				{
					redirect('AdminModule/view_quiz_categories');
				}
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function delete_quizcourse($coid,$qcid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$coids = $coid;
			$qcids=$qcid;
			$data=array('qc_id'=>$qcids,'co_id'=>$coids);
			$this->load->model('AdminModel');
			$query['course']=$this->AdminModel->deletequizcourse($data);
			if($query['course'])
			{
				redirect('AdminModule/view_quiz_categories');
			}
			else
			{
				redirect('AdminModule/view_quiz_categories');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}

	}

	public function delete_questions($qid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$qids=$qid;
			$this->load->model('AdminModel');
			$query['quiz']=$this->AdminModel->deletequestions($qid);
			if($query['quiz'])
			{
				redirect('AdminModule/view_quiz_categories');
			}
			else
			{
				redirect('AdminModule/view_quiz_categories');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function edit_questions($qid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$qids=$qid;
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['quiz']=$this->AdminModel->selectquestion($qids);
				if($query['quiz'])
				{
					$this->load->view('a_edit_question',$query);
				}
				else
				{
					redirect('AdminModule/view_quiz_categories');
				}
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function update_questions($qid)
	{
		if($this->session->has_userdata('a_email'))
		{
			$qids=$qid;
			$que=$this->input->post('que');
			$op1=$this->input->post('op1');
			$op2=$this->input->post('op2');
			$op3=$this->input->post('op3');
			$op4=$this->input->post('op4');
			$ans=$this->input->post('ans');
			$data=array('q_name'=>$que,'q_option1'=>$op1,'q_option2'=>$op2,'q_option3'=>$op3,'q_option4'=>$op4,'q_answer'=>$ans);
			$this->load->model('AdminModel');
			$query['quiz']=$this->AdminModel->updatequestions($data,$qids);
			if($query['quiz'])
			{
				redirect('AdminModule/view_quiz_categories');
			}
			else
			{
				redirect('AdminModule/view_quiz_categories');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function view_user_results()
	{
		if($this->session->has_userdata('a_email'))
		{
			$email=$this->session->userdata('a_email');
			$this->load->model('AdminModel');
			$query['admin']=$this->AdminModel->selectadmin($email);
			if($query['admin'])
			{
				$this->load->model('AdminModel');
				$query['result']=$this->AdminModel->selectquizresults();
				$this->load->model('AdminModel');
				$query['quizcat']=$this->AdminModel->selectquizcategories();
				if($query['result'])
				{
					$this->load->model('AdminModel');
					$query['users']=$this->AdminModel->selectusers();
					if($query['users'])
					{
						$this->load->view('a_view_quiz_results',$query);
					}
					else
					{
						$this->load->view('a_view_quiz_results',$query);
					}
				}
				else
				{
					$this->load->view('a_view_quiz_results',$query);
				}
			}
			else
			{
				redirect('UserModule/error_404');
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

}