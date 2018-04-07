<?php
class Student_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function authuser($data) {
	 $query = $this->db->where($data)->get('students');

	 return $query->row_array();
	}

	//get stud info specfic usign id
	public function student_info($user_id) {
		$query = $this->db->select('*')->where('user_id', $user_id)->get('students');

		return $query->row();
	}

	//payments history tab

	public function payment_history($userid) {
		$query = $this->db->select('*')->where('studentnumber',$userid)->get('payments');

		return $query->result();
	}
	//end of payments history tab

	public function get_section($userid){
		$query = $this->db->select('section_id')
		->from('student_section')
		->where('student_id',$userid)
		->get();

		return $query->result();
	}

	//get section history
	public function section_history($userid){
		$query = $this->db->select('*')
		->from('student_section')
		->join('students','student_section.student_id = students.user_id')
		->join('sections','student_section.section_id = sections.section_id')
		->where('student_section.student_id',$userid)
		->get();

		return $query->result();
	}
	//end of sec history

	//get year of student
	public function get_startyear_student($userid){
		$query = $this->db->select('year_id')
		->from('students')
		->where('user_id',$userid)
		->get();

		return $query->result();
	}


	//view schedule ofstudent
	public function view_sched($userid,$sectionid) {
		$query = $this->db->select('*')
		->from('student_section')
		->join('students', 'student_section.student_id = students.user_id')
		->join('sections', 'student_section.section_id = sections.section_id')
		->join('classes', 'student_section.section_id = classes.section_id')
		->join('subjects', 'classes.subject_id = subjects.subject_id')
		->join('staff', 'classes.teacher_id = staff.admin_id')
		->where('student_section.student_id',$userid)
		->where('classes.section_id',$sectionid)
		->get();

		return $query->result();
	}
	//end of view sched

	//view schedule ofstudent
	public function view_sched_year($userid,$sectionid,$year) {
		$query = $this->db->select('*')
		->from('student_section')
		->join('students', 'student_section.student_id = students.user_id')
		->join('sections', 'student_section.section_id = sections.section_id')
		->join('classes', 'student_section.section_id = classes.section_id')
		->join('subjects', 'classes.subject_id = subjects.subject_id')
		->join('staff', 'classes.teacher_id = staff.admin_id')
		->where('student_section.student_id',$userid)
		->where('classes.section_id',$sectionid)
		->where('sections.schoolyear',$year)
		->group_by('classes.subject_id')
		->get();

		return $query->result();
	}
	//end of view sched

	//view grade of student by section
	public function view_grade_section($studentnumber,$sectionid) {
		$query = $this->db->select('*')
		->from('grades')
		->join('students', 'grades.student_id = students.studentnumber')
		->join('subjects', 'grades.subject_id = subjects.subject_id')
		->join('sections', 'grades.section_id = sections.section_id')
		->join('classes', 'sections.section_id = classes.section_id')
		->join('staff', 'classes.teacher_id = staff.admin_id')
		->where('grades.student_id',$studentnumber)
		->where('grades.section_id',$sectionid)
		->group_by('grades.subject_id')
		->get();

		return $query->result();
	}
	//end of view grade of student by section

}

?>
