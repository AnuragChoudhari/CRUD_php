<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "test";

    $conn = mysqli_connect($host, $user, $pass, $db);
    $q = mysqli_real_escape_string($conn, $_REQUEST["q"]);

    $sql = "SELECT * FROM test_users WHERE id='$q' ";
   
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_array($res)) {
            echo $row['id'] . $row['name'];
        }
    } else {
        echo "No data found! (Please enter a number)";
    }


?>