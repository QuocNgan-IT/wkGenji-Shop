<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<?php
    //Tác vụ đối với chức năng Sản phẩm
    if( isset($_POST['bieu_mau_them_san_pham']) ) {
        include("chuc_nang/san_pham/them_san_pham_vao_csdl.php");
        trang_truoc();
    }
    if( isset($_POST['bieu_mau_sua_san_pham']) ) {
        include("chuc_nang/san_pham/sua_san_pham.php");
        trang_truoc();
    }
    if( isset($_GET['xoa_san_pham']) ) {
        include("chuc_nang/san_pham/xoa_san_pham");
        trang_truoc();
    }

    //Tác vụ đối với chức năng Hóa đơn
    if( isset($_GET['duyet_don_hang']) ) {
        include("chuc_nang/don_hang/duyet_don_hang.php");
        trang_truoc();
    }
    if( isset($_GET['xoa_don_hang']) ) {
        include("chuc_nang/don_hang/xoa_don_hang.php");
        trang_truoc();
    }
    if( isset($_GET['xoa_don_hang_2']) ) {
        include("chuc_nang/don_hang/xoa_don_hang_2.php");
        trang_truoc();
    }

    //Tác vụ Đăng xuất
    if( isset($_GET['thamso']) ) {
        if( $_GET['thamso']=="dang_xuat" ) {
            include("chuc_nang/quan_tri/dang_xuat.php");
            thong_bao_html_chuyen_trang("Bạn đã đăng xuất !", "index.php");  
        }   
    }
?>