<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModule extends CI_Controller {

	public function error_404()
	{
		$this->load->view('404');
	}

	public function user_index()
	{

		if($this->session->has_userdata('u_email'))
		{
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->view('u_index',$query);
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('u_email');
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('answers');
		$this->session->unset_userdata('qans');
		redirect('PublicModule/login');
	}
	public function view_profile()
	{
		if($this->session->has_userdata('u_email'))
		{
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->view('u_view_profile',$query);
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}
	
	public function edit_profile()
	{
		if($this->session->has_userdata('u_email'))
		{
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->view('u_edit_profile',$query);
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function updateform()
	{
		if($this->session->has_userdata('u_email'))
		{
			$emails=$this->session->userdata('u_email');
			echo $name=$this->input->post('name');
			echo $email=$this->input->post('email');
			echo $dob=$this->input->post('dob');
			echo $phone=$this->input->post('phone');
			echo $gender=$this->input->post('gender');
			echo $address=$this->input->post('address');
			echo $image=$_FILES['image1']['name'];
			if($image != "")
			{
				$time = Time();
          		$images = explode('.',$image);
          		$imagename =$time.'.'.end($images);
          		$config['upload_path']          = './uploads/';
          		$config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG|JPEG';
          		$config['file_name'] = $imagename;  
        		$this->load->library('upload', $config);
        		$this->upload->initialize($config);
        		if ($this->upload->do_upload('image1'))
            	{
            	      $data=array('u_name'=>$name,'u_phone'=>$phone,'u_gender'=>$gender,'u_dob'=>$dob,'u_address'=>$address,'u_image'=>$imagename);
            	      $this->load->model('UserModel');
						$query=$this->UserModel->updateprofile($data,$emails);
						if($query)
						{
							echo "new image";
				 			redirect('UserModule/view_profile');
						}
						else
						{
							echo"error";
						}
				}

            }
			else
			{
				$data=array('u_name'=>$name,'u_phone'=>$phone,'u_gender'=>$gender,'u_dob'=>$dob,'u_address'=>$address);
				$this->load->model('UserModel');
				$query=$this->UserModel->updateprofile($data,$emails);
				
				if($query == 1)
				{
					redirect('UserModule/view_profile');
				}
				else
				{
					echo"error";
				}
					// $this->uri->segment(3);
			}
			
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function check_old_pwd()
	{
		if($this->session->has_userdata('u_email'))
		{
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$opwd = $this->input->post('opwd');
			$result=$this->UserModel->checkoldpwd($email,$opwd);
			echo json_encode($result);
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function pwd_change()
	{
		$this->load->model('UserModel');
		$npwd = $this->input->post('npwd');
		$email = $this->session->userdata('u_email');
		$data = array('u_pwd'=>$npwd); 
		$result=$this->UserModel->changepwd($email,$data);
		echo json_encode($result);
	}

	public function change_pwd()
	{
		if($this->session->has_userdata('u_email'))
		{
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->view('u_change_pwd',$query);
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function chat_box($uid)
	{
		if($this->session->has_userdata('u_email'))
		{
			$u=$uid;
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->model('UserModel');
				$datas=$this->UserModel->selectchat($u);
				$query['chats'] = $datas['chats'];
				$query['count'] = $datas['count'];
				$this->load->view('u_chat_box',$query);
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function sendchat($aid,$uid)
	{
		if($this->session->has_userdata('u_email'))
		{
			$a=$aid;
			$u=$uid;
			$msg=$this->input->post('msg');
			$data=array('chat_from'=>$u,'chat_to'=>$a,'chat_msg'=>$msg);			
			$this->load->model('UserModel');
			$querys=$this->UserModel->sendchat($data);
			if($querys)
			{
				redirect('UserModule/chat_box/'.$u);
			}
			else
			{
				redirect('UserModule/chat_box/'.$u);
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function view_courses()
	{
		if($this->session->has_userdata('u_email'))
		{
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->model('UserModel');
				$query['course']=$this->UserModel->selectcourses();
				if($query['course'])
				{
					$this->load->view('u_view_courses',$query);
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

	public function view_colleges()
	{
		if($this->session->has_userdata('u_email'))
		{
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->model('UserModel');
				$query['college']=$this->UserModel->selectcolleges();
				if($query['college'])
				{
					$this->load->view('u_view_colleges',$query);
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

	public function college_tocourses($ceid)
	{
		if($this->session->has_userdata('u_email'))
		{
			$ce_id = $ceid;
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->model('UserModel');
				$query['cid']=$this->UserModel->collegetocourseid($ce_id);
				$this->load->model('UserModel');
				$query['course']=$this->UserModel->selectcourses();
				if($query['course'])
				{
					$this->load->view('u_college_tocourse',$query);
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
		if($this->session->has_userdata('u_email'))
		{
			$co_id = $coid;
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->model('UserModel');
				$query['ceid']=$this->UserModel->coursetocollegeid($co_id);
				$this->load->model('UserModel');
				$query['college']=$this->UserModel->selectcolleges();
				if($query['college'])
				{
					$this->load->view('u_course_tocollege',$query);
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function view_notifications()
	{
		if($this->session->has_userdata('u_email'))
		{
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->model('UserModel');
				$query['notify']=$this->UserModel->selectnotifications();
				if($query['notify'])
				{
					$this->load->view('u_view_notifications',$query);
				}
				else
				{
					$this->load->view('u_view_notifications',$query);
				}
			}
		}
		else
		{
			redirect('UserModule/error_404');
		}
	}

	public function view_videos()
	{
		if($this->session->has_userdata('u_email'))
		{
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->model('UserModel');
				$query['videos']=$this->UserModel->selectvideos();
				if($query['videos'])
				{
					$this->load->view('u_view_videos',$query);
				}
				else
				{
					$this->load->view('u_view_videos',$query);
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

	public function view_ebooks()
	{
		if($this->session->has_userdata('u_email'))
		{
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->model('UserModel');
				$query['ebook']=$this->UserModel->selectebooks();
				if($query['ebook'])
				{
					$this->load->view('u_view_ebooks',$query);
				}
				else
				{
					$this->load->view('u_view_ebooks',$query);
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

	public function start_quiz()
	{
		if($this->session->has_userdata('u_email'))
		{
			$uid = $_SESSION['userid'];
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{	
				$this->load->model('UserModel');
				$query['qids']=$this->UserModel->selectqcid();
				$this->load->model('UserModel');
				$query['qcids']=$this->UserModel->selectqcids($uid);
				$this->load->model('UserModel');
				$query['qcidz']=$this->UserModel->selectqcidz($uid);
				$this->load->model('UserModel');
				$query['qcid']=$this->UserModel->selectqcid();
				{
					$this->load->model('UserModel');
				}
				$query['qcname']=$this->UserModel->selectqname();
				$this->load->model('UserModel');
				if($query['qcname'])
				{
						$this->load->view('u_view_quiz_categories',$query);
				}
				else
				{
						$this->load->view('u_view_quiz_categories',$query);
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

	public function category_quiz($qcid)
	{
		if($this->session->has_userdata('u_email'))
		{
			$qc_id=$qcid;
			$query['qcid']=$qcid;
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->model('UserModel');
				$query['qid']=$this->UserModel->selectquestionid($qc_id);
				$this->load->model('UserModel');
				$query['question']=$this->UserModel->selectquestions();
				$this->load->model('UserModel');
				if($query['question'])
				{
						$this->load->view('u_attend_quiz',$query);
				}
				else
				{
						$this->load->view('u_attend_quiz',$query);
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

	public function edit_quiz($qcid)
	{
		if($this->session->has_userdata('u_email'))
		{
			$qc_id=$qcid;
			$query['qcid']=$qcid;
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->model('UserModel');
				$query['qid']=$this->UserModel->selectquestionid($qc_id);
				$this->load->model('UserModel');
				$query['question']=$this->UserModel->selectquestions();
				$this->load->model('UserModel');
				if($query['question'])
				{
						$this->load->view('u_update_quiz',$query);
				}
				else
				{
						$this->load->view('u_update_quiz',$query);
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

	public function submit_quiz($uid,$qcid)
	{
		if($this->session->has_userdata('u_email'))
		{
			$score = 0;
			$i=0;
			$j=0;
			$count =$this->input->post('count');
			while($i<$count)
			{
				$_SESSION['qans'][$i]=$this->input->post($i);
				echo $_SESSION['qans'][$i];
				$i++;
			}
			$u_id=$uid;
			$qc_id =$qcid;
			while($j<$count)
			{
				echo $_SESSION['answers'][$j];
				if(($_SESSION['qans'][$j]) == ($_SESSION['answers'][$j]))
				{
					$score++;
				}
				else
				{
					$score = $score + 0;
				}
				$j++;

			}
			// if($score>0)
			// {
			// 	echo $score;
				$data = array('u_id'=>$u_id,'qc_id'=>$qc_id,'qr_questions'=>$count,'qr_answers'=>$score,'qr_status'=>'yes');
			// }
			// else
			// {
				// echo $score;
				//redirect('UserModule/view_results');
			// }
			$this->load->model('UserModel');
			$query['result']=$this->UserModel->insertresult($data);
			if($query['result'])
			{
				redirect('UserModule/view_results');
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

	public function update_quiz($uid,$qcid)
	{
		if($this->session->has_userdata('u_email'))
		{
			$score = 0;
			$i=0;
			$j=0;
			$count =$this->input->post('count');
			while($i<$count)
			{
				$_SESSION['qans'][$i]=$this->input->post($i);
				echo $_SESSION['qans'][$i];
				$i++;
			}
			$u_id=$uid;
			$qc_id =$qcid;
			while($j<$count)
			{
				echo $_SESSION['answers'][$j];
				if(($_SESSION['qans'][$j]) == ($_SESSION['answers'][$j]))
				{
					$score++;
				}
				else
				{
					$score = $score + 0;
				}
				$j++;

			}
			if($score>0)
			{
				echo $score;
				$data = array('qr_questions'=>$count,'qr_answers'=>$score,'qr_status'=>'yes');
			}
			else
			{
				echo "<script>alert('Oops...!please try again !')</script>";
				redirect('UserModule/view_results');
			}
			$this->load->model('UserModel');
			$query['result']=$this->UserModel->updateresult($u_id,$qc_id,$data);
			if($query['result'])
			{
				redirect('UserModule/view_results');
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

	public function view_results()
	{

		if($this->session->has_userdata('u_email'))
		{
			$uid = $_SESSION['userid'];
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->model('UserModel');
				$query['result']=$this->UserModel->selectquizresult($uid);
				if($query['result'])
				{
					$this->load->model('UserModel');
					$query['quizcat']=$this->UserModel->selectqname();
					if($query['quizcat'])
					{
						$this->load->view('u_view_results',$query);
					}
					else
					{
						$this->load->view('u_view_results',$query);	
					}
				}
				else
				{
					redirect('UserModule/start_quiz');
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
	public function view_graph()
	{
		if($this->session->has_userdata('u_email'))
		{
			$uid = $_SESSION['userid'];
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->model('UserModel');
				$query['result']=$this->UserModel->selectquizresult($uid);
				if($query['result'])
				{
					$this->load->model('UserModel');
					$query['quizcat']=$this->UserModel->selectqname();
					if($query['quizcat'])
					{
						$this->load->view('u_graph',$query);
					}
					else
					{
						$this->load->view('u_graph',$query);	
					}
				}
				else
				{
					redirect('UserModule/start_quiz');
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

	public function view_course_qcat($qcid)
	{
		if($this->session->has_userdata('u_email'))
		{
			$query['qcids']=$qcid;
			$qcids=$qcid;
			$email=$this->session->userdata('u_email');
			$this->load->model('UserModel');
			$query['users']=$this->UserModel->selectuser($email);
			if($query['users'])
			{
				$this->load->model('UserModel');
				$query['cid']=$this->UserModel->selectquizcourse($qcids);
				if($query['cid'])
				{
					$this->load->model('AdminModel');
					$query['course']=$this->AdminModel->selectcourses();
					if($query['course'])
					{
						$this->load->view('u_view_quiz_courses',$query);
					}
					else
					{
						$this->load->view('u_view_quiz_courses',$query);
					}
				}
				else
				{
					redirect('UserModule/start_quiz');
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