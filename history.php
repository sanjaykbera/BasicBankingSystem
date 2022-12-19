<?php
include("./connection.php");
$email = false;
session_start();
if (!isset($_SESSION['userlogin'])) {
    header("location:login.php");
}
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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
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
                <th scope="col">Sender</th>
                <th scope="col">Receiver A/C</th>
                <th scope="col">Amount</th>
                <th scope="col">Remark</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Sanjay Kumar Bera</td>
                <td>satya prasanna lenka
                </td>
                <td>400</td>
                <td>sucess</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Sanjay Kumar Bera</td>
                <td>suresh sharma</td>
                <td>250</td>
                <td>sucess</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>satya prasanna lenka</td>
                <td>Sanjay Kumar Bera</td>
                <td>500</td>
                <td>sucess</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>suresh sharma</td>
                <td>Sanjay Kumar Bera</td>
                <td>800</td>
                <td>sucess</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
