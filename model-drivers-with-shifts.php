<?php
function selectDrivers() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT driver_id, name, email FROM `Driver`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectBusesByDriver($did) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT s.shift_id, s.driver_id, b.bus_id, s.route_id, bus_name, capacity, shift_days, start_time, end_time FROM `Bus` b join Shift s on b.bus_id = s.bus_id where s.driver_id=?");
        $stmt->bind_param("i", $did);
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectDriversForInput() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT driver_id, name FROM `Driver` order by name");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectBusesForInput() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT bus_id, bus_name FROM `Bus` order by bus_name");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function selectRoutesForInput() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT route_id FROM `Route` order by route_id");
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
