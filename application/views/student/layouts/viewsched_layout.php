 <table class="table table-striped" id="thetable">
  <thead>
    <tr>
      <th>Subject</th>
      <th>Days</th>
      <th>Time</th>
      <th>Room</th>
      <th>Teacher</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($sched as $key){ ?>
               
                  
                    <tr>
                      <td><?php echo $key->subject_name; ?></td>
                      <td><?php echo $key->days; ?></td>
                      <td><?php echo $key->time; ?></td>
                      <td><?php echo $key->room; ?></td>
                      <td><?php echo $key->lastname.','.$key->firstname.' '.$key->middlename; ?></td>
                    </tr>
                
<?php } ?>

                  </tbody>
</table>