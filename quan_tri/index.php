<?php
    session_start();
    $bien_bao_mat="co";
    include("../khach_hang/ket_noi.php");
    include("../khach_hang/chuc_nang/ham.php");
    include("chuc_nang/quan_tri/xac_dinh_dang_nhap.php");

    if( isset($_SESSION['xac_dinh_dang_nhap_ad']) ) {
        if( $_SESSION['xac_dinh_dang_nhap_ad']=="co" ) {
            include("chuc_nang/quan_tri/xu_ly_POST-GET.php");
        }
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Quản trị wkGenji Shop</title>
        <link rel="stylesheet" type="text/css" href="../khach_hang/giao_dien/giao_dien.css">
        <script src='phan_bo_tro/tinymce/js/tinymce/tinymce.min.js'></script>
    </head>

    <body>
        <?php
            if( !isset($_SESSION['xac_dinh_dang_nhap_ad']) or !isset($_SESSION['loai_dang_nhap']) or $_SESSION['xac_dinh_dang_nhap_ad']=="khong" ) {
                include("chuc_nang/quan_tri/khung_dang_nhap.php");
                if( isset($_GET['thamso']) ) {
                    unset($_GET['thamso']);
                }
            }
            else {
                if( $_SESSION['xac_dinh_dang_nhap_ad']=="co" and $_SESSION['loai_dang_nhap']=="admin") {
                    include("chuc_nang/quan_tri/trang_chu.php");
                }
                if( $_SESSION['xac_dinh_dang_nhap_ad']=="co" and $_SESSION['loai_dang_nhap']=="nhan_vien") {
                    include("chuc_nang/nhan_vien/trang_chu.php");
                }
            }
        ?>
        <div style='text-align: center; color: red'>
            Trang Quản trị vẫn đang trong quá trình phát triển!
        </div>
    </body>
</html>