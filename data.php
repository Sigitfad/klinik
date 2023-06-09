<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
}
//DATABASE
include_once 'config/koneksi.php';
include_once 'config/function.php';

$obj = new DataDel ();

// KONEKSI TOMBOL DELETE
if(isset($_GET['deleteid'])) {
    $delet = $_GET['deleteid'];
    $obj->deleteData($delet);
}


// KONEKSI TOMBOL SUBMIT
if(isset($_POST['submit'])) {
    $obj->insertData($_POST);
} //if isset close

if(isset($_POST['update'])) {
    $obj->updateData($_POST);
} 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;1,400;1,500;1,700&family=Quicksand:wght@500&display=swap"
        rel="stylesheet">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet"  href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">

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
                    <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Yakin Ingin Keluar ?')" >Logout</a></li>
            </ul> 
            </div>
        </div>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</nav><br><br><br><br>

    <div class="container">
        <div class="row">
            <div class="col-lg-20" style="float:none;margin:auto;">
                    <form method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-7 my-5 my-md-1 mw-100 navbar-search">
                        <div class="input-group">
                        <input type="text" class="form-control" id="word" name="query" placeholder="Cari Data ..." required>
                            <div class="input-group-append mr-2">
                                &nbsp;
                                <button type="submit" class="btn btn-primary" type="button" id="submit>
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>
                    
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-center">Data Pasien</h3>
                            </div>
                            
                            <?php
                                if(isset($_GET['msg']) AND $_GET['msg']=='del') {
                                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Data Berhasil Di Hapus !</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                }
                            ?>
                            <?php
                            if(isset($_GET['msg']) AND $_GET['msg']=='ins') {
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Data Berhasil Disimpan!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            }
                        
                        ?>
                        <?php
                            if(isset($_GET['msg']) AND $_GET['msg']=='upd') {
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Data Berhasil Di Update</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    }
                    ?>
                        </div>
                    </div>
                        <table id="tables" class="table table-hover table-striped table-bordered table-sm table-responsive" style="width:100%">
                        <thead  class="text-center">
                            <tr> <!-- TAMPILAN TABEL HEADER  -->
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //show data
                            $data = null;
                            if (isset($_GET['query'])) {
                                $data = $obj->getDataWithQuery($_GET['query']);
                            } else {
                                $data = $obj->showData();
                            }
                            $no=1;
                            if(!empty($data)) {
                                foreach ($data as $value) { // foreach open
                            ?>
                            <tr class="text-center"> <!-- TAMPILAN DATA DALAM TABEL -->
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $value['nm_pasien']; ?></td>
                                <td><?php echo $value['nik']; ?></td>
                                <td><?php echo $value['umur']; ?></td>
                                <td><?php echo $value['jk']; ?></td>
                                <td><?php echo $value['telp']; ?></td>
                                <td><?php echo $value['alamat']; ?></td>
                                <td class="text-center">
                                    <a href="edit.php?editid=<?php echo $value['id']; ?>" class="btn btn-warning badge"> Edit</a> 
                                    <a href="data.php?deleteid=<?php echo $value['id']; ?>" onclick="return confirm('Yakin Hapus Data ?')" class="btn btn-danger badge"> Hapus</a>
                                </td>
                            </tr>
                            <?php
                                }
                            } else {
                                echo "<strong><p style='color:red; text-align: center;'> Tidak Ada Data !</p></strong>";
                            } //foreach close
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="assets/js/bootstrap.bundle.min.js"></script>
    </script>
    <script>
$('#tables').dataTable( {
  "searching": true
} );
    </script>
</body>
</html>