<button class="btn btn-secondary" id="close_form_addstudent" style="display: none;">Close form</button>

<div id="add_form_student" style="display: none;">
<div class="ml-auto mx-auto" style="width: 500px;">

	<h3>Add student</h3><br>
	<form action="<?= base_url()?>staff/classmanagement_addstudent/<?= $this->uri->segment(3) ?>" method="post">
		<div class="form-group row">
			<label for="student_number" class="col-sm-2 col-form-label font-weight-bold">Student number</label>
			<div class="col-md-10">
			
			 <input type="text" class="form-control" name="student_number" id="student_number" required>
			
			</div>
		</div>
	
	<div class="ml-auto form-group row" style="width: 250px;">
		<div class="col-md-6">
				<button type="button" id="search_student" class="btn btn-primary btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
		</div>
		<div class="col-md-6">
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>	
	</div>
	
	</form>
<hr>
<table class="table no-border">
  <tbody>
  	<tr>
		<td><strong>Student number: </strong> <p style="display:inline" id="studentnumber"></p> </td>
	</tr>
    <tr>
		<td><strong>Full name: </strong> <p style="display:inline" id="fullname"></p> </td>
	</tr>
	<tr>
		<td><strong>Level: </strong> <p style="display:inline" id="level"></p> </td>
	</tr>
	 <tr>
		<td><strong>Year: </strong> <p style="display:inline" id="year"></p> </td>
	</tr>
  </tbody>
</table>
	</div>
</div>