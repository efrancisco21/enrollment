<?php


class Student extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('student_model');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index($page = 'login')
	{
		 if ( ! file_exists(APPPATH.'views/student/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

		$data['title'] = ucfirst($page); // Capitalize the first letter
	    if( ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) ||
		    ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Accountant' ) ||
		    ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Teacher' ) ) {
			redirect(base_url().'staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student/home');
		} else {
			$this->load->view('student/layouts/header_student', $data);
			$this->load->view('student/'.$page);
			$this->load->view('student/layouts/footer_student');
		}
	}

	public function home($page = 'home') {
		if ( ! file_exists(APPPATH.'views/student/'.$page.'.php'))
		{
                // Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
	    if( ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) ||
		    ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Accountant' ) ||
		    ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Teacher' ) ) {
			redirect(base_url().'staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			$this->load->view('student/layouts/header_student', $data);
			$this->load->view('student/'.$page);
			$this->load->view('student/layouts/footer_student');
		} else {
			redirect(base_url().'student');
		}
	}

	public function authenticate() {
		$data = array (
			'studentnumber' => $this->input->post('studentnumber'),
			'password' => md5($this->input->post('password'))
		);
		$query = $this->student_model->authuser($data);
		if ($query && $query['role'] == 'student') {
				$sessdata = array (
					'user_id' => $query['user_id'],
					'firstname' => $query['firstname'],
					'lastname' => $query['lastname'],
					'studentnumber' => $query['studentnumber'],
					'role' => $query['role'],
					'logged_in' => TRUE
				);
			$this->session->set_userdata($sessdata);
			$this->session->set_flashdata('login', "Successfully logged in.");
			redirect(base_url().'student/home');
		} else {
			$this->session->set_flashdata('no_user', "User doesn't exist.");
			redirect(base_url().'student');
		}
	}

	//for account info
	public function accountinfo($page = 'Account info'){
		$data['title'] = ucfirst($page);
		$data['studentinfo'] = $this->student_model->student_info($this->session->userdata('user_id'));
		$this->load->view('student/layouts/header_student',$data);
		$this->load->view('student/studenttabs/accountinfo',$data);
		$this->load->view('student/layouts/footer_student');
	}

	//for saf
	public function safinfo($page = 'SAF'){
		$data['title'] = ucfirst($page);
		$data['payment_history'] = $this->student_model->payment_history($this->session->userdata('studentnumber'));
		$this->load->view('student/layouts/header_student',$data);
		$this->load->view('student/studenttabs/saf',$data);
		$this->load->view('student/layouts/footer_student');
	}

	//for viewsched
	public function viewsched($page = 'View Schedule'){
		$curryear = date('Y');
		$getyear = $this->student_model->get_startyear_student($this->session->userdata('user_id'));
		$startyear = $getyear[0]->year_id;
		$data['years'] = array();
		if($curryear == $this->session->userdata('year_id')){
			$data['years'] = $curryear;
		}else{
			for($x = $startyear; $x<=$curryear;$x++){
				array_push($data['years'],$startyear);
				$startyear=$startyear + 1;
			}
		}
		$data['title'] = ucfirst($page);
		$sectionid = $this->student_model->get_section($this->session->userdata('user_id'));
		//$data['sched'] = $this->student_model->view_sched($this->session->userdata('user_id'),$sectionid[0]->section_id);
		$this->load->view('student/layouts/header_student',$data);
		$this->load->view('student/studenttabs/viewsched',$data);
		$this->load->view('student/layouts/footer_student');
	}

	//view sched search
	public function viewsched_spec(){
		$schoolyear = $this->input->post('schoolyear');
		$sectionid = $this->student_model->get_section($this->session->userdata('user_id'));
		$data['sched'] = $this->student_model->view_sched_year($this->session->userdata('user_id'),$sectionid[0]->section_id,$schoolyear);
		if($data['sched'] != NULL){
			$this->load->view('student/layouts/viewsched_layout',$data);
		}else{
			echo 'No data in the database';
		}

	}

	//view grade
	public function viewgrade($page = 'View Grade'){
		$data['title'] = ucfirst($page);
		$data['sectionshistory'] = $this->student_model->section_history($this->session->userdata('user_id'));
		//$sectionid = $this->student_model->get_section($this->session->userdata('user_id'));
		//$data['grade'] = $this->student_model->view_grade_section($this->session->userdata('studentnumber'),1);
		$this->load->view('student/layouts/header_student',$data);
		$this->load->view('student/studenttabs/viewgrades',$data);
		$this->load->view('student/layouts/footer_student');
	}

	//view grade with specific section
	public function viewgrade_section(){
		$section = $this->input->post('section');
		$data['grade'] = $this->student_model->view_grade_section($this->session->userdata('studentnumber'),$section);
		if($data['grade'] != NULL){
			$this->load->view('student/layouts/viewgrade_layout',$data);
		}else{
			echo 'no data';
		}
	}

	public function logout() {
		if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
				$this->session->sess_destroy();
				redirect(base_url().'student');
			} else {
				redirect(base_url().'staff');
			}
	}


}

?>
