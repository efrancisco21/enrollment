 $(document).ready( function () {
    $('#table_id').DataTable({
      "aaSorting": [],
      "scrollX": true
      // dom: 'Bfrtip',
      // buttons: [
      //     'print'
      // ]
    });
  });

 $('#class_list_view').on('click', function() {
 	$('#data_table').removeClass( "Active" );
    $('#classlist').addClass( "Active" );
 	//$('#goback').show();
 });

 $('#goback').on('click', function() {
 	$('#data_table').addClass( "Active" );
    $('#classlist').removeClass( "Active" );
 	//$('#goback').hide();
 });

 $("#save_grades").on('click', function() {
   //console.log('save');
 	let studentnum_array = [];
 	//console.log( $(this).data('schoolyear') );
 	 $("table tbody tr").each(function (index) {
 	 	studentnum_array.push( {"studentnumber": $(this).find('td.studentnumber').text(),
 	 		"grade": $(this).find('select.grade').val() } );
    });

 	//console.log( studentnum_array );

 	$.ajax({
      method:'POST',
      url:base_url + 'staff/save_grades',
      data: {
      	studentnumber: studentnum_array,
    	subject_id: $('#subject_id').val(),
    	section_id: $('#section_id').val(),
      	schoolyear: $(this).data('schoolyear')
      },
      success:function(data){
      	//console.log( JSON.parse(data) );
      	if(data == 'success') {
      	$('#messages').html(
            '<hr> <div class="alert alert-success" role="alert">Sucessfully saved grades.</div>'
          );
           setTimeout( function () {
                  $(location).attr('href', base_url + 'staff/class_list')
          }, 1000 );
      	}
      },
      error: function (data) {
        console.log('ajax error');
      } // end of error

      }); // ajax
 });

 // $("#print_grade").on('click', function() {
 //  console.log( $(this).data('sectionname') );
 //
 //  $('#data_table').printThis({
 //    header: "<h1>" + $(this).data('sectionname') + '-' + $(this).data('schoolyear') + '-' + $(this).data('subjectname') + "</h1>"
 //  });
 // });

 // $('.view_student_list').on('click', function() {
 // 	 $.ajax({
 //      method:'POST',
 //      url:base_url + 'staff/class_list_view',
 //      data: {section_id: $(this).data('id')},
 //      success:function(data){
 //      	let json = JSON.parse(data);
 //       console.log(json);
 //      },
 //      error: function (data) {
 //        console.log('ajax error');
 //      } // end of error

 //      }); // ajax
 // });
