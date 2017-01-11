<?php
    include "../config.php";

    $username = $_POST['username'];
    $nama = $_POST['nama_pegawai'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $foto = $_FILES['foto']['name'];
    $password = md5($_POST['password']);
    $tmp = $_FILES['foto']['tmp_name'];

    $path = "image/".$foto;

    //proses upload
    if(move_uploaded_file($tmp, $path)){
        $query = "INSERT INTO pegawai (username, password, email, nama, no_telp,alamat, foto) VALUES('".$username."', 
        '".$password."', '".$email."', '".$nama."', '".$no_telp."', '".$alamat."' , '".$foto."')";
        $sql = mysqli_query($dbconnect, $query);

        if($sql){
            header("location: index.php");//redirect ke halaman index php
        }else{
            echo "Maff, terjadi kesalahan saat menyimpan data";
            echo "<br> <a href='form_simpan.php'>Kembali ke Form</a>";
        }
    }else{
        echo "Maaf, gambar gagal di upload";
        echo "<br> <a href='form_simpan.php'>Kembali ke Form</a>";
    }
    ?>