<?php
//DATABASE
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
}
include_once 'config/koneksi.php';
include_once 'config/function.php';



?>

<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Klinik</title>
        <link href="assets/package/dist/sweetalert2.min.css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/package/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;1,400;1,500;1,700&family=Quicksand:wght@500&display=swap"
        rel="stylesheet">
  <body>
    <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
            <div style="text-align: center;" class="sidebar-heading border-bottom bg-light"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" id="hospital"><path fill="none" d="M0 0h48v48H0z"></path><path d="M38 6H10c-2.21 0-3.98 1.79-3.98 4L6 38c0 2.21 1.79 4 4 4h28c2.21 0 4-1.79 4-4V10c0-2.21-1.79-4-4-4zm-2 22h-8v8h-8v-8h-8v-8h8v-8h8v8h8v8z"></path></svg>&nbsp;Klinik UBP</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php"><i class="fa-solid fa-house" style="color: #000000;"></i>&nbsp;&nbsp;Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="data.php"><i class="fa-solid fa-chart-simple" style="color: #000000;"></i>&nbsp;&nbsp;Data Pasien</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="register.php"><i class="fa-solid fa-registered" style="color: #000000;"></i>&nbsp;&nbsp;Registrasi</a>
                    <a data-bs-toggle="modal" data-bs-target="#ModalLogout" class="list-group-item list-group-item-action list-group-item-light p-3" href="logout.php"><i class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>&nbsp;&nbsp;Logout</a>
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
                            <!--TANGGAL & JAM-->
                            <div class="container" style="text-align: center;" >
                                <h6 style="display: inline-block;" id="date" ></h6>
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
                                                <button class="btn btn-info fa-solid fa-right-from-bracket" onclick="window.location.href='logout.php'"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </nav>
                <br>
                <!-- Page content-->
                <div class="container-fluid">
                    <!-- INSERT DATA -->
                    <form action="data.php" method="POST">
                        <label>Nama </label>
                        <input type="text" name="nm_pasien" required placeholder="Nama Lengkap" class="form-control" autocomplete="off">

                        <label>NIK </label>
                        <input type="number" name="nik" required placeholder="Masukan NIK" class="form-control" autocomplete="off">

                        <label>Umur </label>
                        <input type="text" name="umur" placeholder="Umur" class="form-control" autocomplete="off">

                        <label>Jenis Kelamin </label>
                        <select class="form-control" name="jk" required>
                                    <option value=""> Pilih </option>
                                    <option value="Laki-Laki"> Laki-Laki</option>
                                    <option value="Perempuan"> Perempuan</option>
                        </select>

                        <label>Nomor Telepon </label>
                        <input type="number" name="telp" required placeholder="Masukan Nomor Telepon" class="form-control" autocomplete="off">

                        <label>Alamat </label>
                        <textarea name="alamat" autocomplete="off" required placeholder="Masukan Alamat Lengkap" class="form-control id="" cols="10" rows="4" autocomplete="off"></textarea><br>

                        <!--<input type="submit" name="submit" value="Daftar" class="btn btn-success form-control" onclick="return confirm('Yakin Daftar ?')">-->
                        <!--<button type="submit" name="submit" value="Daftar" class="btn btn-primary form-control" onclick="return confirm('Pastikan Data Sudah Benar!')" >Daftar</button>-->
                        <!-- MODAL REGISTER -->
                        <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#daftarModal">
                        DAFTAR
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="daftarModal" tabindex="-1" aria-labelledby="daftarModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="daftarModalLabel"><i class="fa-solid fa-registered"></i>&nbsp;Registrasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Pastikan <strong>Data</strong> Sudah Benar <i class="fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" value="Daftar" class="btn btn-primary">Daftar</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <br>
    <!--<footer>
    <div class="text-center p-2" style="background-color: #5DA7DB; color: aliceblue;">
    <b> Kelompok 8</b>&nbsp;&nbsp;&nbsp; || &nbsp;&nbsp;&nbsp;<i>Final Project</i><b> © 2022</b>
    </div>
    </footer>-->


    <!-- Bootstrap core JS-->
    <script src="assets/js/tanggalrealtime.js" ></script>
    <script src="assets/js/jamrealtime.js" ></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="assets/package/dist/sweetalert2.all.min.js"></script>
  </body>
</html>