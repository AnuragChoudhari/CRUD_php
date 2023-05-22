<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "test";

$conn = mysqli_connect($host, $user, $pass, $db);
$q = mysqli_real_escape_string($conn, $_REQUEST["q"]);

$sql = "SELECT * FROM test_users WHERE id='$q'";
$res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js" integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css" integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
    <div class="ui container" id="main_container">
        <h1 class="ui header">
            Edit User
        </h1>
        <form class="ui form" action="" method="post">
            <?php
            while ($row = mysqli_fetch_array($res)) {
                ?>
                <div class="field">
                    <label>ID</label>
                    <input type="text" name="user_id" value="<?php echo $row['id']; ?>" disabled>
                </div>
                <div class="field">
                    <label>Name</label>
                    <input type="text" name="user_name" value="<?php echo $row['name']; ?>">
                </div>
                <?php

            }
            ?>
             <button class="ui button" type="submit" name="sb_btn">Submit</button>
        </form>
    </div>
</body>

</html>

<?php
    if(isset($_POST['sb_btn'])){
        $edited_uname = $_POST['user_name'];
        $user_id = $_POST['user_id'];
        $sql2 = "UPDATE test_users SET name='$edited_uname' WHERE id='$q'";

        $res = mysqli_query($conn, $sql2);

        if($res){
            header("Location: index.php");
        }
        else{
            echo "Cant Update!";
        }

    }
?>