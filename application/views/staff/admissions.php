</head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php $this->load->view('staff/inc/navbar'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
  	<h1>Admissions</h1>
  	 <div id="messages">
    <?php 
    if($this->session->flashdata()) {
      echo '<hr>';
      $alerttype;
      $message;

      if ($this->session->flashdata('success_add')) {

        $alerttype = 'alert-success';
        $message = $this->session->flashdata('success_add');

      } else if ($this->session->flashdata('fail_add')) {

        $alerttype = 'alert-danger';
        $message = $this->session->flashdata('fail_add');

      }
      ?>

      <div class="alert <?= $alerttype ?>" role="alert">
        <?= $message ?>
      </div>

      <?php } ?>
    </div>
  	<hr>
    <div id="admission_form">
		<div class="ml-auto mx-auto" style="width: 900px;">
			<form action="<?= base_url() ?>staff/enteradmission" method="post">

				<div class="form-group row">
					<label for="exam_date" class="col-sm-3 col-form-label">Exam Date and Time</label>
					<div class="col-sm-9">
						<input type="text" name="exam_date" id="exam_date" class="form-control" id="exam_date" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<label>Type of Application:</label>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-md-6">
						<label>Grade School</label>
						<div class="input-group">
							<span class="input-group-addon">
								<input name="type_of_application_radio" id="grade_school_radio" type="radio" aria-label="Radio button for following text input" value="Grade School">
							</span>
							<select class="form-control custom-select"  name="" id="grade_school_text" required>
								<option value="">Select Year</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label>High School</label>
						<div class="input-group">
							<span class="input-group-addon">
								<input name="type_of_application_radio" id="high_school_radio" type="radio" aria-label="Radio button for following text input" value="High School">
							</span>
							<select class="form-control custom-select"  name="" id="high_school_text" required>
								<option value="">Select Year</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 mb-3">
						<h5>PERSONAL DETAILS</h5>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 mb-3">
						<label for="lastname">Last name</label>
						<input type="text" class="form-control" id="lastname" name="lastname" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="firstname">First name</label>
						<input type="text" class="form-control" id="firstname" name="firstname" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="middlename">Middle name</label>
						<input type="text" class="form-control" id="middlename" name="middlename" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="address">Permanent mailing address</label>
						<input type="text" class="form-control" id="address" name="address" placeholder="House No. / Block No. / Lot No. / Street Subd. / Vill./Brgy. / Municipality/District" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 mb-3">
						<label for="dateofbirth">Date of Birth</label>
						<input type="text" class="form-control" id="dateofbirth" name="dateofbirth" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="placeofbirth">Place of Birth</label>
						<input type="text" class="form-control" id="placeofbirth" name="placeofbirth" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="email">Email Address</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="student_phone">Mobile No.</label>
						<input type="text" class="form-control" id="student_phone" name="student_phone" required>
					</div>

					<div class="col-md-6 mb-3">
						<label for="postal">Postal Code</label>
						<input type="text" class="form-control" id="postal" name="postal" required>
					</div>
				</div>

				<div class="row mb-5">
					<div class="col-md-2 mb-3">
						<label for="citizenship">Citizenship</label>
						<input type="text" class="form-control" id="citizenship" name="citizenship" required>
					</div>

					<div class="col-md-3 mb-3">
						<label for="religion">Religion</label>
						<input type="text" class="form-control" id="religion" name="religion" required>
					</div>

					<div class="col-md-2 mb-3">
						<label for="civilstatus">Civil Status</label>
						<input type="text" class="form-control" id="civilstatus" name="civilstatus" required>
					</div>

					<div class="col-md-2 mb-3">
						<label for="age">Age</label>
						<input type="text" class="form-control" id="age" name="age" required>
					</div>

					<div class="col-md-3 mb-3">
						<label for="age">Gender</label><br>
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="gender" id="gender" value="male" required>
							Male
						</label>
						&nbsp;&nbsp;
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="gender" id="gender" value="female" required>
							Female
						</label>
						
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 mb-3">
						<h5>EDUCATIONAL DATA</h5>
						<hr>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="lastschool">Name of School Last Attended</label>
						<input type="text" class="form-control" id="lastschool" name="lastschool" required>
					</div>

					<div class="col-md-6 mb-3">
						<label for="schooladdress">School Address</label>
						<input type="text" class="form-control" id="schooladdress" name="schooladdress" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 mb-3">
						<label for="yeargraduation">Year of Graduation</label>
						<input type="text" class="form-control" id="yeargraduation" name="yeargraduation" required>
					</div>

					<div class="col-md-4 mb-3">
						<label for="gpa">GPA</label>
						<input type="text" class="form-control" id="gpa" name="gpa" required>
					</div>

					<div class="col-md-4 mb-3">
						<label for="honors">Honors Received</label>
						<input type="text" class="form-control" id="honors" name="honors">
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="school_last_attended">School Last Attended</label>
						<input type="text" class="form-control" id="school_last_attended" name="school_last_attended" >
					</div>

					<div class="col-md-6 mb-3">
						<label for="course">Course</label>
						<input type="text" class="form-control" id="course" name="course" >
					</div>
				</div>

				<div class="row mb-5">
					<div class="col-md-12 mb-3">
						<label for="last_school_year_attended">Last School Year Attended</label>
						<input type="text" class="form-control" id="last_school_year_attended" name="last_school_year_attended" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 mb-3">
						<h5>FAMILY DATA</h5>
						<hr>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="father_name">Name of Father</label>
						<input type="text" class="form-control" id="father_name" name="father_name" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="mother_name">Name of Mother</label>
						<input type="text" class="form-control" id="mother_name" name="mother_name" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="parent_phone">Mobile No.</label>
						<input type="text" class="form-control" id="parent_phone" name="parent_phone" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="parent_religion">Religion</label>
						<input type="text" class="form-control" id="parent_religion" name="parent_religion" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="educational_attainment_father">Educational Attainment of Father</label>
						<input type="text" class="form-control" id="educational_attainment_father" name="educational_attainment_father" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="educational_attainment_mother">Educational Attainment of Mother</label>
						<input type="text" class="form-control" id="educational_attainment_mother" name="educational_attainment_mother" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="occupation_father">Occupation of Father</label>
						<input type="text" class="form-control" id="occupation_father" name="occupation_father" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="occupation_mother">Occupation of Mother</label>
						<input type="text" class="form-control" id="occupation_mother" name="occupation_mother" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="email_father">Email Address of Father</label>
						<input type="email" class="form-control" id="email_father" name="email_father" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="email_mother">Email Address of Mother</label>
						<input type="email" class="form-control" id="email_mother" name="email_mother" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 mb-3">
						<label>If Applicant is living with Guardian:</label>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="name_guardian">Name of Guardian</label>
						<input type="text" class="form-control" id="name_guardian" name="name_guardian" >
					</div>
					<div class="col-md-6 mb-3">
						<label for="relationship">Relationship</label>
						<input type="text" class="form-control" id="relationship" name="relationship" >
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="mailing_address">Mailing Address</label>
						<input type="text" class="form-control" id="mailing_address" name="mailing_address" >
					</div>
					<div class="col-md-6 mb-3">
						<label for="guardian_phone">Mobile No.</label>
						<input type="text" class="form-control" id="guardian_phone" name="guardian_phone" >
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<label>Do you have siblings who are currently enrolled in Angelicum College?</label><br>
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="siblings_yes_no" id="siblings_radio1" value="yes" required>
							Yes
						</label>
						&nbsp;&nbsp;
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="siblings_yes_no" id="siblings_radio2" value="no" required>
							No
						</label>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="sibling_name" name="sibling_label" style="display: none;">Name</label>
						<input type="text" class="form-control" id="sibling_name" name="sibling_name" style="display: none;">
					</div>
					<div class="col-md-6 mb-3">
						<label for="sibling_level_year" name="sibling_label" style="display: none;">Year</label>
						<input type="text" class="form-control" id="sibling_level_year" name="sibling_level_year" style="display: none;">
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 mb-3">
						<label for="how_did_know_angelicum">How did you know about Angelicum College?</label>
						<input type="text" class="form-control" id="how_did_know_angelicum" name="how_did_know_angelicum">
					</div>
				</div>


				<button class="btn btn-primary" type="submit">Submit form</button>
			</form>
		</div>
		<br>
	</div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->