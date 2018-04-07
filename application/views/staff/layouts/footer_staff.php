<?php
 if($this->session->has_userdata('logged_in')) {

?>
   <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
        Copyright &copy; Angelicum College 2017
        </div>
      </div>
    </footer>
<?php } ?>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div> -->


	<!-- scripts -->
	<script type="text/javascript" src="<?= base_url() ?>public/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>public/js/popper.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>public/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>public/js/jquery.datetimepicker.full.min.js"></script>

	 <!-- Plugin JavaScript -->
    <script type="text/javascript" src="<?= base_url() ?>public/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- <script type="text/javascript" src="<?= base_url() ?>public/vendor/chart.js/Chart.min.js"></script> -->
    <script type="text/javascript" src="<?= base_url() ?>public/vendor/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>public/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- <script type="text/javascript" src="<?= base_url() ?>public/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>public/js/buttons.print.min.js"></script> -->
    <!-- Custom scripts for this template -->
    <script type="text/javascript" src="<?= base_url() ?>public/js/sb-admin.js"></script>
    <!-- <script type="text/javascript" src="<?= base_url() ?>public/js/printThis.js"></script> -->

<script type="text/javascript">
  window.base_url = <?php echo json_encode(base_url()); ?>;
</script>
<!-- admissions tab -->
<?php
 if (base_url(uri_string()) == base_url().'staff/admissions') {?>
      <script type="text/javascript" src="<?= base_url() ?>public/js/footer_scripts/admissions.js"></script>
<?php } ?>
<!-- end of admissions tab -->

<!-- sections tab -->
<?php
if (base_url(uri_string()) == base_url().'staff/sections') {?>
     <script type="text/javascript" src="<?= base_url() ?>public/js/footer_scripts/sections.js"></script>
 <?php } ?>
<!-- end of sections tab -->

<!-- students tab -->
<?php
if (base_url(uri_string()) == base_url().'staff/students') {?>
     <script type="text/javascript" src="<?= base_url() ?>public/js/footer_scripts/students.js"></script>
<?php } ?>
<!-- end of students tab -->

<!-- subjects tab -->
<?php
if (base_url(uri_string()) == base_url().'staff/subjects') {?>
    <script type="text/javascript" src="<?= base_url() ?>public/js/footer_scripts/subjects.js"></script>
<?php } ?>
<!-- end of subjects tab -->

<!-- staff tab -->
<?php
if (base_url(uri_string()) == base_url().'staff/staff_list') {?>
    <script type="text/javascript" src="<?= base_url() ?>public/js/footer_scripts/staff.js"></script>
<?php } ?>
<!-- end of staff tab -->

<!-- classes tab -->
<?php
if (base_url(uri_string()) == base_url().'staff/classes' || base_url(uri_string()) == base_url().'staff/classmanage/' . $this->uri->segment(3)  ) {  ?>
    <script type="text/javascript" src="<?= base_url() ?>public/js/footer_scripts/classes.js"></script>
    <!-- this script is also used in class_manage.php -->
<?php } ?>

<!-- end of classes tab -->

<!-- payments tab -->
<?php
if (base_url(uri_string()) == base_url().'staff/payments' || base_url(uri_string()) == base_url().'staff/payment_history') {?>
    <script type="text/javascript" src="<?= base_url() ?>public/js/footer_scripts/payments.js"></script>
<?php } ?>
<!-- end of payments tab -->

<!-- teacher/class list tab -->
<?php
if (base_url(uri_string()) == base_url().'staff/class_list' || base_url(uri_string()) == base_url().'staff/class_list_view/'. $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) ) {?>
    <script type="text/javascript" src="<?= base_url() ?>public/js/footer_scripts/class_list.js"></script>
    <!-- <script type="text/javascript" src="<?= base_url() ?>public/js/printThis.js"></script> -->
<?php } ?>
<!-- end of teacher/class list  tab -->


</body>
</html>
