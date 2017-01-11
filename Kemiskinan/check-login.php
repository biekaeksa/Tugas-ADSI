<?php
session_start();
require 'config.php';

if ( isset($_POST['username']) && isset($_POST['password']) ) {
    
    $sql_check = "SELECT nama, 
                         nama_level, 
                         id_admin 
                  FROM admin, level 
                  WHERE 
                       username=? 
                       AND 
                       password=?
                       AND
                       admin.id_level = level.id_level 
                  LIMIT 1";

    $check_log = $dbconnect->prepare($sql_check);
    $check_log->bind_param('ss', $username, $password);

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $check_log->execute();

    $check_log->store_result();

    if ( $check_log->num_rows == 1 ) {
        $check_log->bind_result($nama, $nama_level, $id_admin);

        while ( $check_log->fetch() ) {
            $_SESSION['user_login'] = $nama_level;
            $_SESSION['sess_id']    = $id_admin;
            $_SESSION['nama']       = $nama;
            
        }

        $check_log->close();

        header('location:on-'.$nama_level);
        exit();

    } else {
        header('location: login.php?error='.base64_encode('Username dan Password Invalid!!!'));
        exit();
    }

   
} else {
    header('location:login.php');
    exit();
}