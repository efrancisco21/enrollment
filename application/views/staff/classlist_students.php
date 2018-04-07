<style type="text/css">

#data_table,
#classlist {
  max-height: 0;
  opacity: 0;
 -webkit-transition: all ease-in-out 0.2s;
 transition: all ease-in-out 0.2s;
}
#data_table.Active,
#classlist.Active {
  max-height: 1000px;
  opacity: 1;
}

</style>
</head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php $this->load->view('staff/inc/navbar'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <h1>Class List - <?= $section_info->section_name ?> - <?= $section_info->schoolyear ?> - <?= $section_info->subject_name ?></h1>

     <div id="messages"></div>

    <!-- hidden forms -->
    <input type="hidden" value="<?= $section_info->subject_id ?>" id="subject_id" >  <!-- subject id to be used in javascript -->
    <input type="hidden" value="<?= $section_info->section_id ?>" id="section_id">
    <!-- hidden forms -->
    <a href="<?= base_url() ?>staff/class_list" class="btn btn-secondary">Back</a>
    <button type="button" class="btn btn-primary" data-schoolyear="<?= $section_info->schoolyear ?>" id="save_grades">Save Grades</button>
    <a href="<?= base_url() ?>staff/print_schedule/<?= $section_info->section_id ?>/<?= $section_info->subject_id ?>/<?= $section_info->teacher_id ?>"
       class="btn btn-success" id="print_schedule">Print Schedule</a>
    <a href="<?= base_url() ?>staff/print_grades/<?= $section_info->section_id ?>/<?= $section_info->subject_id ?>/<?= $section_info->teacher_id ?>" class="btn btn-info" id="print_grades">Print Grades</a>
    <hr>
    <div id="data_table" class="Active">
      <table id="table_id" class="table" style="width: 100%;">
        <thead>
          <tr>
           <th>Student number</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Middlename</th>
            <th>Level</th>
            <th>Year</th>
            <th>Grade</th>
          </tr>
        </thead>
        <tbody>
          <?php //var_dump($class_list_view) ?>
          <?php foreach ($class_list_view as $student) { ?>
          <tr>
            <td class="studentnumber"><?= $student->studentnumber ?></td>
            <td><?= $student->lastname ?></td>
            <td><?= $student->firstname ?></td>
            <td><?= $student->middlename ?></td>
            <td><?= $student->level ?></td>
            <td><?= $student->year ?></td>
            <td>
              <?php //var_dump($student->grade) ?>
              <select class="custom-select grade" style="height:20px;">
                <?php if($student->grade == 'passed'){ ?>
                  <option value="passed" selected>Passed</option>
                  <option value="failed">Failed</option>
                <?php } else if ($student->grade == 'failed'){ ?>
                  <option value="passed">Passed</option>
                  <option value="failed" selected>Failed</option>
                <?php } else { ?>
                <option value="">Select Grade</option>
                <option value="passed">Passed</option>
                <option value="failed" selected >Failed</option>
                <?php } ?>
              </select>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>

  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
