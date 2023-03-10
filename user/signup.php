<?php
// include = 연결 시켜주는거
include "../connection.php";

$userName = $_POST["user_name"];
$userEmail = $_POST["user_email"];
$userNickName = $_POST["user_nickname"];
// md5 식별불가 바이너리 포맷으로 변환
$userPassword = md5($_POST["user_password"]);

$sqlQuery = "INSERT INTO user_table SET user_name = '$userName', user_email = '$userEmail', user_password = '$userPassword', user_nickname = '$userNickName'";

$resultQuery = $connection->query($sqlQuery);

if ($resultQuery) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
