<select class="form-select" id="did" name="did">
  <?php
    while ($DriverItem = $driverList->fetch_assoc()) {
      $selText = "";
      if ($selectedDriver == $DriverItem['driver_id']) {
        $selText = " selected";
      }
  ?>
  <option value="<?php echo $DriverItem['driver_id']; ?>"<?=$selText?>><?php echo $DriverItem['name']; ?></option>
  <?php
  }
  ?>
</select>
