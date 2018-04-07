 $(document).ready( function () {
    $('#table_id, #table_id_students, #table_id_schedules').DataTable({
      "aaSorting": [],
      "scrollX": true
    });
  });

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

$('#add_student').on('click', function() {
  console.log('add student');
  $('#add_form_student').slideDown();
  $('#datatable_section').slideUp();//section tag
  $('#close_form_addstudent').show();
});

$('#add_schedule').on('click', function() {
  console.log('add schedule');
  $('#add_form_schedule').slideDown();
  $('#datatable_section').slideUp();//section tag
  $('#close_form_addschedule').show();

   $.ajax({
    method:'POST',
    url:base_url + 'staff/subject_lookup',
    success:function(data){
      let json = JSON.parse(data);
      let subjects = $('#subject');

      $.each(json, function() {
         subjects.append( $("<option />").val(this.subject_id).text(this.subject_name) );
      });
    },
    error: function (data) {
      console.log('ajax error');
    } // end of error

  }); // ajax

   $.ajax({
    method:'POST',
    url:base_url + 'staff/teacher_lookup',
    success:function(data){
      let json = JSON.parse(data);
      let teachers = $('#teacher');

      $.each(json, function() {
         teachers.append( $("<option />").val(this.admin_id).text(this.lastname + ' ' + this.firstname + ' ' + this.middlename) );
      });
    },
    error: function (data) {
      console.log('ajax error');
    } // end of error

  }); // ajax
});

$('#close_form_addstudent').on('click', function() {//located in the forms itself
   $('#add_form_student').slideUp();
   $('#datatable_section').slideDown();
   $('#close_form_addstudent').hide();
});

$('#close_form_addschedule').on('click', function() {//located in the forms itself
   $('#add_form_schedule').slideUp();
   $('#datatable_section').slideDown();
   $('#close_form_addschedule').hide();
});


$('#search_student').on('click', function () {
  $.ajax({
      method:'POST',
      url:base_url + 'staff/search_student_number',
      data: {student_number: $('#student_number').val() },
      success:function(data){
        let json = JSON.parse(data);
       // console.log(json);

        $('#studentnumber').text(json.studentnumber);
        $('#fullname').text(json.lastname + ',' + ' ' + json.firstname + ' ' + json.middlename);
        $('#level').text(json.level);
        $('#year').text(json.year);
      },
      error: function (data) {
        console.log('ajax error');
      } // end of error

      }); // ajax
});

//remove student
$(document).on('click', '.remove_student', function() {
  //console.log('removing student');
  $.ajax({
    method:'POST',
    url:base_url + 'staff/classmanage_removestudent',
    data: {
      user_id: $(this).data('id'),
      section_id: $(this).data('section') 
    },
    success:function(data){
      console.log(data);
    },
    error: function (data) {
      console.log('ajax error');
    } // end of error

  }); // ajax
 $('#table_id_students').DataTable()
      .row( $(this).parents('tr') )
      .remove()
      .draw();
});

//remove schedule
$(document).on('click', '.remove_schedule', function() {
  //console.log('removing student');
  $.ajax({
    method:'POST',
    url:base_url + 'staff/classmanage_removeschedule',
    data: {
      row_id: $(this).data('id'),
      section_id: $(this).data('section') 
    },
    success:function(data){
      console.log(data);
    },
    error: function (data) {
      console.log('ajax error');
    } // end of error

  }); // ajax
 $('#table_id_schedules').DataTable()
      .row( $(this).parents('tr') )
      .remove()
      .draw();
});


 //$('.section_name').on('click', function(){ 
 	//console.log( $(this).data('name') );
 	//$('#exampleModalLongTitle').text( $(this).data('name') );

 	//NOTE: should show students added to the class only
 	 // $.ajax({
   //    method:'POST',
   //    url:base_url + 'staff/student_list',
   //    success:function(data){
   //      let json = JSON.parse(data);
   //      console.log(json);
   //      let students = $("#students ol");

   //      $.each(json, function() {
   //      	students.append( $("<li />").text(this.firstname) );
   //      });
   //    },
   //    error: function (data) {
   //      console.log('ajax error');
   //    } // end of error

   //    }); // ajax

 //});

 // $('#add_student').on('click', function() {
 // 	//ajax fetch students
 // 	console.log('Add student');
 // 	$('#students ol').append("<li>" +
 // 		"<select class='custom-select select_student'>" 
 // 			+  "<option selected>Open this select menu</option>"
 // 			+  "<option value='1'>One</option>"
 // 			+  "<option value='2'>Two</option>"
 // 			+  "<option value='3'>Three</option>"
 // 		+ "</select>" + "</li> <br>");

 // 	//save button
 // 	//close button to remove form
 // });

 // $('#add_subject').on('click', function() {
 // 	console.log('Add subject');
 // 	$('#subjects ol').append("<li>" +
 // 		"<select class='custom-select select_subject'>" 
 // 			+  "<option selected>Select Subject</option>"
 // 			+  "<option value='1'>One</option>"
 // 			+  "<option value='2'>Two</option>"
 // 			+  "<option value='3'>Three</option>"
 // 		+ "</select>" + "&nbsp; <button type='button' data-toggle='tooltip'" + 
 // 		"data-placement='right' title='Assign teacher' class='btn btn-primary assign_teacher'>" +
 // 	 "<i class='fa fa-arrow-right fa-1' aria-hidden='true'></i> </button> </li> <br>");

 // 		$('.assign_teacher').tooltip();
 // 	 // $('[data-toggle="tooltip"]').tooltip();

 // 	//save button
 // 	//close button to remove form
 // });

 // $(document).on('click', 'button.assign_teacher', function() {
 // 	console.log('asdna');
 // 	//this particular button should be disabled once the form on the teacher side appears
 // 	//remove disable when closing the input
 // });



// $('#add_class').on('click', function() {
//   $('#data_table').slideUp();
//   $('#add_form').slideDown();
//   $('#add_class').hide();
//   $('#goback').show();

//    $.ajax({
//       method:'POST',
//       url:base_url + 'staff/section_list',
//       success:function(data){
//         let json = JSON.parse(data);
//         console.log(json);
//         let section_name = $("#section_name");

//         $.each(json, function() {
//         	section_name.append( $("<option />").val(this.section_id).text(this.section_name) );
//         });
//       },
//       error: function (data) {
//         console.log('ajax error');
//       } // end of error

//       }); // ajax
// });

// $('#goback').on('click', function () {
// 	$('#data_table').slideDown();
// 	$('#add_form').slideUp();
// 	$('#edit_form').slideUp();
// 	$('#add_class').show();
// 	$('#goback').hide();
// });