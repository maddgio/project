<?php
require_once("util-db.php");
require_once("model-shifts-by-bus.php");
  
$pageTitle = "Shifts by Bus";
include "view-header.php";
$shifts = selectShiftsByBus($_POST['bid']);
include "view-shifts-by-bus.php";
include "view-footer.php";
?>
