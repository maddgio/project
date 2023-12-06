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

function insertDrivers($dName, $dEmail) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `Driver` (`name`, `email`) VALUES (?, ?)");
        $stmt->bind_param("ss", $dName, $dEmail);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function updateDrivers($dName, $dEmail, $did) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `Driver` SET `name` = ?, `email` = ? WHERE `Driver`.`driver_id` = ?");
        $stmt->bind_param("ssi", $dName, $dEmail, $did);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deleteDrivers($did) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from `Driver` where driver_id = ?");
        $stmt->bind_param("i", $did);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
