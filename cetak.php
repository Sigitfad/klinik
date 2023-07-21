<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
}
include_once 'config/koneksi.php';
include_once 'config/function.php';

$obj = new DataDel ();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,500;1,400;1,500;1,700&family=Quicksand:wght@500&display=swap"
        rel="stylesheet">
    <script src="assets/js/jquery.min.js"></script>
    <link rel="stylesheet"  href="assets/css/bootstrap.min.css">
    <title>&nbsp;</title>
</head>
<body>
        <div class="col-md-12"> 
            <h3 class="text-center">Data Pasien</h3><br>
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
            </tr>
            <?php
                }
            } else {
                echo "<strong><p style='color:red; text-align: center;'> Tidak Ada Data !</p></strong>";
            } //foreach close
            ?>
            </tbody>
        </table>
        <script>
            window.print()
        </script>



    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>