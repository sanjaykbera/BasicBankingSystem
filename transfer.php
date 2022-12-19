<?php
include("./connection.php");
$email = false;
$accountNo = false;
$success = false;
$err = false;

session_start();
if (!isset($_SESSION['userlogin'])) {
    header("location:verify.php");
}
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
if (isset($_GET['id'])) {
    $accountNo = $_GET['id'];
}


if (isset($_POST['submit'])) {
    $account = $_POST['account'];
    $amount = $_POST['amount'];

    $sqll = "SELECT * FROM `user_signin` WHERE `email` = '$email'";
    $resultt = mysqli_query($conn, $sqll);
    $roww = mysqli_fetch_assoc($resultt);
    $newbalance = (int)$roww['balance'];

    if ($newbalance > $amount) {
        $newbalanceis = (int)$roww['balance'] - (int)$amount;


        $sql = "SELECT * FROM `user_signin` WHERE `accountNo` = '$account'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($result);
            $balance = (int)$row['balance'] + (int)$amount;
            $sql = "UPDATE `user_signin` SET `balance` = '$balance' WHERE `accountNo` = '$account'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $sql = "UPDATE `user_signin` SET `balance` = '$newbalanceis' WHERE `email` = '$email'";
                $result = mysqli_query($conn, $sql);
                if ($result) {

                    $success = "Money transfered successfully to  " . $row['name'];
                }
            }
        } else {
            $err = "This account does not exist plcease check again";
        }
    } else {
        $err = "Insuffcient balance";
    }
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
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="full_body">
        <?php
        if ($success) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> ' . $success . '
  <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
        } else if ($err) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ' . $err . '
  <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
        }
        ?>
       <?php include("./header.php")?>
        <div class="spk">
            <div class="container mt-5">
                <p style="font-size: 2rem; font-weight: bold;" class="text-center">This is your bank account details</p>
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">SlNo.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">AccountNo</th>
                            <th scope="col">Balance</th>
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
                                $slno += 1;
                                echo '    <tr>
                                <th scope="row">' . $slno . '</th>
                                <td>' . $row['name'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['accountNo'] . '</td>
                                <td>' . $row['balance'] . '</td>
                                
                                
                                </tr>';
                            } else {

                                continue;
                            }
                        }
                        ?>


                    </tbody>
                </table>
            </div>
            <div class="container d-flex    justify-content-center align-items-center mt-5">
                <div class="signupContainerr">
                    <form method="POST" action="./transfer.php" style="width: 90%;">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">AccountNo</label>
                            <input type="text" name="account" value="<?php echo "$accountNo"; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">This is the account number of choosed account</div>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Amount</label>
                            <input name="amount" autocomplete="off" required type="text" class="form-control" id="exampleInputPassword1">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Transfer</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>