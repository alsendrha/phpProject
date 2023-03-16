<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $personTitle = $_POST["person_title"];
    $writerId = $_POST["writer_id"];
    $personWriter = $_POST["person_writer"];
    $userProfile = $_POST["user_profile"];
    $personContent = $_POST["person_content"];
    $personLatitude = $_POST["person_latitude"];
    $personLongitude = $_POST["person_longitude"];


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

    $sqlQuery = "INSERT INTO person_board SET person_title = '$personTitle', writer_id = '$writerId', person_writer = '$personWriter', user_profile = '$userProfile',
                person_content = '$personContent', person_latitude = '$personLatitude', person_longitude = '$personLongitude'";
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
