<?php
require('koneksi.php');
session_start();
 
$error = '';
$validate = '';

function cek_username($username,$con){
    $username = mysqli_real_escape_string($con, $username);
    $query = "SELECT * FROM tabel_siswa WHERE username = '$username'";
    if( $result = mysqli_query($con, $query) ) return mysqli_num_rows($result);
}

if( isset($_POST['submit']) ){
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $password = $_POST['password'];
    $ulangi_password = $_POST['ulangi_password'];
    if(!empty(trim($nama)) && !empty(trim($username)) && !empty(trim($alamat)) && !empty(trim($no_telepon)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($ulangi_password))){
        if($password == $ulangi_password){
            if(cek_username($username,$con) == 0 ){
                $pass  = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO tabel_siswa(nama, username, password, email, alamat, no_telepon) VALUES ('$nama','$username','$pass','$email', '$alamat', '$no_telepon')";
                $result   = mysqli_query($con, $query);
                if ($result) {
                    echo "
                        <script> 
                        alert('Regitrasi Berhasil!!, silagkan lakukan login');
                        document.location.href = 'login.php';
                        </script>
                        ";

                } else {
                    $error =  'Register User Gagal !!';
                }
            }else{
                echo "
                <script> 
                    alert('Regitrasi gagal username sudah terdaftar!!');
                    document.location.href = 'register.php';
                </script>
                ";

            }
        }else{
            $validate = 'Password harus sama  !!';
        }
            
    }else {
        $error =  'Data tidak boleh kosong !!';
        
    }
} 
    
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->
    
    <style>
        .register{
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            margin-top: 3%;
            padding: 3%;
        }
        .register-left{
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }
        .register-left input{
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }
        .register-right{
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }
        .register-left img{
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite  alternate;
            animation: mover 1s infinite  alternate;
        }
        @-webkit-keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        @keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        .register-left p{
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }
        .register .register-form{
            padding: 10%;
            margin-top: 10%;
        }
        .btnRegister{
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }
        .register .nav-tabs{
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }
        .register .nav-tabs .nav-link{
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }
        .register .nav-tabs .nav-link:hover{
            border: none;
        }
        .register .nav-tabs .nav-link.active{
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }
        .register-heading{
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }
    </style>
    <title>Register</title>
</head>

<body>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <p>Selamat Datang di Aplikasiku</p>
            <a href="login.php" class ="btn btn-secondary">Login</a><br/>
        </div>
        <div class="col-md-9 register-right">
           
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Register</h3>
                    <form action="register.php" method = "post">
                        <div class="row register-form">
                     
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name = "nama" placeholder="nama *" id=""
                                        placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name = "username" placeholder="Username *" id=""
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name = "email" id="" placeholder="Email *"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name = "no_telepon" id="" placeholder="No Telepon *"
                                        placeholder="No Telepon">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 form-group">
                                    <input type="text" class="form-control" name = "alamat" id=""
                                        placeholder="Alamat *">
                                </div>
                                <div class="mb-2 form-group">
                                    <input type="password" class="form-control" name = "password" id=""
                                        placeholder="Password *">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="InputRePassword" name="ulangi_password" placeholder="Ulangi Password *">
                                    <?php if($validate != '') {?>
                                        <p class="text-danger"><?= $validate; ?></p>
                                    <?php }?>
                                </div>
                                <input type="submit" name = "submit" class="btnRegister"  value="Register"/>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>				                            
</body>

</html>