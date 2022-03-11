<?php    
    session_start();

    include("ket_noi.php");
    include("chuc_nang/ham.php");
    include("chuc_nang/dang_nhap/xac_dinh_dang_nhap.php");

    if( isset($_POST['thong_tin_dat_hang']) ) {
        include("chuc_nang/gio_hang/thuc_hien_mua_hang.php");
    }

    if( isset($_POST['cap_nhat_gio_hang']) ) {
        include("chuc_nang/gio_hang/cap_nhat_gio_hang.php");
        trang_truoc();
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>wkGenji Shop</title>
        <link rel="stylesheet" type="text/css" href="giao_dien/giao_dien.css">        
    </head>

    <body>
        <table width="100%" height="auto">
            <tr>
                <td colspan="3">
                    <?php
                        include("chuc_nang/banner/banner.php");
                    ?>
                </td>            
            </tr>
            <tr>
                <td colspan="3"">
                    <?php
                        include("chuc_nang/menu/menu.php");
                    ?>
                </td>
            </tr>
            <tr>
                <td width="15%" valign="top">
                    <?php
                        include("chuc_nang/danh_muc/danh_muc_san_pham.php");
                        include("chuc_nang/san_pham/san_pham_moi.php");
                    ?>
                </td>
                <td width="auto" valign="top">
                    <?php
                        include("chuc_nang/dieu_huong.php");
                    ?>
                </td>
                <td width="10%" valign="top">
                    <?php
                        include("chuc_nang/tim_kiem/vung_tim_kiem.php");

                        if( !isset($_SESSION['xac_dinh_dang_nhap']) or $_SESSION['xac_dinh_dang_nhap']=="khong" ) {
                            include("chuc_nang/dang_nhap/vung_dang_nhap.php");
                        }
                        else {
                            if( $_SESSION['xac_dinh_dang_nhap']=="co" ) {
                            include("chuc_nang/gio_hang/vung_gio_hang.php");
                            }
                        }
                    ?>
                </td>
            </tr>            
        </table>
    </body>

    <footer>
        <hr>
        <table width="100%">
            <tr>
                <td width="50%" align="right">
                    Cửa hàng:
                </td>
                <td width="50%">
                    wkGenji Shop
                </td>
            </tr>
            <tr>
                <td align="right">
                    Số điện thoại:
                </td>
                <td>
                    +84 337 *** 009
                </td>
            </tr>
            <tr>
                <td align="right">
                    Địa chỉ:
                </td>
                <td>
                    Đâu đó trên hành tinh này :)
                </td>
            </tr>
        </table>
        <hr>
    </footer>
</html>