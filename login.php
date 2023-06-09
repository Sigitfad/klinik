<?php
session_start();
//DATABASE
include_once 'config/koneksi.php';
include_once 'config/function.php';


$obj = new Log();

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ceklogin = $obj->Login($username, $password);
    if($ceklogin) {
        echo '<script>window.location="index.php"</script>';
    }else {
        echo '<script>alert("Username atau Password salah")</script>';
    
    }
}



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;1,400;1,500;1,700&family=Quicksand:wght@500&display=swap"
        rel="stylesheet">
    <title>Data/Input Pasien</title>

  </head>
  <body>
    <br><br><br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="text-center"><strong> Login Admin </strong></h3><hr>
                            </div>
                        </div>
                    <div class="card-body">
                    <form action="" method="POST">
                        <label>Username </label>
                        <input type="text" name="username" required placeholder="Username Admin" class="form-control">

                        <label>Password </label>
                        <input type="password" name="password" required placeholder="Password Admin" class="form-control"><br>

                        <!--<input type="submit" name="login" value="Login"  class="btn btn-warning form-control">-->
                        <button type="submit" name="login" value="Login" class="button form-control">
                        Login
                        </button>
                    </form>
                    
                    </div>
                    <h6 class="text-center"> Kelompok 8&nbsp;&nbsp;&nbsp; || &nbsp;&nbsp;&nbsp;<i>Final Project</i><b> © 2022</b></h6>
                </div>
            </div>
        </div>
    </div>
    


    
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>