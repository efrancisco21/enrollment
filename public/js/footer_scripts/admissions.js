$(document).ready(function() {
    console.log('admissions');
  });

  $('#exam_date').datetimepicker();

  $("input[name='siblings_yes_no']").on('change', function () {
    if ( $("input[name='siblings_yes_no']:checked").val() == 'yes' ) {
      $("#sibling_name, #sibling_level_year").val("");
      $("label[name='sibling_label'], #sibling_name, #sibling_level_year").show();
    } else if ( $("input[name='siblings_yes_no']:checked").val() == 'no' ) {
       $("#sibling_name, #sibling_level_year").val("");
      $("label[name='sibling_label'] ,#sibling_name, #sibling_level_year").hide();
    }
  });

  $("input[name='type_of_application_radio']").on('change', function() {
    if ( $("input[name='type_of_application_radio']:checked").val() == 'Grade School' ) {
      $('#grade_school_text').prop('disabled', false);
      $('#grade_school_text').attr('name', 'type_of_application_text');
      $('#high_school_text').attr('name', '');
      $('#high_school_text').prop('disabled', true);
    } else if ( $("input[name='type_of_application_radio']:checked").val() == 'High School' ) {
      $('#high_school_text').prop('disabled', false);
      $('#high_school_text').attr('name', 'type_of_application_text');
      $('#grade_school_text').attr('name', '');
      $('#grade_school_text').prop('disabled', true);
    }
  });