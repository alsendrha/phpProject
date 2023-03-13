<?php
// include = 연결 시켜주는거
include "../connection.php";

$sqlQuery = "SELECT user_id FROM user_board WHERE user_id";

$resultQuery = $connection->query($sqlQuery);

if ($resultQuery->num_rows > 0) {

    $boardRecord = array();
    while ($rowFound = $resultQuery->fetch_assoc()) {
        $boardRecord[] = $rowFound;
    }
    echo json_encode(array("success" => true, "boardData" => $boardRecord));
} else {
    echo json_encode(array("success" => false));
}
