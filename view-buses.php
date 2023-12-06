<div class="row">
  <div class="col">
    <h1>Buses</h1>
  </div>
  <div class="col-auto">
    <?php
    include "view-buses-newform.php";
    ?>
  </div>
</div>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Bus ID</th>
        <th>Bus Name</th>
        <th>Capacity</th>
        <th></th>
        <th></th>
        <th></th>
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
       <td>
         <?php
         include "view-buses-editform.php";
         ?>
       </td>
       <td>
         <form method="post" action="">
           <input type="hidden" name="bid" value="<?php echo $bus['bus_id']; ?>">
           <input type="hidden" name="actionType" value="Delete">
            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?');">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
              </svg>
            </button>
          </form>
       </td>
       <td>
         <form method="post" action="shifts-by-bus.php">
           <input type="hidden" name="bid" value="<?php echo $bus['bus_id']; ?>">
            <button type="submit" class="btn btn-primary">Schedule</button>
          </form>
       </td>
     </tr>     
  <?php
      }
  ?> 
    </tbody>
  </table>
</div>
