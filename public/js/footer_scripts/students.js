 $(document).ready( function () {
    $('#table_id').DataTable({
      "aaSorting": [],
      "scrollX": true
    });
    console.log('successfully loaded subjects Data Table');
 });

 $('.modal_trigger_disable').on('click', function () {
     var user_id = $(this).data('id');
     var status = $(this).data('status');
     console.log('getting the data...');
     $('.confirm').attr('id', 'disable_confirm');
     $('#enable_disable').text('Are you sure you want disable to this student?');
     $(".modal_confirmation .modal-footer #disable_confirm").val( user_id );
});

$('.modal_trigger_enable').on('click', function () {
     var user_id = $(this).data('id');
     var status = $(this).data('status');
     console.log('getting the data...');
     $('.confirm').attr('id', 'enable_confirm');
     $('#enable_disable').text('Are you sure you want to enable this student?');
     $(".modal_confirmation .modal-footer #enable_confirm").val( user_id );
});

$('.modal_trigger_reset_payment_all').on('click', function () {
     console.log('modal disable all');
     $('.confirm').attr('id', 'reset_payment_all');
     $('#enable_disable').text('Are you sure you want to reset all the payment status of the students?');
     $(".modal_confirmation .modal-footer #reset_payment_all").val( "" );
});

$(document).on('click', '#disable_confirm', function() {
    console.log('disabling...');
    $.ajax({
      method:'POST',
      url:base_url + 'staff/disable_student',
      data: {user_id: $('#disable_confirm').val()},
      success:function(data){
        //console.log(data);
        if(data == 'success') {

          $('.modal_confirmation').modal('hide');
          $('#messages').html(
            '<hr> <div class="alert alert-primary" role="alert">Successfully disabled.</div>'
          );
              setTimeout( function () {
                  $(location).attr('href', base_url + 'staff/students')
              }, 1000 );
        }
      },
      error: function (data) {
        console.log('ajax error');
      } // end of error

      }); // ajax
  });

$(document).on('click', '#enable_confirm', function() {
    console.log('enabling...');
    $.ajax({
      method:'POST',
      url:base_url + 'staff/enable_student',
      data: {user_id: $('#enable_confirm').val()},
      success:function(data){
       // console.log(data);
        if(data == 'success') {
          $('.modal_confirmation').modal('hide');
          $('#messages').html(
            '<hr> <div class="alert alert-success" role="alert">Sucessfully activated.</div>'
          );
           setTimeout( function () {
                  $(location).attr('href', base_url + 'staff/students')
          }, 1000 );
        }
      },
      error: function (data) {
        console.log('ajax error');
      } // end of error

      }); // ajax
  });

  $(document).on('click', '#reset_payment_all', function() {
    console.log('disabling all...');
    $.ajax({
      method:'POST',
      url:base_url + 'staff/reset_payment_all',
      success:function(data){
        //console.log(data);
        if(data == 'success') {

          $('.modal_confirmation').modal('hide');
          $('#messages').html(
            '<hr> <div class="alert alert-primary" role="alert">Successfully reset payments to all students.</div>'
          );
              setTimeout( function () {
                  $(location).attr('href', base_url + 'staff/students')
              }, 1000 );
        }
      },
      error: function (data) {
        console.log('ajax error');
      } // end of error

      }); // ajax
  });

