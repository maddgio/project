<?php
function selectBusesByDriver($did) {
    try {
        $conn = get_db_connection();
        $stmt = $conn->prepare("SELECT b.bus_id, bus_name, capacity, shift_days, start_time, end_time FROM `Bus` b join Shift s on b.bus_id = s.bus_id where s.driver_id=?");
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
?>
