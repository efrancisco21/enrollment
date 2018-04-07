 $(document).ready( function () {
    $('#table_id').DataTable({
      "aaSorting": [],
      "scrollX": true
    });
  });

  $('#add_section').on('click', function() {
      $('#data_table').slideUp();
      $('#add_form').slideDown();
      $('#add_section').hide();
      $('#goback').show();

      for (i = new Date().getFullYear(); i > 2013; i--)
      {
        $('#schoolyear').append($('<option />').val(i).html(i));
      }
  });

  $('#goback').on('click', function () {
    $('#data_table').slideDown();
    $('#add_form').slideUp();
    $('#edit_form').slideUp();
    $('#add_section').show();
    $('#goback').hide();
  });

  $('#inputLevel').on('change', function() {
    if ( $('#inputLevel').val() == 'Grade School' ) {
      $('#inputYear').html(
        '<option value="">Select Year</option>' +
        '<option value="1">1</option>' +
        '<option value="2">2</option>' +
        '<option value="3">3</option>' +
        '<option value="4">4</option>' +
        '<option value="5">5</option>' +
        '<option value="6">6</option>' 
        );
    } else if ( $('#inputLevel').val() == 'High School' ) {
      $('#inputYear').html(
        '<option value="">Select Year</option>' +
        '<option value="1">1</option>' +
        '<option value="2">2</option>' +
        '<option value="3">3</option>' +
        '<option value="4">4</option>'
        );
    } else {
      $('#inputLevel').val("");
      $('#inputYear').val("");
    }
  });

  $('.edit_section').on('click', function() {
      for (i = new Date().getFullYear(); i > 2013; i--)
      {
        $('#edit_schoolyear').append($('<option />').val(i).html(i));
      }
      $.ajax({
      method:'POST',
      url:base_url + 'staff/section_info',
      data: {section_id: $(this).data('id') },
      success:function(data){
        var json = JSON.parse(data);

        let level = json.level;
        let year = json.year;

        $('#edit_section_name').val(json.section_name);
        $('#section_id').val(json.section_id);
        $('#edit_schoolyear').val(json.schoolyear);
        
        $('#data_table').slideUp();
        $('#edit_form').slideDown();
        $('#add_section').hide();//button
        $('#goback').show();

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

  $('.modal_trigger_disable').on('click', function () {
     var section_id = $(this).data('id');
     var status = $(this).data('status');
     console.log('getting the data...');
     $('.confirm').attr('id', 'disable_confirm');
     $('#enable_disable').text('Are you sure you want disable to this section?');
     $(".modal_confirmation .modal-footer #disable_confirm").val( section_id );
});

$('.modal_trigger_enable').on('click', function () {
     var section_id = $(this).data('id');
     var status = $(this).data('status');
     console.log('getting the data...');
     $('.confirm').attr('id', 'enable_confirm');
     $('#enable_disable').text('Are you sure you want to enable this section?');
     $(".modal_confirmation .modal-footer #enable_confirm").val( section_id );
});

$(document).on('click', '#disable_confirm', function() {
    console.log('disabling...');
    $.ajax({
      method:'POST',
      url:base_url + 'staff/disable_section',
      data: {section_id: $('#disable_confirm').val()},
      success:function(data){
        //console.log(data);
        if(data == 'success') {

          $('.modal_confirmation').modal('hide');
          $('#messages').html(
            '<hr> <div class="alert alert-primary" role="alert">Successfully disabled.</div>'
          );
              setTimeout( function () {
                  $(location).attr('href', base_url + 'staff/sections')
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
      url:base_url + 'staff/enable_section',
      data: {section_id: $('#enable_confirm').val()},
      success:function(data){
       // console.log(data);
        if(data == 'success') {
          $('.modal_confirmation').modal('hide');
          $('#messages').html(
            '<hr> <div class="alert alert-success" role="alert">Sucessfully activated.</div>'
          );
           setTimeout( function () {
                  $(location).attr('href', base_url + 'staff/sections')
          }, 1000 );
        }
      },
      error: function (data) {
        console.log('ajax error');
      } // end of error

      }); // ajax
  });
         