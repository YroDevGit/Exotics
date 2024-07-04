<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Please enter both username and password!";
    } else {
        $sql = "SELECT user_id, status FROM user WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

       
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $user_id = $row['user_id'];
                $status = $row['status'];


                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['status'] = $row['status'];

                    if ($status == 'beta_tester') {
                      echo json_encode(["status"=> "success", "route"=>"index.php"]);
                      exit;
                    } else{
                      echo json_encode(["status"=> "success", "route"=>"user/index.php"]);
                      exit;
                    }
                    exit();
                  } else {
                   echo json_encode(["status"=> "error", "message"=>"Invalid username or password"]);
                   exit;
                  }
                }
              }
?>