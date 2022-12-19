<?php
include("./connection.php");

$success = false;
$err = false;



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $pass = password_hash($password, PASSWORD_BCRYPT);
    // $token = bin2hex(random_bytes(11));
    // $myaccount = "GRIP" . $token;
    $num0 = (rand(10,100));
    $num1 = date("Ymd");
    $num2 = (rand(100,1000));
    $num3 = time();
    $randnum = $num0 . $num1 . $num2 . $num3;

    $sql = "SELECT * FROM `user_signin` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num > 0) {
        $err = "This email already registered😬";
    } else {

        if ($password === $cpassword) {


            $sql  = "INSERT INTO `user_signin` (`id`, `email`, `name`, `password`, `accountNo`,`balance`) VALUES (NULL, '$email', '$name', '$pass', '$randnum','1000')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                session_start();
                $_SESSION['msgg'] = "Successfully Registered";
                header('location:login.php');
            } else {
                $err = "Something went wrong❌";
            }
        } else {
            $err = "Passwords do not matches😂";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>BASIC BANK SYSTEM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="full_body">
    <?php include("./header.php")?>
        <div class="spkl">
            <div class="signupContainer">
                <form action="./signup.php" method="POST" style="width: 90%;">
                    <?php
                    if ($success) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You registered successifully😍
  <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
                    } else if ($err) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ' . $err . '
  <button type="button" style="height: 25px; width: 25px;z-index: 100; " class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>';
                    }
                    ?>
                    <p style="font-size: 2rem;" class="text-center">Create Account</p>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input required type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail11" class="form-label">Name</label>
                        <input required type="name" name="name" class="form-control" id="exampleInputEmail11" aria-describedby="emailHelp">
                    </div>
                    <div class="row">

                        <div class="mb-3 col-6">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputPassword11" class="form-label">Confirm password</label>
                            <input name="cpassword" type="password" class="form-control" id="exampleInputPassword11">
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-info" name="submit" type="submit">Create Now</button>
                        <p>You have already an account? <a href="verify.php">Click Here for verify</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 6000);
    </script>
</body>

</html>