 $(document).ready( function () {
    $('#table_id').DataTable({
      "aaSorting": [],
      "scrollX": true
    });
  });

//console.log('payments js');
$(document).ready(function() {
 for (i = new Date().getFullYear(); i > 2013; i--)
      {
        $('#schoolyear').append($('<option />').val(i).html(i));
      }
});
$(function () {
  $('[data-toggle="popover"]').popover()
})

$('#search_student').on('click', function () {
  $.ajax({
      method:'POST',
      url:base_url + 'staff/search_student_number',
      data: {student_number: $('#student_number').val() },
      success:function(data){
     	//console.log(data);
     	if (data != 'fail'){
     		let json = JSON.parse(data);


     		$('#studentnumber').text(json.studentnumber);
     		$('#lastname').text(json.lastname);
     		$('#firstname').text(json.firstname);
     		$('#middlename').text(json.middlename);
     		$('#level').text(json.level);
     		$('#year').text(json.year);
     		$('#payment_status').text(json.is_paid);

        $('#error_message_studentnum').removeClass("alert alert-danger").text(' ');
     	} else {
        $('#studentnumber').text(' ');
        $('#lastname').text(' ');
        $('#firstname').text(' ');
        $('#middlename').text(' ');
        $('#level').text(' ');
        $('#year').text(' ');
        $('#payment_status').text(' ');
        $('#error_message_studentnum').addClass("alert alert-danger").text('Error finding student');
      }
      },
      error: function (data) {
        console.log('ajax error');
      } // end of error

      }); // ajax
});


$('#transaction_radios').on('change', function() {
	if( $('input[name=transaction]:checked').val() == 'cash' ) {
		$('#cash_form').show();
		$('#credit_form').hide();
    $('#check_form').hide();

    
	} else if ( $('input[name=transaction]:checked').val() == 'credit_card' ) {
		$('#credit_form').show();
		$('#cash_form').hide();
    $('#check_form').hide();
	} else if ( $('input[name=transaction]:checked').val() == 'cheque' ) {
    $('#check_form').show();
    $('#credit_form').hide();
    $('#cash_form').hide();
  }
});

// $('#payment_type_radios').on('change', function() {
//   console.log ( $('input[name=payment_type]:checked').val() );
// });
