 <div class="container">

 <?php
if($this->session->flashdata()) {
$alerttype;
$message;
  if ($this->session->flashdata('login')) {
      $alerttype = 'alert-success';
      $message = $this->session->flashdata('login');
  }
  ?>

<div class="alert <?= $alerttype ?>" role="alert">
        <?= $message ?>
</div>

<?php } ?>
      <!-- BODY START -->
      <div class="row">
        <div class="col-md-4">
          <h2><?= $this->session->userdata('firstname').' '.$this->session->userdata('lastname'); ?></h2>
          <ul class="list-group">
           	<li class="list-group-item" style="background-color:#DDDDDD;"><a href="<?= base_url().'student/accountinfo'; ?>"><i class="fa fa-id-card-o"></i> Account info</a></li>
            <li class="list-group-item"><a href="<?= base_url().'student/viewsched'; ?>"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i> View Schedule</a></li>
            <li class="list-group-item"><a href="<?= base_url().'student/viewgrade'; ?>"><i class="fa fa-book" aria-hidden="true"></i> View Grades</a></li>
            <li class="list-group-item"><a href="<?= base_url().'student/safinfo'; ?>"><i class="fa fa-credit-card" aria-hidden="true"></i> SAF</a></li>
          </ul>
        </div>
        <!-- Info Col -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Account Information
            </div>
            <div class="card-body">
             	<!-- -->
						<table class="table no-border table-sm">
							<tr>
								<td><h5>PERSONAL DETAILS</h5> <hr> </td>
							</tr>
							<tr>
								<td><strong>Lastname: </strong> <p style="display:inline" id="lastname"><?= $studentinfo->lastname; ?></p> </td>
								<td><strong>Firstname: </strong> <p style="display:inline" id="firstname"><?= $studentinfo->firstname; ?></p> </td>
								<td><strong>Middlename: </strong> <p style="display:inline" id="middlename"><?= $studentinfo->middlename; ?></p> </td>
							</tr>
							<tr>
								<td colspan="3"><strong>Permanent mailing address: </strong> <p style="display:inline" id="address"><?= $studentinfo->address; ?></p></td>
							</tr>
							<tr>
								<td><strong>Date of Birth: </strong> <p style="display:inline" id="dateofbirth"><?= $studentinfo->dateofbirth; ?></p> </td>
								<td><strong>Place of Birth: </strong> <p style="display:inline" id="placeofbirth"><?= $studentinfo->placeofbirth; ?></p> </td>
								<td><strong>Email Address: </strong> <p style="display:inline" id="email"><?= $studentinfo->email; ?></p> </td>
							</tr>
							<tr>
								<td><strong>Mobile No.: </strong><p style="display:inline" id="student_phone"><?= $studentinfo->student_phone; ?></p></td>
								<td><strong>Postal Code: </strong><p style="display:inline" id="postal"><?= $studentinfo->postal; ?></p></td>
								<td><strong>Citizenship: </strong><p style="display:inline" id="citizenship"><?= $studentinfo->citizenship; ?></p></td>
							</tr>
							<tr>
								<td><strong>Religion: </strong><p style="display:inline" id="religion"><?= $studentinfo->religion; ?></p></td>
								<td><strong>Civil Status: </strong><p style="display:inline" id="civilstatus"><?= $studentinfo->civilstatus; ?></p></td>
								<td>
									<ul>
										<li><strong>Age: </strong><p style="display:inline" id="age"><?= $studentinfo->age; ?></p></li>
										<li><strong>Gender: </strong><p style="display:inline" id="gender"><?= $studentinfo->gender; ?></p></li>
									</ul>
								</td>
							</tr>
							<tr>
								<td><h5>EDUCATIONAL DATA</h5> <hr> </td>
							</tr>
							<tr>
								<td>
									<strong>Name of School Last Attended: </strong><p style="display:inline" id="lastschool"><?= $studentinfo->lastschool; ?></p>
								</td>
								<td>
									<strong>School Address: </strong><p style="display:inline" id="schooladdress"><?= $studentinfo->schooladdress; ?></p>
								</td>
							</tr>
							<tr>
								<td><strong>Year of Graduation: </strong><p style="display:inline" id="yeargraduation"><?= $studentinfo->yeargraduation; ?></p></td>
								<td><strong>GPA: </strong> <p style="display:inline" id="gpa"><?= $studentinfo->gpa; ?></p></td>
								<td><strong>Honors Received: </strong><p style="display:inline" id="honors"><?= $studentinfo->honors; ?></td>
							</tr>
							<tr>
								<td>
									<strong>School Last Attended: </strong><p style="display:inline" id="school_last_attended"><?= $studentinfo->school_last_attended; ?></p>
								</td>
								<td>
									<strong>Course: </strong><p style="display:inline" id="course"><?= $studentinfo->course; ?></p>
								</td>
								<td>
									<strong>Last School Year Attended: </strong><p style="display:inline" id="last_school_year_attended"><?= $studentinfo->last_school_year_attended; ?></p>
								</td>
							</tr>
							<tr>
								<td><h5>FAMILY DATA</h5> <hr> </td>
							</tr>
							<tr>
								<td>
									<strong>Name of Father: </strong><p style="display:inline" id="father_name"><?= $studentinfo->father_name; ?></p>
								</td>
								<td>
									<strong>Name of Mother: </strong><p style="display:inline" id="mother_name"><?= $studentinfo->mother_name; ?></p>
								</td>


							</tr>
							<tr>
								<td>
									<strong>Mobile No.: </strong><p style="display:inline" id="parent_phone"><?= $studentinfo->parent_phone; ?></p>
								</td>

								<td>
									<strong>Religion: </strong><p style="display:inline" id="parent_religion"><?= $studentinfo->parent_religion; ?></p>
								</td>

							</tr>
							<tr>
								<td>
									<strong>Educational Attainment of Father: </strong><p style="display:inline" id="educational_attainment_father"><?= $studentinfo->educational_attainment_father; ?></p>
								</td>

								<td>
									<strong>Educational Attainment of Mother: </strong><p style="display:inline" id="educational_attainment_mother"><?= $studentinfo->educational_attainment_mother; ?></p>
								</td>

							</tr>
							<tr>
								<td>
									<strong>Occupation of Father: </strong><p style="display:inline" id="occupation_father"><?= $studentinfo->occupation_father; ?></p>
								</td>

								<td>
									<strong>Occupation of Mother: </strong><p style="display:inline" id="occupation_mother"><?= $studentinfo->occupation_mother; ?></p>
								</td>


							</tr>
							<tr>
								<td>
									<strong>Email Address of Father: </strong><p style="display:inline" id="email_father"><?= $studentinfo->email_father; ?></p>
								</td>

								<td>
									<strong>Email Address of Mother: </strong><p style="display:inline" id="email_mother"><?= $studentinfo->email_mother; ?></p>
								</td>

							</tr>
							<tr>
								<td>
									<strong>Name of Guardian: </strong> <p style="display:inline" id="name_guardian"><?= $studentinfo->name_guardian; ?></p>
								</td>
								<td>
									<strong>Relationship: </strong> <p style="display:inline" id="relationship"><?= $studentinfo->relationship; ?></p>
								</td>
							</tr>
							<tr>
								<td>
									<strong>Mailing Address: </strong><p style="display:inline" id="mailing_address"><?= $studentinfo->mailing_address; ?></p>
								</td>
								<td>
									<strong>Mobile No.: </strong><p style="display:inline" id="guardian_phone"><?= $studentinfo->guardian_phone; ?></p>
								</td>
							</tr>
							<tr>
								<td><strong>Sibling Name: </strong><p style="display:inline" id="sibling_name"><?= $studentinfo->sibling_name; ?></p></td>
								<td><strong>Year: </strong><p style="display:inline" id="sibling_level_year"><?= $studentinfo->sibling_level_year; ?></p></td>
							</tr>						</table>
             	<!-- -->
            </div>
          </div>
        </div>
         <!-- END Info Col -->
      </div>

      <!-- BODY END -->

 </div><!-- /.container -->
