<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Print Schedule</title>

	<link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css">

</head>
  <body>

<div class="content-wrapper">
  <div class="container-fluid">
    <a href="<?= base_url() ?>staff/class_list_view/<?= $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) ?>" class="btn btn-secondary">Back</a>

<div id="print_area">


    <h1><?= $section_info->section_name ?> - <?= $section_info->schoolyear ?> - <?= $section_info->subject_name ?></h1>

    <strong> <p style="display:inline"> <?= $class_list->days ?> - <?= $class_list->time ?> - <?= $class_list->room ?> </p> </strong>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Student number</th>
          <th>Lastname</th>
          <th>Firstname</th>
          <th>Middlename</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($class_list_view as $student) { ?>
        <tr>
          <td class="studentnumber"><?= $student->studentnumber ?></td>
          <td><?= $student->lastname ?></td>
          <td><?= $student->firstname ?></td>
          <td><?= $student->middlename ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
</div>

	<!-- scripts -->
	<script type="text/javascript" src="<?= base_url() ?>public/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>public/js/popper.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>public/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>public/js/printThis.js"></script>

  <script type="text/javascript">
      $(document).ready(function() {
        $('#print_area').printThis();
      });
  </script>

</body>
</html>
