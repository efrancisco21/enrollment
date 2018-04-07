<div id="edit_form" style="display: none;">
<div class="ml-auto mx-auto" style="width: 500px;">

	<form action="<?= base_url()?>staff/edit_staff" method="post">
		<input type="hidden" name="admin_id" id="admin_id">
		<div class="form-group row">
			<label for="edit_lastname" class="col-sm-3 col-form-label font-weight-bold">Lastname</label>
			<div class="col-md-9">
				<input name="edit_lastname" type="text" class="form-control" id="edit_lastname" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="edit_firstname" class="col-sm-3 col-form-label font-weight-bold">Firstname</label>
			<div class="col-md-9">
				<input name="edit_firstname" type="text" class="form-control" id="edit_firstname" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="edit_middlename" class="col-sm-3 col-form-label font-weight-bold">Middlename</label>
			<div class="col-md-9">
				<input name="edit_middlename" type="text" class="form-control" id="edit_middlename" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="edit_username" class="col-sm-3 col-form-label font-weight-bold">Username</label>
			<div class="col-md-9">
				<input name="edit_username" type="text" class="form-control" id="edit_username" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="edit_password" class="col-sm-3 col-form-label font-weight-bold">Password</label>
			<div class="col-md-9">
				<input name="edit_password" type="password" class="form-control" id="edit_password">
			</div>
		</div>

		<div class="form-group row">
			<label for="edit_role" class="col-sm-3 col-form-label font-weight-bold">Role</label>
			<div class="col-md-9">
			  <select class="form-control custom-select"  name="edit_role" id="edit_role" required>
	   			<option value="">Select Year</option>
	   			<option value="Admin">Admin</option>
	   			<option value="Teacher">Teacher</option>
	   			<option value="Accountant">Accountant</option>
	      	  </select>
			</div>
		</div>
	
	<div class="ml-auto" style="width: 75px;">
		 <button type="submit" class="btn btn-primary btn-block">Submit</a>
	</div>
	<hr>
	</form>
	</div>
</div>