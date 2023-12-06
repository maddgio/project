<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newShiftModal">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
      <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
    </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="newShiftModal" tabindex="-1" aria-labelledby="newShiftModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="newShiftModalLabel">New Shift</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="mb-3">
            <label for="did" class="form-label">Driver ID</label>
            <?php
                $driverList = selectDriversForInput();
                $selectedDriver = 0;
                include "view-driver-input-list.php";
            ?>
          </div>
          <div class="mb-3">
            <label for="bid" class="form-label">Bus ID</label>
            <?php
                $busList = selectBusesForInput();
                $selectedBus = 0;
                include "view-bus-input-list.php";
            ?>
          </div>
          <div class="mb-3">
            <label for="rid" class="form-label">Route ID</label>
            <input type="text" class="form-control" id="rid" name="rid">
          </div>
          <div class="mb-3">
            <label for="sDays" class="form-label">Shift Days</label>
            <input type="text" class="form-control" id="sDays" name="sDays">
          </div>
          <div class="mb-3">
            <label for="sStart" class="form-label">Start Time</label>
            <input type="text" class="form-control" id="sStart" name="sStart">
          </div>
          <div class="mb-3">
            <label for="sEnd" class="form-label">End Time</label>
            <input type="text" class="form-control" id="sEnd" name="sEnd">
          </div>
            <input type="hidden" name="actionType" value="Add2">
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
