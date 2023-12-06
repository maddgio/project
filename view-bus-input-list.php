<select class="form-select" id="bid" name="bid">
  <?php
    while ($BusItem = $busList->fetch_assoc()) {
      $selText = "";
      if ($selectedBus == $BusItem['bus_id']) {
        $selText = " selected";
      }
  ?>
  <option value="<?php echo $BusItem['bus_id']; ?>"<?=$selText?>><?php echo $BusItem['bus_name']; ?></option>
  <?php
  }
  ?>
</select>
