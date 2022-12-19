<?php
include("./connection.php");
$email = false;
session_start();
// if (!isset($_SESSION['userlogin'])) {
//     header("location:login.php");
// }
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BASIC BANK SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="full_body">
    <?php include("./header.php")?>
        <div class="spk">
            <div class="container mt-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">SlNo.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">AccountNo</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `user_signin` ORDER BY `id` asc ";
                        $result = mysqli_query($conn, $sql);
                        // $row = mysqli_fetch_assoc($result);
                        $slno = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['email'] == $email) {
                                continue;
                            } else {

                                $slno += 1;
                                echo '    <tr>
                            <th scope="row">' . $slno . '</th>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['accountNo'] . '</td>
                            <td>' . $row['balance'] . '</td>
                            <td><a href="./transfer.php?id=' . $row['accountNo'] . '"><button class="btn btn-success">View and Transfer</button></a></td>
                            
                            
                            </tr>';
                            }
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>