<?php
require_once("util-db.php");
require_once("model-buses.php");
  
$pageTitle = "Buses";
include "view-header.php";

if (isset($_POST['actionType'])) {
    switch ($_POST['actionType']) {
        case "Add":
            if (insertBuses($_POST['bName'], $_POST['bCapacity'])) {
                echo '<div class="alert alert-success" role="alert">Bus Added.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error.</div>';
            }
            break;
        case "Edit":
            if (updateBuses($_POST['bName'], $_POST['bCapacity'], $_POST['bid'])) {
                echo '<div class="alert alert-success" role="alert">Bus Edited.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error.</div>';
            }
            break;
        case "Delete":
            if (deleteBuses($_POST['bid'])) {
                echo '<div class="alert alert-success" role="alert">Bus Deleted.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error.</div>';
            }
            break;
    }
}

$buses = selectBuses();
include "view-buses.php";
include "view-footer.php";
?>
