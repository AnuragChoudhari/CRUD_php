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
    <title>CRUD operation</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js" integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css" integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
    <div class="ui container" id="main_container">
        <h1 class="ui header">CRUD Operations</h1>
        <a href="create.php">Create User</a>
        <div id="table_container">
            <form action="edit_redirect.php" method="get">
                <table class="ui celled table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Edit User</th>
                            <th>Delete User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       

                        $sql = "SELECT * FROM test_users GROUP BY id ASC;";

                        $res = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_array($res)) {
                        ?>
                                <tr>
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["name"] ?></td>
                                    <td><button id="edit_btn" name="edit_btn" value="<?php echo $row['id']; ?>"><i class="ui edit icon"></i></button></td>
                                    <td><button id="del_btn" name="del_btn" value="<?php echo $row['id']; ?>"><i class="ui delete icon"></i></button></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "No data found! (Please enter a number)";
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>
</html>





