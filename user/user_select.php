<?php
// include = 연결 시켜주는거
include "../connection.php";

$sqlQuery = "SELECT * FROM user_table";

$resultQuery = $connection->query($sqlQuery);

if ($resultQuery->num_rows > 0) {

    $boardRecord = array();
    while ($rowFound = $resultQuery->fetch_assoc()) {
    }
    echo json_encode(array("success" => true,));
} else {
    echo json_encode(array("success" => false));
}
