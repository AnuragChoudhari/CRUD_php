<?php
 $host = "localhost";
 $user = "root";
 $pass = "";
 $db = "test";

 $conn = mysqli_connect($host, $user, $pass, $db);
?>


<?php
if (isset($_GET['edit_btn'])) {
    $editBtnValue = $_GET['edit_btn'];
    header("Location: edit.php?q=" . urlencode($editBtnValue));
    exit();
}
?>

<?php
if (isset($_GET['del_btn'])) {
    $delBtnValue = $_GET['del_btn'];



        $sql3 = "DELETE FROM test_users WHERE id='$delBtnValue'";
        $res3 = mysqli_query($conn,$sql3);
        if($res3){
            echo "True";
            header("Location: index.php");
            exit();
        }
        else{
            echo "False";
        }
    


}
?>