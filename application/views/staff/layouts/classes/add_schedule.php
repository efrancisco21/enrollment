<button class="btn btn-secondary" id="close_form_addschedule" style="display: none;">Close form</button>

<div id="add_form_schedule" style="display: none;">
<div class="ml-auto mx-auto" style="width: 500px;">

	<h3>Add Schedule</h3><br>
	<form action="<?= base_url()?>staff/classmanage_addschedule/<?= $this->uri->segment(3) ?>" method="post">
	
		<div class="form-group row">
			<label for="subject" class="col-sm-2 col-form-label font-weight-bold">Subject</label>
			<div class="col-md-10">
				<select class="form-control custom-select"  name="subject" id="subject" required>
				<option value="">Select Subject</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="days" class="col-sm-2 col-form-label font-weight-bold">Days</label>
			<div class="col-md-10">
				 <input type="text" class="form-control" name="days" id="days" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="time" class="col-sm-2 col-form-label font-weight-bold">Time</label>
			<div class="col-md-10">
				 <input type="text" class="form-control" name="time" id="time" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="room" class="col-sm-2 col-form-label font-weight-bold">Room</label>
			<div class="col-md-10">
			 	<input type="text" class="form-control" name="room" id="room" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="teacher" class="col-sm-2 col-form-label font-weight-bold">Teacher</label>
			<div class="col-md-10">
				<select class="form-control custom-select"  name="teacher" id="teacher" required>
				<option value="">Select Teacher</option>
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