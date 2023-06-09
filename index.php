<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
}
include_once 'config/koneksi.php';
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

    <title>Home</title>

  </head>
  <body>
    
    
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="navbar-brand">Klinik UBP</b>
            <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>&nbsp;&nbsp;&nbsp;
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>&nbsp;&nbsp;&nbsp;
                <li class="nav-item">
                    <a class="nav-link" href="data.php">Data Pasien</a>
                </li>&nbsp;&nbsp;&nbsp;
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Admin
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Yakin Ingin Keluar ?')">Logout</a></li>
            </ul> 
            </div>
        </div>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</nav>
        <img src="assets/images/klinik.jpg" height="835" width="1920" alt="">
</div>

  <!-- Footer-->
  <footer>
      <div class="text-center p-2" style="background-color: #5DA7DB; color: aliceblue;">
        <b> Kelompok 8</b>&nbsp;&nbsp;&nbsp; || &nbsp;&nbsp;&nbsp;<i>Final Project</i><b> © 2022</b>
      </div>
  </footer>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>