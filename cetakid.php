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
            <h3 class="text-center">Data Lengkap Pasien</h3><br>
        </div>
        <?php
        //FECTH UPDATE DATA
        if (isset($_GET['showid'])) {
        $showid = $_GET['showid'];
        $mydata = $obj->showDataByIdShow($showid);

        ?>
        <!-- UPDATE DATA -->
        <form action="cetakid.php" method="POST">
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

                <label>Tanggal Daftar </label>
                <input type="date" name="tgl_daftar" value="<?php echo $mydata['tgl_daftar']; ?>" class="form-control" readonly>

                <label>Alamat </label>
                <textarea name="alamat" required placeholder="Alamat Lengkap" class="form-control id="" cols="10" rows="4"><?php echo $mydata['alamat']; ?></textarea><br>

                <input type="hidden" name="hid" value="<?php echo $mydata['id']; ?>">
                </form>
                <?php }
                ?>   
        <script>
            window.print()
        </script>



    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>