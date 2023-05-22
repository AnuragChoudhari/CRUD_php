<?php
 $host = "localhost";
 $user = "root";
 $pass = "";
 $db = "test";

 $conn = mysqli_connect($host, $user, $pass, $db);
?>


<?php

    $delBtnValue = $_GET['del_btn'];



        $sql3 = "DELETE FROM test_users WHERE id='$delBtnValue'";
        $res3 = mysqli_query($conn,$sql3);
        if($res3){
            echo "True";
        
        }
        else{
            echo "False";
        }
    


?>