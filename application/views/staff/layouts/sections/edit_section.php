<div id="edit_form" style="display: none;">
<div class="ml-auto mx-auto" style="width: 500px;">

	<form action="<?= base_url()?>staff/edit_section" method="post">
		 <input type="hidden" name="section_id" id="section_id">
		<div class="form-group row">
			<label for="edit_section_name" class="col-sm-2 col-form-label font-weight-bold">Section Name</label>
			<div class="col-md-10">
				<input name="edit_section_name" type="text" class="form-control" id="edit_section_name" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="edit_inputLevel" class="col-sm-2 col-form-label font-weight-bold">Level</label>
			<div class="col-md-10">
				<select class="form-control custom-select"  name="edit_inputLevel" id="edit_inputLevel" required>
					<option value="">Select Level</option>
					<option value="Grade School">Grade School</option>
					<option value="High School">High School</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="edit_inputYear" class="col-sm-2 col-form-label font-weight-bold">Year</label>
			<div class="col-md-10">
			  <select class="form-control custom-select"  name="edit_inputYear" id="edit_inputYear" required>
	   
	      	  </select>
			</div>
		</div>

		<div class="form-group row">
			<label for="edit_schoolyear" class="col-sm-2 col-form-label font-weight-bold">School Year</label>
			<div class="col-md-10">
			<select class="form-control custom-select" name="edit_schoolyear" id="edit_schoolyear"></select>
			</div>
		</div>

     
	
	<div class="ml-auto" style="width: 75px;">
		 <button type="submit" class="btn btn-primary btn-block">Submit</a>
	</div>
	<hr>
	</form>
	</div>
</div>