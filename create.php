<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "test";

$conn = mysqli_connect($host, $user, $pass, $db);

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="ui container" id="main_container">
        <h1 class="ui header">
        Create User      <i class="ui user plus icon"></i>
        </h1>
   
        <form class="ui form" action="" method="post">

            <div class="field">
                <label>ID</label>
                <input required type="text" name="user_id">
            </div>
            <div class="field">
                <label>Name</label>
                <input required type="text" name="user_name">
            </div>



            <button class="ui primary button" type="submit" name="sb_btn">Create user</button>
        </form>
    </div>
</body>

</html>


<?php
if (isset($_POST['sb_btn'])) {
    $user_name = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    $sql2 = "INSERT INTO test_users VALUES('$user_id', '$user_name')";

    $res = mysqli_query($conn, $sql2);

    if ($res) {

        header("Location: index.php");

    } else {
        echo "<script>
            Swal.fire({
          title: 'Error!',
          text: 'User id already exists!',
          icon: 'error',
          confirmButtonText: 'Ok'
        })
        </script>
        ";
    }
}
?>