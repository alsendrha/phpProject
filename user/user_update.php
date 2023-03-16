<?php
// include = 연결 시켜주는거
include "../connection.php";

// HTTP 요청에서 전달된 JSON 데이터를 읽어옴
$json = file_get_contents('php://input');

// JSON 데이터를 PHP 배열로 변환
$data = json_decode($json, true);

// 게시글 번호, 제목, 내용을 추출
$userId = $data["user_id"];
$userNickname = $data["user_nickname"];
// $userPassword = md5($data["user_password"]);

// UPDATE 쿼리 실행
$sqlQuery = "UPDATE user_table SET  user_nickname = '$userNickname' WHERE user_id = $userId";
$resultQuery = $connection->query($sqlQuery);

// 쿼리 실행 결과를 클라이언트에게 반환
if ($resultQuery) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
