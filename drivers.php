<?php
require_once("util-db.php");
require_once("model-drivers.php");
  
$pageTitle = "Drivers";
include "view-header.php";

if (isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            if (insertDrivers($_POST['dName'], $_POST['dEmail'])) {
                echo '<div class="alert alert-success" role="alert">Driver Added.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error.</div>';
            }
            break;
        case "Edit":
            if (updateDrivers($_POST['dName'], $_POST['dEmail'], $_POST['did'])) {
                echo '<div class="alert alert-success" role="alert">Driver Edited.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error.</div>';
            }
            break;
        case "Delete":
            if (deleteDrivers($_POST['did'])) {
                echo '<div class="alert alert-success" role="alert">Driver Deleted.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error.</div>';
            }
            break;
    }
}


$drivers = selectDrivers();
include "view-drivers.php";
include "view-footer.php";
?>
