<h1>Buses by Driver</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Bus ID</th>
        <th>Bus Name</th>
        <th>Capacity</th>
        <th>Shift Days</th>
        <th>Start Time</th>
        <th>End Time</th>
      </tr>
    </thead>
    <tbody>
  <?php
      while ($bus = $buses->fetch_assoc()) {
  ?>
     <tr>
       <td><?php echo $bus['bus_id']; ?></td>
        <td><?php echo $bus['bus_name']; ?></td>
       <td><?php echo $bus['capacity']; ?></td>
       <td><?php echo $bus['shift_days']; ?></td>
       <td><?php echo $bus['start_time']; ?></td>
       <td><?php echo $bus['end_time']; ?></td>
     </tr>     
  <?php
      }
  ?> 
    </tbody>
  </table>
</div>
