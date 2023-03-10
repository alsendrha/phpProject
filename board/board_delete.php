<?php
include "../connection.php";

$boardId = $_POST["board_id"];

// SQL 쿼리 생성
$sqlQuery = "DELETE FROM user_board WHERE board_id = '$boardId'";

$resultQuery = $connection->query($sqlQuery);

// 결과 확인
if ($resultQuery === TRUE) {
    echo "success";
} else {
    echo "Error deleting record: " . $connection->error;
}
