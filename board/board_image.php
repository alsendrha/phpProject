<?php
include '../connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {

    $boardTitle = $_POST["board_title"];
    $boardWriter = $_POST["board_writer"];
    $boardContent = $_POST["board_content"];

    // Check if file exists
    if (isset($_FILES['image'])) {
        $file_error = $_FILES['image']['error'];
        if ($file_error === 0) {
            // 파일 업로드 코드
        } else {
            echo json_encode(array("success" => false));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "No file uploaded"));
        exit();
    }

    $file_error = $_FILES['image']['error'];
    if ($file_error === 0) {
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];


        $image_path = 'uploads/' . $file_name;
        move_uploaded_file($file_temp, $image_path);

        $sqlQuery = "INSERT INTO user_board SET board_title = '$boardTitle', board_writer = '$boardWriter',
                    board_content = '$boardContent', image_path = '$image_path', date = NOW()";
        mysqli_query($connection, $sqlQuery);

        if (mysqli_affected_rows($connection) > 0) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    } else {
        echo json_encode(array("success" => false));
    }
}
