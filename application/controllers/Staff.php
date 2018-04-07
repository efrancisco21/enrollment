<?php

class Staff extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('staff_model');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()
	{
		if( ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) ||
		    ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Accountant' ) ||
		    ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Teacher' ) ) {
				redirect(base_url().'staff/dashboard');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
				redirect(base_url().'student');
		} else {
			$this->load->view('staff/layouts/header_staff');
			$this->load->view('staff/login');
			$this->load->view('staff/layouts/footer_staff');
		}

	}

	public function authenticate() {
		$data = array (
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);
		$query = $this->staff_model->authuser($data);
		if ( ($query && $query['role'] == 'Admin' || $query && $query['role'] == 'Accountant' || $query && $query['role'] == 'Teacher')
			 && ($query && $query['status'] == 1) ) {
				$sessdata = array (
					'admin_id' => $query['admin_id'],
					'firstname' => $query['firstname'],
					'lastname' => $query['lastname'],
					'middlename' => $query['middlename'],
					'username' => $query['username'],
					'role' => $query['role'],
					'dashboard' => 'Dashboard',
					'logged_in' => TRUE
				);
			$this->session->set_userdata($sessdata);
			redirect(base_url().'staff/dashboard');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function logout() {
		if ( ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) ||
		     ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Accountant' ) ||
		     ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Teacher' ) ) {
			$this->session->sess_destroy();
			redirect(base_url().'staff');
		} else {
			redirect(base_url().'student');
		}
	}

	public function dashboard() {
		if( ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) ||
		    ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Accountant' ) ||
		    ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Teacher' ) ) {
			$this->load->view('staff/layouts/header_staff');
			$this->load->view('staff/dashboard');
			$this->load->view('staff/layouts/footer_staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
				redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function admissions() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$this->load->view('staff/layouts/header_staff');
			$this->load->view('staff/admissions');
			$this->load->view('staff/layouts/footer_staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
				redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function enteradmission() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$query = $this->staff_model->generatenumber();
			$data = array(
				'studentnumber' => $query['studentnumber'],
				'year_id' => $query['year_id'],
				'latestnumber' => $query['latestnumber'],

				'level' => $this->input->post('type_of_application_radio'),
				'year' => $this->input->post('type_of_application_text'),
				'exam_date' => $this->input->post('exam_date'),
				'type_of_application' => $this->input->post('type_of_application_text'),
				'lastname' => $this->input->post('lastname'),
				'firstname' => $this->input->post('firstname'),
				'middlename' => $this->input->post('middlename'),
				'address' => $this->input->post('address'),
				'dateofbirth' => $this->input->post('dateofbirth'),
				'placeofbirth' => $this->input->post('placeofbirth'),
				'email' => $this->input->post('email'),
				'student_phone' => $this->input->post('student_phone'),
				'postal' => $this->input->post('postal'),
				'citizenship' => $this->input->post('citizenship'),
				'religion' => $this->input->post('religion'),
				'civilstatus' => $this->input->post('civilstatus'),
				'age' => $this->input->post('age'),
				'gender' => $this->input->post('gender'),
				'lastschool' => $this->input->post('lastschool'),
				'schooladdress' => $this->input->post('schooladdress'),
				'yeargraduation' => $this->input->post('yeargraduation'),
				'gpa' => $this->input->post('gpa'),
				'honors' => $this->input->post('honors'),
				'school_last_attended' => $this->input->post('school_last_attended'),
				'course' => $this->input->post('course'),
				'last_school_year_attended' => $this->input->post('last_school_year_attended'),
				'father_name' => $this->input->post('father_name'),
				'mother_name'  => $this->input->post('mother_name'),
				'parent_phone' => $this->input->post('parent_phone'),
				'parent_religion' => $this->input->post('parent_religion'),
				'educational_attainment_father' => $this->input->post('educational_attainment_father'),
				'educational_attainment_mother' => $this->input->post('educational_attainment_mother'),
				'occupation_father' => $this->input->post('occupation_father'),
				'occupation_mother' => $this->input->post('occupation_mother'),
				'email_father' => $this->input->post('email_father'),
				'email_mother' => $this->input->post('email_mother'),
				'name_guardian' => $this->input->post('name_guardian'),
				'relationship' => $this->input->post('relationship'),
				'mailing_address' => $this->input->post('mailing_address'),
				'guardian_phone' => $this->input->post('guardian_phone'),
				'siblings_yes_no' => $this->input->post('siblings_yes_no'),
				'sibling_name' => $this->input->post('sibling_name'),
				'sibling_level_year' => $this->input->post('sibling_level_year'),
				'how_did_know_angelicum' => $this->input->post('how_did_know_angelicum'),
				'password' => md5($query['studentnumber']),
				'role' => 'student',
				'is_paid' => '0',
				'status' => '0'

			);

			$query = $this->staff_model->enteradmission($data);

			if($query) {
				$this->session->set_flashdata('success_add', 'Successfully added.');
				redirect(base_url().'staff/admissions');
			} else {
				//flash data here
				$this->session->set_flashdata('fail_add', 'Add failed.');
				redirect(base_url().'staff/admissions');
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
				redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	//sections tab
	public function sections() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data['sections'] = $this->staff_model->get_sections();

			$this->load->view('staff/layouts/header_staff');
			$this->load->view('staff/sections', $data);
			$this->load->view('staff/layouts/footer_staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function add_section() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = array(
				'section_name' => $this->input->post('section_name'),
				'level' => $this->input->post('inputLevel'),
				'year' => $this->input->post('inputYear'),
				'schoolyear' => $this->input->post('schoolyear')
			);

			$query = $this->staff_model->add_section($data);

			if($query) {
				$this->session->set_flashdata('success_add', 'Successfully added.');
				redirect(base_url().'staff/sections');
			} else {
				//flash data here
				$this->session->set_flashdata('fail_add', 'Add failed.');
				redirect(base_url().'staff/sections');
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function section_info() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$section_id = $this->input->post('section_id');
			$query = $this->staff_model->section_info($section_id);

			if(isset($query) ) {
				echo json_encode($query);
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function edit_section() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = array(
				'section_id' => $this->input->post('section_id'),
				'section_name' => $this->input->post('edit_section_name'),
				'level' => $this->input->post('edit_inputLevel'),
				'year' => $this->input->post('edit_inputYear'),
				'schoolyear' => $this->input->post('edit_schoolyear')
			);

			$query = $this->staff_model->edit_section($data);

			if($query) {
				$this->session->set_flashdata('success_edit', 'Successfully updated.');
				redirect(base_url().'staff/sections');
			} else {
				//flash data here
				$this->session->set_flashdata('fail_edit', 'Update failed.');
				redirect(base_url().'staff/sections');
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function disable_section() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = $this->input->post('section_id');
			$query = $this->staff_model->disable_section($data);

			if($query) {
				echo 'success';
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function enable_section() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = $this->input->post('section_id');
			$query = $this->staff_model->enable_section($data);

			if($query) {
				echo 'success';
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	//end of sections tab

	//students tab
	public function students() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data['students'] = $this->staff_model->get_students();

			$this->load->view('staff/layouts/header_staff');
			$this->load->view('staff/students', $data);
			$this->load->view('staff/layouts/footer_staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	//populate edit form
	public function student_info() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$user_id = $this->input->post('user_id');
			$query = $this->staff_model->student_info($user_id);

			if(isset($query) ) {
				echo json_encode($query);
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	//view student profile
	public function student_profile() {
		$user_id = $this->input->post('user_id');
		$query = $this->staff_model->student_profile($user_id);

		if( isset($query) ) {
			echo json_encode($query);
		} else {
			echo 'fail';
		}
	}


	//edit student info
	public function edit_student() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'level' => $this->input->post('edit_inputLevel'),
				'year' => $this->input->post('edit_inputYear'),
				'lastname' => $this->input->post('edit_inputLastName'),
				'firstname' => $this->input->post('edit_inputFirstName'),
				'middlename' => $this->input->post('edit_inputMiddleName'),
				'student_phone' => $this->input->post('edit_inputPhone'),
				'postal' => $this->input->post('edit_inputPostal'),
				'address' => $this->input->post('edit_inputAddress'),
				'email' => $this->input->post('edit_inputEmail'),
				'password' => $this->input->post('edit_inputPassword')
			);

			$query = $this->staff_model->edit_student($data);

			if($query) {
				$this->session->set_flashdata('success_edit', 'Successfully updated.');
				redirect(base_url().'staff/students');
			} else {
				//flash data here
				$this->session->set_flashdata('fail_edit', 'Update failed.');
				redirect(base_url().'staff/students');
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function disable_student() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = $this->input->post('user_id');
			$query = $this->staff_model->disable_student($data);

			if($query) {
				echo 'success';
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function enable_student() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = $this->input->post('user_id');
			$query = $this->staff_model->enable_student($data);

			if($query) {
				echo 'success';
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	//located in the students tab functionality
	public function reset_payment_all() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {

			$query = $this->staff_model->reset_payment_all();
			if($query) {
				echo 'success';
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}


	//sections tab
	public function subjects() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data['subjects'] = $this->staff_model->get_subjects();
			$this->load->view('staff/layouts/header_staff');
			$this->load->view('staff/subjects', $data);
			$this->load->view('staff/layouts/footer_staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
				redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function add_subject() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = array(
				'subject_name' => $this->input->post('subject_name'),
				'level' => $this->input->post('inputLevel'),
				'year' => $this->input->post('inputYear')
			);

			$query = $this->staff_model->add_subject($data);

			if($query) {
				$this->session->set_flashdata('success_add', 'Successfully added.');
				redirect(base_url().'staff/subjects');
			} else {
				//flash data here
				$this->session->set_flashdata('fail_add', 'Add failed.');
				redirect(base_url().'staff/subjects');
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	//populate edit forms
	public function subject_info() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$subject_id = $this->input->post('subject_id');
			$query = $this->staff_model->subject_info($subject_id);

			if(isset($query) ) {
				echo json_encode($query );
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function edit_subject() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = array(
				'subject_id' => $this->input->post('subject_id'),
				'subject_name' => $this->input->post('edit_subject_name'),
				'level' => $this->input->post('edit_inputLevel'),
				'year' => $this->input->post('edit_inputYear')
			);

			$query = $this->staff_model->edit_subject($data);

			if($query) {
				$this->session->set_flashdata('success_edit', 'Successfully updated.');
				redirect(base_url().'staff/subjects');
			} else {
				//flash data here
				$this->session->set_flashdata('fail_edit', 'Update failed.');
				redirect(base_url().'staff/subjects');
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function enable_subject() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = $this->input->post('subject_id');
			$query = $this->staff_model->enable_subject($data);

			if($query) {
				echo 'success';
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function disable_subject() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = $this->input->post('subject_id');
			$query = $this->staff_model->disable_subject($data);

			if($query) {
				echo 'success';
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	//end of sections tab



	//staff tab
	public function staff_list() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data['staff'] = $this->staff_model->get_staff();
			$this->load->view('staff/layouts/header_staff');
			$this->load->view('staff/list', $data);
			$this->load->view('staff/layouts/footer_staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function add_staff() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5( $this->input->post('password') ),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'middlename' => $this->input->post('middlename'),
				'role' => $this->input->post('role')
			);

			$query = $this->staff_model->add_staff($data);

			if($query) {
				$this->session->set_flashdata('success_add', 'Successfully added.');
				redirect(base_url().'staff/staff_list');
			} else {
				//flash data here
				$this->session->set_flashdata('fail_add', 'Add failed.');
				redirect(base_url().'staff/staff_list');
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function staff_info() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$admin_id = $this->input->post('admin_id');
			$query = $this->staff_model->staff_info($admin_id);

			if(isset($query) ) {
				echo json_encode($query );
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function edit_staff() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
		$data = array(
				'admin_id' => $this->input->post('admin_id'),
				'username' => $this->input->post('edit_username'),
				'password' => md5( $this->input->post('edit_password') ),
				'firstname' => $this->input->post('edit_firstname'),
				'lastname' => $this->input->post('edit_lastname'),
				'middlename' => $this->input->post('edit_middlename'),
				'role' => $this->input->post('edit_role')
			);

			$query = $this->staff_model->edit_staff($data);

			if($query) {
				$this->session->set_flashdata('success_edit', 'Successfully updated.');
				redirect(base_url().'staff/staff_list');
			} else {
				//flash data here
				$this->session->set_flashdata('fail_edit', 'Update failed.');
				redirect(base_url().'staff/staff_list');
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}



	public function enable_staff() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = $this->input->post('admin_id');
			$query = $this->staff_model->enable_staff($data);

			if($query) {
				echo 'success';
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function disable_staff() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = $this->input->post('admin_id');
			$query = $this->staff_model->disable_staff($data);

			if($query) {
				echo 'success';
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}
	//end of staff tab

	//classes tab
	public function classes() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data['sections_activated'] = $this->staff_model->get_sections_activated();
			$this->load->view('staff/layouts/header_staff');
			$this->load->view('staff/classes', $data);
			$this->load->view('staff/layouts/footer_staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function classmanage($section_id){
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {

			$data['class_info'] = $this->staff_model->classmanage_classinfo($section_id);//determinant if query is null is in the model
			$data['section_info'] = $this->staff_model->classmanage_sectioninfo($section_id);
			$data['schedule_info'] = $this->staff_model->classmanage_scheduleinfo($section_id);

			// NOTE: in the future this will also take in data from the classes table
			$this->load->view('staff/layouts/header_staff');
			$this->load->view('staff/class_manage', $data);
			$this->load->view('staff/layouts/footer_staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function search_student_number() {
		if( ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) ||
		    ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Accountant' ) ) {
			$student_number = $this->input->post('student_number');
			$query = $this->staff_model->search_student_number($student_number);

			if(isset($query) ) {
				echo json_encode($query);
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function classmanagement_addstudent($section_id) {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$student_number = $this->input->post('student_number');
			$query = $this->staff_model->classmanagement_addstudent($student_number, $section_id);

			if($query) {
				$this->session->set_flashdata('success_add', 'Successfully added.');
				redirect(base_url().'staff/classmanage/'. $section_id);
			} else {
				//flash data here
				$this->session->set_flashdata('fail_add', 'Add failed.');
				redirect(base_url().'staff/classmanage/'. $section_id);
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function classmanage_removestudent() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$user_id = $this->input->post('user_id');
			$section_id = $this->input->post('section_id');

			$query = $this->staff_model->classmanage_removestudent($user_id, $section_id);

			if($query) {
				echo 'success';
			} else {
				echo 'fail';
			}

		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}

	}

	public function classmanage_removeschedule() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$row_id = $this->input->post('row_id');
			$section_id = $this->input->post('section_id');

			$query = $this->staff_model->classmanage_removeschedule($row_id, $section_id);

			if($query) {
				echo 'success';
			} else {
				echo 'fail';
			}

		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function subject_lookup() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$query = $this->staff_model->subject_lookup();

			if(isset($query) ) {
				echo json_encode($query);
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function teacher_lookup() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$query = $this->staff_model->teacher_lookup();

			if(isset($query) ) {
				echo json_encode($query);
			} else {
				echo 'fail';
			}
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function classmanage_addschedule($section_id) {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) {
			$data = array(
				'section_id' => $section_id,
				'subject_id' => $this->input->post('subject'),
				'teacher_id' => $this->input->post('teacher'),
				'days' => $this->input->post('days'),
				'time' => $this->input->post('time'),
				'room' => $this->input->post('room'),
				'status' => 1

			);

			$query = $this->staff_model->classmanage_addschedule($data);

			if($query) {
				$this->session->set_flashdata('success_add', 'Successfully added.');
				redirect(base_url().'staff/classmanage/'. $section_id);
			} else {
				//flash data here
				$this->session->set_flashdata('fail_add', 'Add failed.');
				redirect(base_url().'staff/classmanage/'. $section_id);
			}

		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}
	//end of classes tab


	//payments tab
	public function payments() {
		if( ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) ||
		    ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Accountant' ) ) {

			$this->load->view('staff/layouts/header_staff');
			$this->load->view('staff/payments');
			$this->load->view('staff/layouts/footer_staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function add_payment() {
		if( ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) ||
		    ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Accountant' ) ) {

			$data = array(
				'studentnumber' => $this->input->post('studentnum'),
				'schoolyear' => $this->input->post('schoolyear'),
				'payment_type' => $this->input->post('payment_type'),
				'transaction' => $this->input->post('transaction'),
				'cash_amount' => $this->input->post('cash_amount'),
				'card_name' => $this->input->post('credit_name'),
				'card_number' => $this->input->post('credit_number'),
				'card_amount' => $this->input->post('credit_pay_amount'),
				'card_expiration' => $this->input->post('credit_expiry'),
				'card_securitycode' => $this->input->post('credit_code'),
				'check_number' => $this->input->post('check_number'),
				'check_amount' => $this->input->post('check_amount'),
				'check_phone' => $this->input->post('check_phone'),
				'timestamp' => date('m-d-Y H:i:s a')
			);

			$query = $this->staff_model->add_payment($data);

			if($query) {
				$this->session->set_flashdata('success_add', 'Successfully added.');
				redirect(base_url().'staff/payments');
			} else {
				//flash data here
				$this->session->set_flashdata('fail_add', 'Add failed.');
				redirect(base_url().'staff/payments');
			}

		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	//end of payments tab

	//payment history tab
	public function payment_history() {
		if( ( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Admin' ) ||
			( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Accountant' ) ) {

		$data['payments'] = $this->staff_model->payment_history();

		$this->load->view('staff/layouts/header_staff');
		$this->load->view('staff/payment_history', $data);
		$this->load->view('staff/layouts/footer_staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}
	//end of payment history


	//teacher features
	//view profile
	public function teacher_profile() {
		if( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Teacher' ) {
			$data['teacher_profile'] = $this->staff_model->teacher_profile( $this->session->userdata('admin_id') );
			$this->load->view('staff/layouts/header_staff');
			$this->load->view('staff/teacher_profile', $data);
			$this->load->view('staff/layouts/footer_staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	//end of profile tab

		//class list tab
	public function class_list() {
		if( $this->session->has_userdata('role') && $this->session->userdata('role') == 'Teacher' ) {
			$data['class_list'] = $this->staff_model->class_list( $this->session->userdata('admin_id') );
			$this->load->view('staff/layouts/header_staff');
			$this->load->view('staff/class_list', $data);
			$this->load->view('staff/layouts/footer_staff');
		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function class_list_view($section_id, $subject_id, $admin_id){
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Teacher' ) {

			$data['class_list_view'] = $this->staff_model->class_list_view($section_id, $subject_id, $admin_id);
			$data['section_info'] = $this->staff_model->class_list_section_info($section_id, $subject_id, $admin_id);//determinant if query is null is in the model

			$this->load->view('staff/layouts/header_staff');
			$this->load->view('staff/classlist_students', $data);
			$this->load->view('staff/layouts/footer_staff');

		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

	public function save_grades() {
		if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Teacher' ) {

			$grade_array = array();

			$studentnumber = $this->input->post('studentnumber');//with grade

			foreach ($studentnumber as $data) {
				array_push($grade_array, array(
					'student_id' => $data['studentnumber'],
					'grade' => $data['grade'],
					'subject_id' => $this->input->post('subject_id'),
					'section_id' => $this->input->post('section_id'),
					'schoolyear' =>	$this->input->post('schoolyear')
				) );
			}

			$query = $this->staff_model->save_grades($grade_array);
			//echo json_encode($grade_array);
			if($query) {
				echo 'success';
			} else {
				echo 'false';
			}

			//echo json_encode($grade_array);

		} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
			redirect(base_url().'student');
		} else {
			redirect(base_url().'staff');
		}
	}

		//end of class list tab

		//print grades and schedule
		public function print_schedule($section_id, $subject_id, $admin_id) {
			if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Teacher' ) {

				$data['class_list'] = $this->staff_model
				->class_list_print_schedule( $admin_id, $section_id, $subject_id );
				$data['class_list_view'] = $this->staff_model->class_list_view($section_id, $subject_id, $admin_id);
				$data['section_info'] = $this->staff_model->class_list_section_info($section_id, $subject_id, $admin_id);//determinant if query is null is in the model

				$this->load->view('staff/print_schedule', $data);

			} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
				redirect(base_url().'student');
			} else {
				redirect(base_url().'staff');
			}
		}

		public function print_grades($section_id, $subject_id, $admin_id) {
			if($this->session->has_userdata('role') && $this->session->userdata('role') == 'Teacher' ) {

				$data['class_list_view'] = $this->staff_model->class_list_view($section_id, $subject_id, $admin_id);
				$data['section_info'] = $this->staff_model->class_list_section_info($section_id, $subject_id, $admin_id);//determinant if query is null is in the model

				$this->load->view('staff/print_grades', $data);

			} else if ($this->session->has_userdata('role') && $this->session->userdata('role') == 'student') {
				redirect(base_url().'student');
			} else {
				redirect(base_url().'staff');
			}
		}
		//end of print grades and schedule

	//end of teacher features

}

?>
