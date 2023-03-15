<?php
// include = 연결 시켜주는거
include "../connection.php";

$userEmail = $_POST["user_email"];

$sqlQuery = "SELECT * FROM user_table WHERE user_email = '$userEmail'";

$resultQuery = $connection->query($sqlQuery);

if ($resultQuery->num_rows > 0) {

    $userRecord = array();
    while ($rowFound = $resultQuery->fetch_assoc()) {
        $userRecord[] = $rowFound;
    }
    echo json_encode(array("success" => true, "userData" => $userRecord));
} else {
    echo json_encode(array("success" => false));
}
