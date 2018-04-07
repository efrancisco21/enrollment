 $(document).ready( function () {
    $('#table_id').DataTable({
      "aaSorting": [],
      "scrollX": true
    });
  });

   $('#add_staff').on('click', function() {
      $('#data_table').slideUp();
      $('#add_form').slideDown();
      $('#add_staff').hide();
      $('#goback').show();
  });

   $('#goback').on('click', function () {
    $('#data_table').slideDown();
    $('#add_form').slideUp();
    $('#edit_form').slideUp();
    $('#add_staff').show();
    $('#goback').hide();
  });

    $('.edit_staff').on('click', function() {
      $.ajax({
      method:'POST',
      url:base_url + 'staff/staff_info',
      data: {admin_id: $(this).data('id') },
      success:function(data){
        var json = JSON.parse(data);

        $('#admin_id').val(json.admin_id);
        $('#edit_lastname').val(json.lastname);
        $('#edit_firstname').val(json.firstname);
        $('#edit_middlename').val(json.middlename);
        $('#edit_username').val(json.username);
        $('#edit_role').val(json.role);

        $('#data_table').slideUp();
        $('#edit_form').slideDown();
        $('#add_staff').hide();
        $('#goback').show();
    	
      },
      error: function (data) {
        console.log('ajax error');
      } // end of error

      }); // ajax
  });

$('.modal_trigger_disable').on('click', function () {
	var admin_id = $(this).data('id');
	var status = $(this).data('status');
	console.log('getting the data...');
	$('.confirm').attr('id', 'disable_confirm');
	$('#enable_disable').text('Are you sure you want disable to this account?');
	$(".modal_confirmation .modal-footer #disable_confirm").val( admin_id );
});

$('.modal_trigger_enable').on('click', function () {
	var admin_id = $(this).data('id');
	var status = $(this).data('status');
	console.log('getting the data...');
	$('.confirm').attr('id', 'enable_confirm');
	$('#enable_disable').text('Are you sure you want to enable this account?');
	$(".modal_confirmation .modal-footer #enable_confirm").val( admin_id );
});

$(document).on('click', '#disable_confirm', function() {
    console.log('disabling...');
    $.ajax({
      method:'POST',
      url:base_url + 'staff/disable_staff',
      data: {admin_id: $('#disable_confirm').val()},
      success:function(data){
        //console.log(data);
        if(data == 'success') {

          $('.modal_confirmation').modal('hide');
          $('#messages').html(
            '<hr> <div class="alert alert-primary" role="alert">Successfully disabled.</div>'
          );
              setTimeout( function () {
                  $(location).attr('href', base_url + 'staff/staff_list')
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
      url:base_url + 'staff/enable_staff',
      data: {admin_id: $('#enable_confirm').val()},
      success:function(data){
       // console.log(data);
        if(data == 'success') {
          $('.modal_confirmation').modal('hide');
          $('#messages').html(
            '<hr> <div class="alert alert-success" role="alert">Sucessfully activated.</div>'
          );
           setTimeout( function () {
                  $(location).attr('href', base_url + 'staff/staff_list')
          }, 1000 );
        }
      },
      error: function (data) {
        console.log('ajax error');
      } // end of error

      }); // ajax
  });

