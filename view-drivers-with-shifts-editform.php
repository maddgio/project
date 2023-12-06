<!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editShiftModal<?php echo $bus['shift_id']; ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
    </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="editShiftModal<?php echo $bus['shift_id']; ?>" tabindex="-1" aria-labelledby="editShiftModalLabel<?php echo $bus['shift_id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editShiftModalLabel<?php echo $bus['shift_id']; ?>">Edit Shift</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="mb-3">
            <label for="did<?php echo $bus['shift_id']; ?>" class="form-label">Driver ID</label>
            <?php
                $driverList = selectDriversForInput();
                $selectedDriver = $bus['driver_id'];
                include "view-driver-input-list.php";
            ?>
          </div>
          <div class="mb-3">
            <label for="bid<?php echo $bus['shift_id']; ?>" class="form-label">Bus ID</label>
            <?php
                $busList = selectBusesForInput();
                $selectedBus = $bus['bus_id'];
                include "view-bus-input-list.php";
            ?>
          </div>
          <div class="mb-3">
            <label for="rid<?php echo $bus['shift_id']; ?>" class="form-label">Route ID</label>
            <input type="text" class="form-control" id="rid<?php echo $bus['shift_id']; ?>" name="rid" value="<?php echo $bus['route_id']; ?>">
          </div>
          <div class="mb-3">
            <label for="sDays<?php echo $bus['shift_id']; ?>" class="form-label">Shift Days</label>
            <input type="text" class="form-control" id="sDays<?php echo $bus['shift_id']; ?>" name="sDays" value="<?php echo $bus['shift_days']; ?>">
          </div>
            <div class="mb-3">
            <label for="sStart<?php echo $bus['shift_id']; ?>" class="form-label">Start Time</label>
            <input type="text" class="form-control" id="sStart<?php echo $bus['shift_id']; ?>" name="sStart" value="<?php echo $bus['start_time']; ?>">
          </div>
          <div class="mb-3">
            <label for="sEnd<?php echo $bus['shift_id']; ?>" class="form-label">End Time</label>
            <input type="text" class="form-control" id="sEnd<?php echo $bus['shift_id']; ?>" name="sEnd" value="<?php echo $bus['end_time']; ?>">
          </div>
            <input type="hidden" name="sid" value="<?php echo $bus['shift_id']; ?>">
            <input type="hidden" name="actionType" value="Edit2">
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
