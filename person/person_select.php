<?php
// include = 연결 시켜주는거
include "../connection.php";

$sqlQuery = "SELECT * FROM person_board ORDER BY person_id DESC";

$resultQuery = $connection->query($sqlQuery);

if ($resultQuery->num_rows > 0) {

    $personRecord = array();
    while ($rowFound = $resultQuery->fetch_assoc()) {
        $personRecord[] = $rowFound;
    }
    echo json_encode(array("success" => true, "personData" => $personRecord));
} else {
    echo json_encode(array("success" => false));
}
