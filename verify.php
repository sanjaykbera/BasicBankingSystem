<?php
include("./connection.php");
$myMsg = false;
session_start();


if (isset($_SESSION['msgg'])) {
    $myMsg = $_SESSION['msgg'];
} else if (isset($_SESSION['warningg'])) {
    $myMsg = $_SESSION['warningg'];
}
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM `user_signin` WHERE `email` = '$email' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['userlogin'] = true;
            $_SESSION['warningg'] = false;
            // setcookie("login", "$email", time() + (86400 * 30), "/");
            header('location:index.php');
            echo "ss";
        } else {
            $myMsg = "Enter the correct password";
        }
    } else {
        $myMsg = "Email does not resister";
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
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="full_body">
    <?php include("./header.php")?>
        <div class="spkl">
            <div class="signupContainer">
                <form action="./login.php" method="POST" style="width: 90%;">
                    <?php

                    if ($myMsg) {
                        echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
<strong></strong> ' . $myMsg . '
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
                    }

                    ?>
                    <p style="font-size: 2rem;" class="text-center">Verify your credential</p>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>



                    <div class="mb-3 ">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>



                    <div class="d-grid gap-2">
                        <button name="submit" class="btn btn-info" type="submit">Verify me</button>
                        <p>You don"t have any account? <a href="createAccount.php">Click Here for create account </a></p>
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