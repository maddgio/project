<?php
require_once("util-db.php");
require_once("model-buses-by-driver.php");
  
$pageTitle = "Buses by Driver";
include "view-header.php";
$buses = selectBusesByDriver($_GET['id']);
include "view-buses-by-driver.php";
include "view-footer.php";
?>
