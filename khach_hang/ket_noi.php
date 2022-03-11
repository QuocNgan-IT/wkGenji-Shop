<?php
    $server   = "localhost";   	        //Khai báo server
    $username = "root"; 		        //Khai báo username
    $password = "";      		        //Khai báo password
    $db_trangweb   = "quanlytrangweb";  //Khai báo database quanlytrangweb
    $db_dathang   = "quanlydathang";    //Khai báo database quanlydathang

    // Kết nối database
    $conn_trangweb = new mysqli($server, $username, $password, $db_trangweb);
    
    $conn_dathang = new mysqli($server, $username, $password, $db_dathang);

    //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
    if ( $conn_trangweb->connect_error ) {
        die("Kết nối quanlytrangweb thất bại!".$conn_trangweb->connect_error);
        exit();
    }
    if ( $conn_dathang->connect_error ) {
        die("Kết nối quanlydathang thất bại!".$connect_dathang->connect_error);
        exit();
    }
    //echo "Kết nối thành công!";

    //Gán các biến database
    $conn_trangweb->select_db('quanlytrangweb');
    $conn_dathang->select_db('quanlydathang');

    //Biện pháp tránh lỗi font khi dùng các phiên bản xampp khác nhau
    mysqli_set_charset($conn_dathang, 'utf8');
    mysqli_set_charset($conn_trangweb, 'utf8');
?>