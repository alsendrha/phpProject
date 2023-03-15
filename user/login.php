<?php
// include = 연결 시켜주는거
include "../connection.php";


$userEmail = $_POST["user_email"];
$userPassword = md5($_POST["user_password"]);
$userCode = $_POST["user_code"];

$sqlQuery = "SELECT * FROM user_table WHERE user_email = '$userEmail' AND user_password = '$userPassword' AND user_code = '$userCode'";

$resultQuery = $connection->query($sqlQuery);

if ($resultQuery->num_rows > 0) {

    $userRecord = array();
    while ($rowFound = $resultQuery->fetch_assoc()) {
        $userRecord[] = $rowFound;
    }
    echo json_encode(array("success" => true, "userData" => $userRecord[0]));
} else {
    echo json_encode(array("success" => false));
}
