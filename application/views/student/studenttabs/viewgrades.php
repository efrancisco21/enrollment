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
            <li class="list-group-item"><a href="<?= base_url().'student/accountinfo'; ?>"><i class="fa fa-id-card-o"></i> Account info</a></li>
            <li class="list-group-item"><a href="<?= base_url().'student/viewsched'; ?>"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i> View Schedule</a></li>
            <li class="list-group-item" style="background-color:#DDDDDD;"><a href="<?= base_url().'student/viewgrade'; ?>"><i class="fa fa-book" aria-hidden="true"></i> View Grades</a></li>
            <li class="list-group-item"><a href="<?= base_url().'student/safinfo'; ?>"><i class="fa fa-credit-card" aria-hidden="true"></i> SAF</a></li>
          </ul>
        </div>
        <!-- Info Col -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Financial Information
            </div>
            <div class="card-body">
              <h4 class="card-title">View Grade</h4>
              <!-- row for dropdown -->
              <div class="row">
                <div class="col-md-6">
                    <select name="" id="section" class="form-control">
                      <option value="">Select Section</option>
                      <?php foreach($sectionshistory as $key){ ?>
                        <option value="<?php echo $key->section_id ?>"><?php echo $key->section_name ?></option>
                      <?php } ?>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <button class="btn btn-primary" onclick="search()"><i class="fa fa-search"></i> Search </button>
                </div>
              </div>
              <!--<?php foreach($grade as $key) ?>-->
                <table class="table table-striped" id="thetable">
                  <thead>
                    <tr>
                      <th>Subject</th>
                      <th>Days</th>
                      <th>Time</th>
                      <th>Room</th>
                      <th>Teacher</th>
                      <th>Grade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      
                    </tr>
                  </tbody>
                </table>
<!--<?php ?>-->
</div>
            </div>
          </div>
        </div>
         <!-- END Info Col -->
      </div>

      <!-- BODY END -->

 </div><!-- /.container -->

<script>
    function search(){

      $.ajax({
          type: 'POST',
          url: "<?php echo base_url(); ?>" + 'student/viewgrade_section',
          data: {section: $('#section').val() },
          success:function(response){
              $('#thetable').html(response);
          }
      });
    }

</script>