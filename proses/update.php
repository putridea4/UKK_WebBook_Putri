<?php 

require('../koneksi.php');
session_start();


if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'Anda di wajibkan Login';
  header('Location: login.php');
}

if(isset($_POST['update'])){
    $kode_buku = $_POST['kode_buku'];
    $judul =  $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];

    $tgl = date('Y-m-d H:i:s');
    $query = "UPDATE `tabel_buku` SET 
                `judul`='".$judul."',
                `pengarang`='".$pengarang."',
                `penerbit`='".$penerbit."', 
                `update_at` = '".$tgl."' 
                WHERE kode_buku = '".$kode_buku."'";

    $sql = mysqli_query($con, $query); 
    if($sql){ 
        echo "<script> 
                alert('Data berhasil Di Update!');
                document.location.href = '../buku.php';
            </script>
        ";
    }else{
    echo "<script> 
                alert('Gagal update dalam database!');
                document.location.href = '../buku.php';
            </script>
        ";
    }
}


?>