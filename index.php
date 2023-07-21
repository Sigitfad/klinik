<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
}
include_once 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Klinik</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link rel="stylesheet" href="assets/css/darkmode.css">
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;1,400;1,500;1,700&family=Quicksand:wght@500&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="assets/css/kalender.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">

    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper" >
                <div style="text-align: center;" class="sidebar-heading border-bottom bg-light"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" id="hospital"><path fill="none" d="M0 0h48v48H0z"></path><path d="M38 6H10c-2.21 0-3.98 1.79-3.98 4L6 38c0 2.21 1.79 4 4 4h28c2.21 0 4-1.79 4-4V10c0-2.21-1.79-4-4-4zm-2 22h-8v8h-8v-8h-8v-8h8v-8h8v8h8v8z"></path></svg>&nbsp;Klinik UBP</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php"><i class="fa-solid fa-house" style="color: #000000;"></i>&nbsp;&nbsp;Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="data.php"><i class="fa-solid fa-chart-simple" style="color: #000000;"></i>&nbsp;&nbsp;Data Pasien</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="register.php"><i class="fa-solid fa-registered" style="color: #000000;"></i>&nbsp;&nbsp;Registrasi</a>
                    <a data-bs-toggle="modal" data-bs-target="#ModalLogout" class="list-group-item list-group-item-action list-group-item-light p-3" href="logout.php"><i class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>&nbsp;&nbsp;Logout</a>
                    <!-- MODAL DELETE -->
                    <div class="modal fade" id="ModalLogout"  tabindex="-1" aria-labelledby="ModalLogoutLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title" id="ModalLogoutLabel"><i class="fa-solid fa-circle-exclamation"></i> Admin </h5>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda Yakin Ingin Logout?
                                </div>
                                <div class="modal-footer">
                                    <button data-bs-dismiss="modal" class="btn btn-danger fa-solid fa-xmark" style="color: #000000;"></button>
                                    <button class="btn btn-info fa-solid fa-right-from-bracket" onclick="window.location.href='logout.php'"></button>
                                </div>
                            </div>
                        </div>
                    </div><br/>
                        <!--Sosial Media-->
                        <div class="container" style="text-align: center;" >
                            <button class="btn btn-warning fa-brands fa-instagram"  onClick="javascript:window.open('https://www.instagram.com/_sigitfad/', '_blank');"></button>
                            <button class="btn btn-warning fa-brands fa-facebook"  onClick="javascript:window.open('https://www.facebook.com/people/Sigit-Pratama/pfbid03sWs1enZXVpXnQghWUqcJL2Vtdi9qQXDc5TfWENPDmKCS7VwvpaEqnGJLRsPhTD5l/?mibextid=ZbWKwL', '_blank');"></button>
                            <button class="btn btn-warning fa-brands fa-tiktok"  onClick="javascript:window.open('https://www.tiktok.com/@sigitfad', '_blank');"></button>
                            <p><i class="fa-solid fa-copyright"></i>&nbsp;2022 - Sigit Fadilla</p>
                        </div>
                    </div>
                </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!--JAM-->
                            <div class="container" style="text-align: center;" >
                                <h6 style="display: inline-block;" id="clock" ></h6>
                            </div>
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user" style="color: #000000;"></i>&nbsp;&nbsp;Admin
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="index.php"><i class="fa-solid fa-house" style="color: #000000;"></i>&nbsp;Home</a></li>
                                <li><a class="dropdown-item" href="data.php"><i class="fa-solid fa-chart-simple" style="color: #000000;"></i>&nbsp;Data</a></li>
                                <li><a class="dropdown-item" href="register.php"><i class="fa-solid fa-registered" style="color: #000000;"></i>&nbsp;Register</a></li>
                                <li><a data-bs-toggle="modal" data-bs-target="#ModalLogout" class="dropdown-item" href="logout.php" id="logout"><i class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>&nbsp;Logout</a></li>
                                <div class="modal fade" id="ModalLogout"  tabindex="-1" aria-labelledby="ModalLogoutLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title" id="ModalLogoutLabel"><i class="fa-solid fa-circle-exclamation"></i> Admin </h5>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda Yakin Ingin Logout?
                                            </div>
                                            <div class="modal-footer">
                                                <button data-bs-dismiss="modal" class="btn btn-danger fa-solid fa-xmark" style="color: #000000;"></button>
                                                <button class="btn btn-info fa-solid fa-right-from-bracket" onclick="window.location.href='logout.php'" ></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <br/>
                <div class="container-fluid" style="text-align: center;" >

                    <!-- Kalender -->
                    <div class="wrapper">
                        <header>
                            <p class="current-date"></p>
                            <div class="icons">
                            <span id="prev" class="material-symbols-rounded">chevron_left</span>
                            <span id="next" class="material-symbols-rounded">chevron_right</span>
                            </div>
                        </header>
                        <div class="calendar">
                            <ul class="weeks">
                            <li>Min</li>
                            <li>Sen</li>
                            <li>Sel</li>
                            <li>Rab</li>
                            <li>Kam</li>
                            <li>Jum</li>
                            <li>Sab</li>
                            </ul>
                            <ul class="days"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/jamrealtime.js" ></script>
        <script src="assets/js/kalender.js"></script>
        <script src="assets/package/dist/sweetalert2.all.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
