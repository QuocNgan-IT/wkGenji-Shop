<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<?php 
    unset($_POST['dang_nhap_ad']);
    unset($_POST['ky_danh_ad']);
    unset($_POST['mat_khau']);
    unset($_SESSION['ky_danh_ad']);
    $_SESSION['xac_dinh_dang_nhap_ad'] = "khong";
    unset($_SESSION['loai_dang_nhap']);
    
?>
