<?php
class Staff_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function authuser($data) {
	 $query = $this->db->where($data)->get('staff');

	 return $query->row_array();
	}

	public function enteradmission($data) {
		$query = $this->db->insert('students', $data);

		return $query;

	}

	public function generatenumber() {
		$studentnumber;
		$year = date('Y');
		$latestnumber = $this->db->select('latestnumber')->where('year_id', $year)->order_by('latestnumber', 'DESC')->get('students')->row();

		if ( isset($latestnumber) ) {
			$length = 5 - strlen($latestnumber);
			$latestnumber = $latestnumber->latestnumber + 1;
			$studentnumber =  $year . str_pad($latestnumber,$length,"0",STR_PAD_LEFT);;
		} else {
			$latestnumber = '1';
			$studentnumber = $year . '00001';
		}

		$data = array(
			'studentnumber' => $studentnumber,
			'year_id' => $year,
			'latestnumber' => $latestnumber
		);

		return $data;

	}

	//sections tab
	public function get_sections() {
		$query = $this->db->order_by('status', 'DESC')->get('sections');

		return $query->result();
	}

	public function add_section($data) {
		// $section_validate = $this->db->select('section_name')->where([
		// 	'section_name' => $data['section_name'],
		// 	'status' => 1
		// ])->get('sections');

		// $section_validate = $section_validate->row();

		//if( isset($section_validate) && $section_validate->section_name == $data['section_name']) {
			//return false;
		//} else {
			$query = $this->db->insert('sections', $data);
			return $query;
		//}
	}

	public function section_info($section_id) {
		$query = $this->db->where('section_id', $section_id)->get('sections');

		return $query->row();
	}

	public function edit_section($data) {
		$query =  $this->db->where('section_id', $data['section_id'] )->update('sections', [
			'section_name' => $data['section_name'],
			'level' => $data['level'],
			'year' => $data['year'],
			'schoolyear' => $data['schoolyear']
		]);

		if($this->db->affected_rows() >= 0) {
			return true;
		} else {
			return false;
		}
	}

	public function disable_section($section_id) {
		$query = $this->db->where('section_id', $section_id)
				->update('sections', ['status' => 0]);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function enable_section($section_id) {
		$query = $this->db->where('section_id', $section_id)
				->update('sections', ['status' => 1]);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	//end of sections tab

	//student tabs
	public function get_students() {
		$query = $this->db->select('user_id, studentnumber, firstname, lastname, middlename, level, year, is_paid, status')
				 ->order_by('status', 'DESC')->get('students');

	    return $query->result();
	}

	public function student_info($user_id) {
		$query = $this->db->select('user_id, level, year, lastname, firstname, middlename, address, email, student_phone, postal')->where('user_id', $user_id)->get('students');

		return $query->row();
	}

	//view student profile
	public function student_profile($user_id) {
		$query = $this->db->where('user_id', $user_id)->get('students');

		return $query->row();
	}

	public function disable_student($user_id) {
		$query = $this->db->where('user_id', $user_id)
				->update('students', ['status' => 0]);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function enable_student($user_id) {
		$query = $this->db->where('user_id', $user_id)
				->update('students', ['status' => 1]);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function edit_student($data) {
		if ($data['password'] == '') {
			$query = $this->db->where('user_id', $data['user_id'])
				->update('students', [
					'level' => $data['level'],
					'year' => $data['year'],
					'lastname' => $data['lastname'],
					'firstname' => $data['firstname'],
					'middlename' => $data['middlename'],
					'student_phone' => $data['student_phone'],
					'postal' => $data['postal'],
					'address' => $data['address'],
					'email' => $data['email']
				]);
		} else {
			$query = $this->db->where('user_id', $data['user_id'])
				->update('students', [
					'level' => $data['level'],
					'year' => $data['year'],
					'lastname' => $data['lastname'],
					'firstname' => $data['firstname'],
					'middlename' => $data['middlename'],
					'student_phone' => $data['student_phone'],
					'postal' => $data['postal'],
					'address' => $data['address'],
					'email' => $data['email'],
					'password' => md5($data['password'])
				]);
		}

		if($this->db->affected_rows() >= 0) {
			return true;
		} else {
			return false;
		}
	}

	//located in the students tab functionality
	public function reset_payment_all() {
		$query = $this->db->update('students', ['is_paid' => "0"]);

		if($this->db->affected_rows() >= 0) {
			return true;
		} else {
			return false;
		}
	}


	//sections tab
	public function get_subjects() {
		$query = $this->db->order_by('status','DESC')->get('subjects');

		return $query->result();
	}

	public function add_subject($data) {
		$query = $this->db->insert('subjects', $data);
		return $query;
	}

	public function subject_info($subject_id) {
		$query = $this->db->where('subject_id', $subject_id)->get('subjects');

		return $query->row();
	}

	public function edit_subject($data){
		$query = $this->db->where('subject_id', $data['subject_id'])
				->update('subjects', [
					'subject_name' => $data['subject_name'],
					'level' => $data['level'],
					'year' => $data['year']
				]);

		if($this->db->affected_rows() >= 0) {
			return true;
		} else {
			return false;
		}
	}

	public function enable_subject($subject_id) {
		$query = $this->db->where('subject_id', $subject_id)
				->update('subjects', ['status' => 1]);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function disable_subject($subject_id) {
		$query = $this->db->where('subject_id', $subject_id)
				->update('subjects', ['status' => 0]);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	//end of sections tab


	//staff tab
	public function get_staff() {
	   $query = $this->db->query("SELECT * FROM staff ORDER BY FIELD(role, 'Admin', 'Teacher', 'Accountant'), status DESC");
	   //$query = $this->db->order_by('status','DESC')->get('staff');

	    return $query->result();
	}

	public function add_staff($data) {
		$query = $this->db->insert('staff', $data);
		return $query;
	}

	public function staff_info($admin_id) {
		$query = $this->db->where('admin_id', $admin_id)->get('staff');

		return $query->row();
	}


	public function edit_staff($data) {
		if ($data['password'] == '') {
			$query = $this->db->where('admin_id', $data['admin_id'])
				->update('staff', [
					'username' => $data['username'],
					'firstname' => $data['firstname'],
					'lastname' => $data['lastname'],
					'middlename' => $data['middlename'],
					'role' => $data['role']
				]);
		} else {
			$query = $this->db->where('admin_id', $data['admin_id'])
				->update('staff', [
					'username' => $data['username'],
					'password' =>  $data['password'],
					'firstname' => $data['firstname'],
					'lastname' => $data['lastname'],
					'middlename' => $data['middlename'],
					'role' => $data['role']
				]);
		}

		if($this->db->affected_rows() >= 0) {
			return true;
		} else {
			return false;
		}
	}

	public function enable_staff($admin_id) {
		$query = $this->db->where('admin_id', $admin_id)
				->update('staff', ['status' => 1]);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function disable_staff($admin_id) {
		$query = $this->db->where('admin_id', $admin_id)
				->update('staff', ['status' => 0]);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	//end of staff tab


	//classes tab
	public function get_sections_activated() {
	   $query = $this->db->where('status', 1)->order_by('status','DESC')->get('sections');

	    return $query->result();
	}

	public function classmanage_classinfo($section_id) {
		$query = $this->db->select('students.user_id, students.studentnumber,
			students.lastname, students.firstname, students.middlename, students.level, students.year')->from('sections')
		->join('student_section', 'student_section.section_id = sections.section_id', 'inner')
		->join('students', 'students.user_id = student_section.student_id', 'inner')
		->where('sections.section_id', $section_id)
		->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function classmanage_sectioninfo($section_id) {
		//section_name
		$query = $this->db->select('section_name, section_id')->where('section_id', $section_id)->get('sections');

		return $query->row();

	}

	public function classmanage_scheduleinfo($section_id) {
		$query = $this->db
		->select('subjects.subject_name, classes.row_id, classes.days, classes.time, classes.room, staff.lastname, staff.firstname, staff.middlename')->from('classes')
		->join('subjects', 'subjects.subject_id = classes.subject_id', 'inner')
		->join('staff', 'staff.admin_id = classes.teacher_id', 'inner')
		->where('classes.section_id', $section_id)
		->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function search_student_number($student_number) {
		$query  = $this->db->select('studentnumber, firstname, lastname, middlename, level, year, is_paid')
		->where('studentnumber', $student_number)->where('status', 1)->get('students');

		return $query->row();
	}

	public function classmanagement_addstudent($student_number, $section_id) {
		$student_info = $this->db->select('user_id, is_paid')->where('studentnumber', $student_number)->get('students');
		$row = $student_info->row();

		//$query = $this->db->where('student_id', $row->user_id)->get('student_section');

		//if( $query->num_rows() > 0 ) {
		//	return false;
		//} else {
		if( $row->is_paid == "full" || $row->is_paid == "down" ) {
			$this->db->insert('student_section', [
				'student_id' => $row->user_id,
				'section_id' => $section_id
			]);

			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
		//}

	}

	public function classmanage_removestudent($user_id, $section_id) {
		$this->db->delete('student_section', [
			'student_id' => $user_id,
			'section_id' => $section_id
		]);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function classmanage_removeschedule($row_id, $section_id) {
		$this->db->delete('classes', [
			'row_id' => $row_id,
			'section_id' => $section_id
		]);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function subject_lookup() {
		$query  = $this->db->select('subject_id, subject_name')
		->where('status', 1)->get('subjects');

		return $query->result();
	}

	public function teacher_lookup() {
		$query  = $this->db->select('admin_id, firstname, lastname, middlename')
		->where([
			'status' => 1,
			'role' => 'Teacher'
		])->get('staff');

		return $query->result();
	}

	public function classmanage_addschedule($data) {
		$this->db->insert('classes', $data);

			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
	}
	//end of classes tab

	//payments tab
		public function add_payment($data) {
			$this->db->where('studentnumber', $data['studentnumber']);
			$this->db->update('students', ['is_paid' => $data['payment_type']]);

			$this->db->insert('payments', $data);

			if($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
	//end of payments tab

	//payments history tab

		public function payment_history() {
			$query = $this->db->get('payments');

			return $query->result();
		}
	//end of payments history tab


	//teacher features
		//view profile
		public function teacher_profile($admin_id) {
			$query = $this->db->select('lastname, firstname, middlename, username, role, status')
			->from('staff')->where('admin_id', $admin_id)->get();

			return $query->row();
		}
		//view profile tab

		//class list tab
		public function class_list($admin_id) {
			$query = $this->db->select('sections.section_name, sections.section_id, staff.admin_id,
				 sections.level, sections.year, sections.schoolyear, subjects.subject_id,
				 subjects.subject_name, classes.days, classes.time, classes.room')
			->from('classes')
			->join('sections', 'sections.section_id = classes.section_id', 'inner')
			->join('subjects', 'subjects.subject_id = classes.subject_id', 'inner')
			->join('staff', 'staff.admin_id = classes.teacher_id', 'inner')
			->where('classes.teacher_id', $admin_id)->get();

			return $query->result();
		}

		//TODO: join grades table
	public function class_list_view($section_id, $subject_id, $admin_id) {
		$query = $this->db->select('students.user_id, students.studentnumber,
			students.lastname, students.firstname, students.middlename, students.level, students.year, grades.grade')->from('sections')
		->join('student_section', 'student_section.section_id = sections.section_id', 'inner')
		->join('students', 'students.user_id = student_section.student_id', 'inner')
		->join('classes', 'classes.section_id = student_section.section_id', 'inner')
		->join('grades', 'grades.student_id = students.studentnumber AND grades.subject_id = classes.subject_id AND grades.section_id  =
		 student_section.section_id AND grades.schoolyear = sections.schoolyear', 'left')
		->where('classes.section_id', $section_id)
		->where('classes.subject_id', $subject_id)
		->where('classes.teacher_id', $admin_id)
		->group_by('students.studentnumber')
		->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}


	public function class_list_section_info($section_id, $subject_id, $admin_id) {
		//section_name
		$query = $this->db->select('sections.section_name, sections.section_id, subjects.subject_id, classes.teacher_id,
		sections.schoolyear, subjects.subject_name')
		->join('classes', 'classes.section_id = sections.section_id', 'inner')
		->join('subjects', 'subjects.subject_id = classes.subject_id', 'inner')
		->where('classes.section_id', $section_id)
		->where('classes.subject_id', $subject_id)
		->where('classes.teacher_id', $admin_id)
		->get('sections');

		return $query->row();

	}

	public function class_list_print_schedule($admin_id, $section_id, $subject_id) {
		$query = $this->db->select('sections.section_name, sections.section_id,
			sections.level, sections.year, sections.schoolyear, subjects.subject_name, classes.days, classes.time, classes.room')
		->from('classes')
		->join('sections', 'sections.section_id = classes.section_id', 'inner')
		->join('subjects', 'subjects.subject_id = classes.subject_id', 'inner')
		->where('classes.teacher_id', $admin_id)
		->where('classes.section_id', $section_id)
		->where('classes.subject_id', $subject_id)->get();

		return $query->row();
	}

	public function save_grades($grade_array) {

		foreach($grade_array as $data) {
			 $this->db->where('subject_id', $data['subject_id']);
			 $this->db->where('section_id', $data['section_id']);
			 $this->db->where('schoolyear', $data['schoolyear']);
		}

		$query = $this->db->get('grades');

		if($query->num_rows() > 0) {
			$this->db->where('subject_id', $data['subject_id']);
			$this->db->where('section_id', $data['section_id']);
			$this->db->where('schoolyear', $data['schoolyear']);
			$this->db->update_batch('grades', $grade_array, 'student_id');
		} else {
			$this->db->insert_batch('grades', $grade_array);
		}

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

		//end of class list tab

	//end of teacher features
}

?>
