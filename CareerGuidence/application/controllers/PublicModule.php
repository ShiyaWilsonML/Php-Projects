<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PublicModule extends CI_Controller {

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
	public function index()
	{
		$this->load->view('index');
	}
	public function about()
	{
		$this->load->view('about');
	}
	public function services()
	{
		$this->load->view('services');
	}
	public function contact()
	{
		$this->load->view('contact');
	}
	public function contactform()
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$phone=$this->input->post('phone');
		$subject=$this->input->post('subject');
		$msg=$this->input->post('msg');
		$data=array('c_name'=>$name,'c_email'=>$email,'c_phone'=>$phone,'c_subject'=>$subject,'c_msg'=>$msg);
		$this->load->model('PublicModel');
		$query=$this->PublicModel->insertcontact($data);
		echo json_encode($query);

	}
	public function login()
	{
		$this->load->view('login');
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function registerform()
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$pwd=$this->input->post('pwd');
		$cpwd=$this->input->post('cpwd');
		$dob=$this->input->post('dob');
		$phone=$this->input->post('phone');
		$gender=$this->input->post('gender');
		$address=$this->input->post('address');
		$status='active';
		$image=$_FILES['image']['name'];
		$time = Time();
          $images = explode('.',$image);
          $imagename =$time.'.'.end($images);
          $config['upload_path']          = './uploads/';
          $config['allowed_types']        = 'jpg|png|jpeg|JPG|PNG|JPEG';
       
        
        $config['file_name'] = $imagename;  
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( !($this->upload->do_upload('image')))
            {
                  echo json_encode(2);
            }
            
            else
            {
				$data=array('u_name'=>$name,'u_email'=>$email,'u_phone'=>$phone,'u_pwd'=>$pwd,'u_gender'=>$gender,'u_dob'=>$dob,'u_address'=>$address,'u_image'=>$imagename,'u_status'=>$status);
				$this->load->model('PublicModel');
				$query=$this->PublicModel->insertusers($data);
				echo json_encode($query);
			}
	}

	public function loginform()
	{
		$email=$this->input->post('email');
		$pwd=$this->input->post('pwd');
		$data=array('u_email'=>$email,'u_pwd'=>$pwd);
		$this->load->model('PublicModel');
		$data['status']=$this->PublicModel->selectstatus($email);
		if($data['status'] == 'active')
		{

			$this->load->model('PublicModel');
			$count=$this->PublicModel->loginuser($email,$pwd);
	    	if($count==true)
			{
				//$this->session->set_userdata('email',$e);
				$_SESSION['u_email']=$email;
				redirect('UserModule/user_index');
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
