<?php
function selectRoutes() {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT route_id, origin, destination FROM `Route`");
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();
        return $result;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function insertRoutes($rOrigin, $rDestination) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("INSERT INTO `Route` (`origin`, `destination`) VALUES (?, ?)");
        $stmt->bind_param("ss", $rOrigin, $rDestination);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function updateRoutes($rOrigin, $rDestination, $rid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("UPDATE `Route` SET `origin` = ?, `destination` = ? WHERE `Route`.`route_id` = ?");
        $stmt->bind_param("ssi", $rOrigin, $rDestination, $rid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}

function deleteRoutes($rid) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("delete from `Route` where route_id = ?");
        $stmt->bind_param("i", $rid);
        $success = $stmt->execute();
        $conn->close();
        return $success;
    } catch (Exception $e) {
        $conn->close();
        throw $e;
    }
}
?>