//view student profile
$('.view_student').on('click', function() {
    $('#data_table').slideUp();
    $('#student_profile').slideDown();
    $('#goback').show();
      $.ajax({
      method:'POST',
      url:base_url + 'staff/student_profile',
      data: {user_id: $(this).data('id')},
      success:function(data){
      let json = JSON.parse(data); 
      //console.log(json);
        $('#exam_date').html(json.exam_date);
        $('#type_of_application').html(json.level + ' ' + json.type_of_application);
        $('#lastname').html(json.lastname);
        $('#firstname').html(json.firstname);
        $('#middlename').html(json.middlename);
        $('#address').html(json.address);
        $('#dateofbirth').html(json.dateofbirth);
        $('#placeofbirth').html(json.placeofbirth);
        $('#email').html(json.email);
        $('#student_phone').html(json.student_phone);
        $('#postal').html(json.postal);
        $('#citizenship').html(json.citizenship);
        $('#religion').html(json.religion);
        $('#civilstatus').html(json.civilstatus);
        $('#age').html(json.age);
        $('#gender').html(json.gender);
        $('#lastschool').html(json.lastschool);
        $('#schooladdress').html(json.schooladdress);
        $('#yeargraduation').html(json.yeargraduation);
        $('#gpa').html(json.gpa);
        $('#honors').html(json.honors);
        $('#school_last_attended').html(json.school_last_attended);
        $('#course').html(json.course);
        $('#last_school_year_attended').html(json.last_school_year_attended);
        $('#father_name').html(json.father_name);
        $('#mother_name').html(json.mother_name);
        $('#parent_phone').html(json.parent_phone);
        $('#parent_religion').html(json.parent_religion);
        $('#educational_attainment_father').html(json.educational_attainment_father);
        $('#educational_attainment_mother').html(json.educational_attainment_mother);
        $('#occupation_father').html(json.occupation_father);
        $('#occupation_mother').html(json.occupation_mother);
        $('#email_father').html(json.email_father);
        $('#email_mother').html(json.email_mother);
        $('#name_guardian').html(json.name_guardian);
        $('#relationship').html(json.relationship);
        $('#mailing_address').html(json.mailing_address);
        $('#guardian_phone').html(json.guardian_phone);
        $('#sibling_name').html(json.sibling_name);
        $('#sibling_level_year').html(json.sibling_level_year);
        $('#how_did_know_angelicum').html(json.how_did_know_angelicum);
      },
      error: function (data) {
        console.log('ajax error');
        console.log(data);
      } // end of error

   }); // ajax
});

  //print button in view student profile
  $('#print_btn').on('click', function() {
    $('#print_area').printThis({
      importStyle: true
    });
  });

  //editing students
  $('.edit_student').on('click', function () {
    $('#data_table').slideUp();
    $('#edit_form').slideDown();
    $('#goback').show();

    let level;
    let year;

     $.ajax({
      method:'POST',
      url:base_url + 'staff/student_info',
      data: {user_id: $(this).data('id')},
      success:function(data){
        var json = JSON.parse(data);

        $('#user_id').val(json.user_id);
        level = json.level;
        year = json.year;
        $('#edit_inputLastName').val(json.lastname);
        $('#edit_inputFirstName').val(json.firstname);
        $('#edit_inputMiddleName').val(json.middlename);
        $('#edit_inputPhone').val(json.student_phone);
        $('#edit_inputPostal').val(json.postal);
        $('#edit_inputAddress').val(json.address);
        $('#edit_inputEmail').val(json.email);


        $('#data_table').slideUp();
        $('#edit_form').slideDown();
        $('#goback').slideDown();

        if (level == 'Grade School') {
          $('#edit_inputLevel').val(level);
          $('#edit_inputYear').html(
            '<option value="">Select Year</option>' +
            '<option value="1">1</option>' +
            '<option value="2">2</option>' +
            '<option value="3">3</option>' +
            '<option value="4">4</option>' +
            '<option value="5">5</option>' +
            '<option value="6">6</option>' 
            );
          $('#edit_inputYear').val(year);
        } else if (level == 'High School') {
          $('#edit_inputLevel').val(level);
          $('#edit_inputYear').html(
            '<option value="">Select Year</option>' +
            '<option value="1">1</option>' +
            '<option value="2">2</option>' +
            '<option value="3">3</option>' +
            '<option value="4">4</option>'
            );
          $('#edit_inputYear').val(year);
        } else {
          $('#edit_inputLevel').val("");
        }
        
      },
      error: function (data) {
        console.log('ajax error');
      } // end of error

   }); // ajax
  });

  $('#edit_inputLevel').on('change', function() {
    if( $('#edit_inputLevel').val() == 'Grade School' ) {
       $('#edit_inputYear').html(
            '<option value="">Select Year</option>' +
            '<option value="1">1</option>' +
            '<option value="2">2</option>' +
            '<option value="3">3</option>' +
            '<option value="4">4</option>' +
            '<option value="5">5</option>' +
            '<option value="6">6</option>' 
            );
     } else if ( $('#edit_inputLevel').val() == 'High School' ) {
        $('#edit_inputYear').html(
            '<option value="">Select Year</option>' +
            '<option value="1">1</option>' +
            '<option value="2">2</option>' +
            '<option value="3">3</option>' +
            '<option value="4">4</option>'
            );
     } else {
          $('#edit_inputLevel').val("");
      }
  });

  $('#goback').on('click', function () {
    $('#data_table').slideDown();
    $('#edit_form').slideUp();
    $('#student_profile').slideUp();
    $('#goback').hide();
  });