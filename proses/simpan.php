<?php

require('../koneksi.php');
session_start();

if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'Anda di wajibkan Login';
  header('Location: login.php');
}

if(isset($_POST['simpan'])){
    $judul =  $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $gambar  = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    
    $path = "../gambar/".$gambar;

    if(move_uploaded_file($tmp, $path)){ 
        $query = "INSERT INTO `tabel_buku` (`judul`, `pengarang`, `penerbit`, `gambar`) VALUES ('".$judul."', '".$pengarang."', '".$penerbit."', '".$gambar."');";
   
        $sql = mysqli_query($con, $query); 
        if($sql){ 
            echo "<script> 
                    alert('Data Berhasil di simpan');
                    document.location.href = '../buku.php';
                </script>
            ";
        }else{
        echo "<script> 
                    alert('Gagal disimpan');
                    document.location.href = '../buku.php';
                </script>
            ";
        }
    }else{
        echo "<script> 
                alert('Gagal di upload!');
                document.location.href = '../buku.php';
            </script>
        ";
    }
}
