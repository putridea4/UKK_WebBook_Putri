<?php 

require('../koneksi.php');
session_start();

if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'Anda di wajibkan Login';
  header('Location: login.php');
}

if(isset($_POST['delete'])){
    $kode_buku = $_POST['kode_buku'];
    $query = "DELETE FROM `tabel_buku` 
            WHERE kode_buku = '".$kode_buku."'";

    $sql = mysqli_query($con, $query); 
    if($sql){
        echo "<script> 
                alert('Data berhasil di hapus!');
                document.location.href = '../buku.php';
            </script>
        ";
    }else{
    echo "<script> 
                alert('Gagal di hapus dalam database!');
                document.location.href = '../buku.php';
            </script>
        ";
    }
}
?>