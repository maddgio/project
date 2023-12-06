<h1>Shifts by Bus</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Bus Name</th>
        <th>Shift Days</th>
        <th>Start Time</th>
        <th>End Time</th>
      </tr>
    </thead>
    <tbody>
  <?php
      while ($shift = $shifts->fetch_assoc()) {
  ?>
     <tr>
        <td><?php echo $shift['bus_name']; ?></td>
       <td><?php echo $shift['shift_days']; ?></td>
       <td><?php echo $shift['start_time']; ?></td>
       <td><?php echo $shift['end_time']; ?></td>
     </tr>     
  <?php
      }
  ?> 
    </tbody>
  </table>
</div>
