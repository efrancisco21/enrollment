<div id="edit_form" style="display: none;">
<div class="ml-auto mx-auto" style="width: 900px;">
<form action="<?= base_url()?>staff/edit_student" method="post">
  <input type="hidden" name="user_id" id="user_id">
  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="edit_inputLevel" class="col-form-label">Level</label>
      <select class="form-control custom-select"  name="edit_inputLevel" id="edit_inputLevel" required>
        <option value="">Select Level</option>
        <option value="Grade School">Grade School</option>
        <option value="High School">High School</option>
      </select>
    </div>

    <div class="form-group col-md-6">
      <label for="edit_inputYear" class="col-form-label">Year</label>
      <select class="form-control custom-select"  name="edit_inputYear" id="edit_inputYear" required>
      <!--   <option value="">Select Year</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option> -->
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="edit_inputLastName" class="col-form-label">Last name</label>
      <input type="text" class="form-control" id="edit_inputLastName" name="edit_inputLastName" required>
    </div>
    <div class="form-group col-md-4">
      <label for="edit_inputFirstName" class="col-form-label">First name</label>
      <input type="text" class="form-control" id="edit_inputFirstName" name="edit_inputFirstName" required>
    </div>
     <div class="form-group col-md-4">
      <label for="edit_inputMiddleName" class="col-form-label">Middle name</label>
      <input type="text" class="form-control" id="edit_inputMiddleName" name="edit_inputMiddleName" required>
    </div>
  </div>

 <div class="form-row">
  <div class="form-group col-md-6">
    <label for="edit_inputPhone" class="col-form-label">Phone</label>
    <input type="text" class="form-control" id="edit_inputPhone" name="edit_inputPhone" required>
  </div>
  <div class="form-group col-md-6">
    <label for="edit_inputPostal" class="col-form-label">Postal</label>
    <input type="text" class="form-control" id="edit_inputPostal" name="edit_inputPostal" required>
  </div>
 </div>



<div class="form-row">
  <div class="form-group col-md-6">
    <label for="edit_inputAddress" class="col-form-label">Address</label>
    <input type="text" class="form-control" id="edit_inputAddress" name="edit_inputAddress" required>
  </div>

  <div class="form-group col-md-6">
    <label for="edit_inputEmail" class="col-form-label">Email</label>
    <input type="text" class="form-control" id="edit_inputEmail" name="edit_inputEmail" required>
  </div>

  
</div>

<div class="form-row">
   <div class="form-group col-md-6">
    <label for="edit_inputPassword" class="col-form-label">Password</label>
    <input type="password" class="form-control" id="edit_inputPassword" name="edit_inputPassword">
  </div>
</div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>
<hr>
</div>
</div>