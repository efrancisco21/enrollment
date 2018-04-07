<div id="add_form" style="display: none;">
<div class="ml-auto mx-auto" style="width: 500px;">

	<form action="<?= base_url()?>staff/add_subject" method="post">
	
		<div class="form-group row">
			<label for="subject_name" class="col-sm-2 col-form-label font-weight-bold">Subject Name</label>
			<div class="col-md-10">
				<input name="subject_name" type="text" class="form-control" id="subject_name" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="inputLevel" class="col-sm-2 col-form-label font-weight-bold">Level</label>
			<div class="col-md-10">
				<select class="form-control custom-select"  name="inputLevel" id="inputLevel" required>
					<option value="">Select Level</option>
					<option value="Grade School">Grade School</option>
					<option value="High School">High School</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="inputYear" class="col-sm-2 col-form-label font-weight-bold">Year</label>
			<div class="col-md-10">
				<select class="form-control custom-select"  name="inputYear" id="inputYear" required>

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