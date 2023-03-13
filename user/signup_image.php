<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST["user_name"];
    $userEmail = $_POST["user_email"];
    $userNickName = $_POST["user_nickname"];
    // md5 식별불가 바이너리 포맷으로 변환
    $userPassword = md5($_POST["user_password"]);

    // Check if file exists
    if (isset($_FILES['image'])) {
        $file_error = $_FILES['image']['error'];
        if ($file_error === 0) {
            $file_name = $_FILES['image']['name'];
            $file_temp = $_FILES['image']['tmp_name'];
            $file_size = $_FILES['image']['size'];
            $user_image = 'profile/' . $file_name;
            move_uploaded_file($file_temp, $user_image);
        } else {
            echo json_encode(array("success" => false));
            exit();
        }
    }

    $sqlQuery = "INSERT INTO user_table SET user_name = '$userName', user_email = '$userEmail', user_password = '$userPassword', user_nickname = '$userNickName'";
    if (isset($user_image)) {
        $sqlQuery .= ", user_image = '$user_image'";
    }
    $sqlQuery .= ", date = NOW()";

    mysqli_query($connection, $sqlQuery);

    if (mysqli_affected_rows($connection) > 0) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false));
    }
}
