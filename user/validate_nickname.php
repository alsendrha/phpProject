<?php
// include = 연결 시켜주는거
include "../connection.php";

$userNickname = $_POST["user_nickname"];

$sqlQuery = "SELECT * FROM user_table WHERE user_nickname = '$userNickname'";

$resultQuery = $connection->query($sqlQuery);

if ($resultQuery->num_rows > 0) {
    echo json_encode(array("existNickname" => true));
} else {
    echo json_encode(array("existNickname" => false));
}
