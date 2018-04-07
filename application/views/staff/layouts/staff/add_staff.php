<div id="add_form" style="display: none;">
<div class="ml-auto mx-auto" style="width: 500px;">

	<form action="<?= base_url()?>staff/add_staff" method="post">
	
		<div class="form-group row">
			<label for="lastname" class="col-sm-3 col-form-label font-weight-bold">Lastname</label>
			<div class="col-md-9">
				<input name="lastname" type="text" class="form-control" id="lastname" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="firstname" class="col-sm-3 col-form-label font-weight-bold">Firstname</label>
			<div class="col-md-9">
				<input name="firstname" type="text" class="form-control" id="firstname" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="middlename" class="col-sm-3 col-form-label font-weight-bold">Middlename</label>
			<div class="col-md-9">
				<input name="middlename" type="text" class="form-control" id="middlename" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="username" class="col-sm-3 col-form-label font-weight-bold">Username</label>
			<div class="col-md-9">
				<input name="username" type="text" class="form-control" id="username" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="password" class="col-sm-3 col-form-label font-weight-bold">Password</label>
			<div class="col-md-9">
				<input name="password" type="password" class="form-control" id="password" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="role" class="col-sm-3 col-form-label font-weight-bold">Role</label>
			<div class="col-md-9">
			  <select class="form-control custom-select"  name="role" id="role" required>
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