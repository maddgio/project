<?php
function get_db_connection(){
    // Create connection
    $conn = new mysqli('159.89.47.44', 'dlaminio_HW3User', 'f[%-^fW[xWx]', 'dlaminio_HW3');
    
    // Check connection
    if ($conn->connect_error) {
      return false;
    }
    return $conn;
}
?>
