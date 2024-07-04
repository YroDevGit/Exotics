<?php

include 'db_connect.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $date = $_POST['date'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $sql = "INSERT INTO expenses (date, descr, amount) VALUES (?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, 'ssd', $date, $description, $amount);

        if (mysqli_stmt_execute($stmt)) {

            echo json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {

            echo json_encode(["status" => "error", "message" => "Failed to insert record: " . mysqli_stmt_error($stmt)]);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to prepare statement: " . mysqli_error($conn)]);
    }

    mysqli_close($conn);

    exit;
}
?>
