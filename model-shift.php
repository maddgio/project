<?php
function selectShifts() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT shift_id, driver_id, bus_id, shift_days, start_time, end_time FROM `Shift`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertShifts($did, $bid, $rid, $sDays, $sStart, $sEnd) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `Shift` (`driver_id`, `bus_id`, `route_id`, `shift_days`, `start_time`, `end_time` ) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiisss", $did, $bid, $rid, $sDays, $sStart, $sEnd);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function updateShifts($did, $bid, $rid, $sDays, $sStart, $sEnd, $sid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `Shift` SET `driver_id` = ?, `bus_id` = ?, `route_id` = ?, `shift_days` = ?, `start_time` = ?, `end_time` = ?  WHERE `Shift`.`shift_id` = ?");
        $stmt->bind_param("iiisssi", $did, $bid, $rid, $sDays, $sStart, $sEnd, $sid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deleteShifts($sid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from `Shift` where shift_id = ?");
        $stmt->bind_param("i", $sid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
