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


if(isset($_GET['showid'])) {
    $obj->showDataByIdShow($_POST);
}

?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Klinik</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;1,400;1,500;1,700&family=Quicksand:wght@500&display=swap"
            rel="stylesheet">
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/js/responsive.dataTables.min"></script>
        <link rel="stylesheet"  href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/responsive.dataTables.min.css">
        <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
  <body>
    <div class="d-flex" id="wrapper">
            <!-- SIDEBAR CONTENT-->
            <div class="border-end bg-white" id="sidebar-wrapper">
            <div style="text-align: center;" class="sidebar-heading border-bottom bg-light"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" id="hospital"><path fill="none" d="M0 0h48v48H0z"></path><path d="M38 6H10c-2.21 0-3.98 1.79-3.98 4L6 38c0 2.21 1.79 4 4 4h28c2.21 0 4-1.79 4-4V10c0-2.21-1.79-4-4-4zm-2 22h-8v8h-8v-8h-8v-8h8v-8h8v8h8v8z"></path></svg>&nbsp;Klinik UBP</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php"><i class="fa-solid fa-house" style="color: #000000;"></i>&nbsp;&nbsp;Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="data.php"><i class="fa-solid fa-chart-simple" style="color: #000000;"></i>&nbsp;&nbsp;Data Pasien</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="register.php"><i class="fa-solid fa-registered" style="color: #000000;"></i>&nbsp;&nbsp;Registrasi</a>
                    <a data-bs-toggle="modal" data-bs-target="#ModalLogout" class="list-group-item list-group-item-action list-group-item-light p-3" href="logout.php"><i class="fa-solid fa-right-from-bracket" style="color: #000000;"></i>&nbsp;&nbsp;Logout</a>
                    <!-- MODAL LOGOUT -->
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
                                    <button data-bs-dismiss="modal" class="btn btn-danger"><i class="fa-solid fa-xmark" style="color: #000000;"></i></button>
                                    <button class="btn btn-info"><a href="logout.php" class="fa-solid fa-right-from-bracket" style="color: #000633;"></a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- NAVBAR CONTENT-->
            <div id="page-content-wrapper">
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
                                                <button data-bs-dismiss="modal" class="btn btn-danger"><i class="fa-solid fa-xmark" style="color: #000000;"></i></button>
                                                <button class="btn btn-info"><a href="logout.php" class="fa-solid fa-right-from-bracket" style="color: #000633;"></a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </nav>
                
        <br>
    <!-- SEARCH BAR & PRINT DATA KESELURUHAN-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-20" style="float:none;margin:auto;">
                    <form method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-7 my-5 my-md-1 mw-100 navbar-search">
                        <div class="input-group">
                        <input type="text" class="form-control" id="word" name="query" placeholder="Cari Data ..." required>
                            <div class="input-group-append mr-2">
                                &nbsp;
                                <button type="submit" class="btn btn-primary" type="button" id="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                
                            </div>
                        </div>
                    </form>
                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-7 my-5 my-md-1 mw-100">
                        <button type="submit" class="btn btn-primary">
                            <a href="cetak.php" target="_blank" class="fa-sharp fa-solid fa-print" style="color: white;" ></a>
                        </button>
                    </div>
                </div>
            </div>

        <!-- TABEL KESELURAHAN-->
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
                                <th>Tanggal Daftar</th>
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
                                <td><?php echo $value['tgl_daftar']; ?></td>
                                <td><?php echo $value['alamat']; ?></td>
                                <td class="text-center">
                                    <!-- BUTTON EDIT -->
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $value['id']; ?>"><i class="fa-solid fa-pen-to-square" ></i>
                                    </button>
                                    <!-- MODAL EDIT -->
                                    <div class="modal fade" id="ModalEdit<?php echo $value['id']; ?>"  tabindex="-1" aria-labelledby="ModalEditLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title" id="ModalEditLabel">Edit Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin ubah Data?
                                                </div>
                                                <div class="modal-footer">
                                                    <button data-bs-dismiss="modal" class="btn btn-warning"><i class="fa-solid fa-xmark" style="color: #000000;"></i></button>
                                                    <!--<button class="btn btn-info"><a href="edit.php?editid=<?php echo $value['id']; ?>" class="fa-solid fa-pen-to-square" style="color: #000633;"></a></button>-->
                                                    <button class="btn btn-info fa-solid fa-pen-to-square" onclick="window.location.href='edit.php?editid=<?php echo $value['id']; ?>'"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- BUTTON DELETE -->
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $value['id']; ?>"><i class="fa-sharp fa-solid fa-trash"></i>
                                    </button>
                                    <!-- MODAL DELETE -->
                                    <div class="modal fade" id="ModalDelete<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title" id="ModalDeleteLabel"><i class="fa-solid fa-circle-exclamation" style="color: #000000;"></i>&nbsp;Hapus Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                                                </div>
                                                <div class="modal-body">
                                                    <i>Jika anda menghapus</i> <strong>Data</strong> <i>ini maka,</i> <strong>Data</strong> <i>tersebut tidak akan bisa kembali!</i>
                                                </div>
                                                <div class="modal-footer">
                                                    <button data-bs-dismiss="modal" class="btn btn-warning"><i class="fa-solid fa-xmark" style="color: #000000;"></i></button>
                                                    <button class="btn btn-danger"><a href="data.php?deleteid=<?php echo $value['id']; ?>" class="fa-solid fa-trash" style="color: #000633;"></a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- BUTTON PRINT -->
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalShowData<?php echo $value['id']; ?>"><i class="fa-solid fa-eye" style="color: #000000;"></i>
                                    </button>
                                    <!-- MODAL PRINT -->
                                    <div class="modal fade" id="ModalShowData<?php echo $value['id']; ?>" role="dialog" tabindex="-1" aria-labelledby="ModalShowDataLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info">
                                                    <h5 class="modal-title" id="ModalShowDataLabel">Data Pasien</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row" style="text-align: left;" >
                                                        <div class="col-sm-4">
                                                            Nama<br/>
                                                            NIK<br/>
                                                            Umur<br/>
                                                            Jenis Kelamin<br/>
                                                            No Telepon<br/>
                                                            Tanggal Daftar<br/>
                                                            Alamat
                                                        </div>
                                                        <div class="col-sm-8">
                                                            &nbsp;&nbsp; <?php echo $value['nm_pasien']; ?><br/>
                                                            &nbsp;&nbsp; <?php echo $value['nik']; ?><br/>
                                                            &nbsp;&nbsp; <?php echo $value['umur']; ?><br/>
                                                            &nbsp;&nbsp; <?php echo $value['jk']; ?><br/>
                                                            &nbsp;&nbsp; <?php echo $value['telp']; ?><br/>
                                                            &nbsp;&nbsp; <?php echo $value['tgl_daftar']; ?><br/>
                                                            &nbsp;&nbsp; <?php echo $value['alamat']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button data-bs-dismiss="modal" class="btn btn-warning"><i class="fa-solid fa-xmark" style="color: #000000;"></i></button>
                                                    <button class="btn btn-info" ><a href="cetakid.php?showid=<?php echo $value['id']; ?>" target="_blank" class="fa-sharp fa-solid fa-print" style="color: #000633;"></a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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


    <script src="assets/js/tanggalrealtime.js" ></script>
    <script src="assets/js/jamrealtime.js" ></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/dataTables.responsive.min.js"></script>
    </script>
    <script>
$('#tables').dataTable( {
  "searching": true,
  "responsive": true

} );
    </script>
</body>
</html>