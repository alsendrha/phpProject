<?php
// include = 연결 시켜주는거
include "../connection.php";

$boardTitle = $_POST["board_title"];
$boardWriter = $_POST["board_writer"];
$boardContent = $_POST["board_content"];


$sqlQuery = "INSERT INTO user_board SET board_title = '$boardTitle', board_writer = '$boardWriter', board_content = '$boardContent', date = NOW()";

$resultQuery = $connection->query($sqlQuery);

if ($resultQuery) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
