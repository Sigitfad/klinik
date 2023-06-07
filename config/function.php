<?php 


class DataDel extends Database {
    public $conn;
    public $error;

        //FUNGSI DELETE DATA
        public function deleteData($delet)
        { //function deleteData open
            $sql = "DELETE FROM tb_pasien WHERE id='$delet'";
            $result = $this->conn->query($sql);
            if ($result) {
                header('location:data.php?msg=del');
            } else {
                echo "Error " . $sql . "<br>" . $this->conn->error;
            }
        } //function deleteData close
    
    
        // FUNGSI TAMPIL DATA
        public function showData()
        { //function showData open
            $sql = "SELECT * FROM tb_pasien";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                } //while close
                return $data;
            } // if close
        } //function showData close 
    
        public function getDataWithQuery($keyword) {
            $sql = "SELECT * FROM tb_pasien";
            $result = $this->conn->query($sql);

            $arr = $result->fetch_all(MYSQLI_ASSOC);

            $tmp = [];
            foreach ($arr as $row) {
                if (strtolower($row['nm_pasien']) == strtolower($keyword) || $row['nik'] == $keyword || $row['telp'] == $keyword || strtolower($row['alamat']) == strtolower($keyword)) {
                    $tmp[] = $row;
                }
            }

            return $tmp;
        }
        


         //FUNGSI INSERT DATA/ ISI DATA
    public function insertData($post)
    { //function insertData open
        $nm_pasien = $post['nm_pasien'];
        $nik = $post['nik'];
        $umur = $post['umur'];
        $jk = $post['jk'];
        $telp = $post['telp'];
        $alamat = $post['alamat'];
        $sql = "INSERT INTO tb_pasien(nm_pasien, nik, umur, jk, telp, alamat) VALUES('$nm_pasien','$nik','$umur','$jk','$telp','$alamat')";
        $result = $this->conn->query($sql);
        if ($result) {
            header('location:data.php?msg=ins');
        } else {
            echo "Error " . $sql . "<br>" . $this->conn->error;
        }
    } //function insertData close


    public function updateData($post)
        { //function updateData open
            $nm_pasien = $post['nm_pasien'];
            $nik = $post['nik'];
            $umur = $post['umur'];
            $jk = $post['jk'];
            $telp = $post['telp'];
            $alamat = $post['alamat'];
            $editid = $post['hid'];
            $sql = "UPDATE tb_pasien SET nm_pasien='$nm_pasien',nik='$nik',umur='$umur',jk='$jk',telp='$telp',alamat='$alamat' WHERE id='$editid'";
            $result = $this->conn->query($sql);
            if ($result) {
                header('location:data.php?msg=upd');
            } else {
                echo "Error " . $sql . "<br>" . $this->conn->error;
            }
        } //function updateData close


        public function showDataById($editid)
        { //function showDataById open
            $sql = "SELECT * FROM tb_pasien WHERE id = '$editid'";
            $result = $this->conn->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                return $row;
            } //if close
        } //function showDataById close
}


class Log extends Database {
    public $conn;
    public $error;

        // FUNGSI LOGIN TABEL USERS (KHUSUS LOGIN ADMIN)
        public function Login($username, $password) { //function Login open
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                $this->userAuth($data);
                return true;
            } else {
                return false;
            }
        } //function Login close 
    
    
        public function userAuth($data) {
            $_SESSION['authenticated'] = true;
            $_SESSION['auth_user'] = [
                'user_id' => $data['id'],
                'user_username' => $data['username'],
                'user_password' => $data['password']
            ];
        }
}

?>