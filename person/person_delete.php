<?php
include "../connection.php";

$personId = $_POST["person_id"];

// SQL 쿼리 생성
$sqlQuery = "DELETE FROM person_board WHERE person_id = '$personId'";

$resultQuery = $connection->query($sqlQuery);

// 결과 확인
if ($resultQuery === TRUE) {
    echo "success";
} else {
    echo "Error deleting record: " . $connection->error;
}
