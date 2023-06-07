<?php
//DATABASE
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
}

include_once 'config/koneksi.php';
include_once 'config/function.php';

$obj = new DataDel();




?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;1,400;1,500;1,700&family=Quicksand:wght@500&display=swap"
        rel="stylesheet">
    <title>Data/Input Pasien</title>

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
</nav><br><br><br>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-15">
                                <h3 class="text-center"><strong>Update Data</strong></h3>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                    
                            <?php
                                //FECTH UPDATE DATA
                                if (isset($_GET['editid'])) {
                                $editid = $_GET['editid'];
                                $mydata = $obj->showDataById($editid);

                            ?>
                            <!-- UPDATE DATA -->
                            <form action="data.php" method="POST">
                                <label>Nama </label>
                                <input type="text" name="nm_pasien" required value="<?php echo $mydata['nm_pasien']; ?>" class="form-control">

                                <label>NIK </label>
                                <input type="number" name="nik" required value="<?php echo $mydata['nik']; ?>" class="form-control">

                                <label>Umur </label>
                                <input type="text" name="umur" required value="<?php echo $mydata['umur']; ?>" class="form-control">

                                <label>Jenis Kelamin </label>
                                <select class="form-control" name="jk" required>
                                    <option value=""><?php echo $mydata['jk']; ?></option>
                                    <option value="Laki-Laki"> Laki-Laki</option>
                                    <option value="Perempuan"> Perempuan</option>
                                </select>

                                <label>Nomor Telepon </label>
                                <input type="number" name="telp" required value="<?php echo $mydata['telp']; ?>" class="form-control">

                                <label>Alamat </label>
                                <textarea name="alamat" required placeholder="Alamat Lengkap" class="form-control id="" cols="10" rows="4"><?php echo $mydata['alamat']; ?></textarea><br>

                                <input type="hidden" name="hid" value="<?php echo $mydata['id']; ?>">
                                <input type="submit" name="update" value="Update" class="btn btn-warning form-control" onclick="return confirm('Yakin Edit ?')">
                            </form>
                            <?php }
                            ?>   
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>