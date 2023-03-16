<?php
// include = 연결 시켜주는거
include "../connection.php";

$personTitle = $_POST["person_title"];
$personWriter = $_POST["person_writer"];
$personContent = $_POST["person_content"];


$sqlQuery = "INSERT INTO person_board SET person_title = '$personTitle', person_writer = '$personWriter',
 person_content = '$personContent'";

$resultQuery = $connection->query($sqlQuery);

if ($resultQuery) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
