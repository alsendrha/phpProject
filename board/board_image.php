<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $boardTitle = $_POST["board_title"];
    $boardWriter = $_POST["board_writer"];
    $boardContent = $_POST["board_content"];

    // Check if file exists
    if (isset($_FILES['image'])) {
        $file_error = $_FILES['image']['error'];
        if ($file_error === 0) {
            $file_name = $_FILES['image']['name'];
            $file_temp = $_FILES['image']['tmp_name'];
            $file_size = $_FILES['image']['size'];
            $image_path = 'uploads/' . $file_name;
            move_uploaded_file($file_temp, $image_path);
        } else {
            echo json_encode(array("success" => false));
            exit();
        }
    }

    $sqlQuery = "INSERT INTO user_board SET board_title = '$boardTitle', board_writer = '$boardWriter',
                board_content = '$boardContent'";
    if (isset($image_path)) {
        $sqlQuery .= ", image_path = '$image_path'";
    }
    $sqlQuery .= ", date = NOW()";

    mysqli_query($connection, $sqlQuery);

    if (mysqli_affected_rows($connection) > 0) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false));
    }
}
