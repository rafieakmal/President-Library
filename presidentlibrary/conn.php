<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "preslibrary";

    $conn = mysqli_connect($server, $user, $pass, $db_name);

    if (!$conn) {
        die("Failed to connect. Reason: " . mysqli_connect_error());
    }
?>