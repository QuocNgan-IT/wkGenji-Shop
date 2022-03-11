<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<?php
    if( !isset($_GET['thamso']) ) {
        $thamso = "";
    }
    else {
        $thamso = $_GET['thamso'];
    }

    switch( $thamso ) {
        case "danh_muc":
            echo "<div style='text-align: center; color: red'>Chức năng đang trong quá trình phát triển!</div>";
            break;

        case "menu":
            include("chuc_nang/menu/chuc_nang_them_menu.php");
            break;

        case "san_pham":
            echo "<div style='text-align: center; color: red'>Chức năng đang trong quá trình phát triển!</div>";
            include("chuc_nang/san_pham/them_san_pham.php");
            break;

        // case "them_san_pham":
        //     include("chuc_nang/san_pham/them_san_pham.php");
        //     break;

        case "quan_ly_don_hang":
            include("chuc_nang/don_hang/quan_ly_don_hang.php");
            break;

        case "xem_don_hang":
            include("chuc_nang/don_hang/xem_don_hang.php");
            break;

        //default:
    }
?>