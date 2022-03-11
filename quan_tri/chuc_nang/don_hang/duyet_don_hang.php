<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<?php
    $SoDonDH = $_GET['SoDonDH'];

    $link = "?thamso=quan_ly_don_hang&trang=".$_GET['trang'];

    $sql = "select *
            from dathang
            where SoDonDH='$SoDonDH'";
    $sql_1 = $conn_dathang->query($sql)->fetch_array();

    $date1 = new DateTime($sql_1['NgayDH']);
    $date1->modify('+7 days');
    $date2 = $date1->format('Y-m-d');

    //SoDonDH,MSKH,LoiNhan,MSNV,NgayDH,NgayGH,TongGiaTri,TrangThaiDH
    $sql = "update dathang
            set TrangThaiDH='Đã duyệt', NgayGH='$date2'
            where SoDonDH='$SoDonDH'";
    $sql_1 = $conn_dathang->query($sql);

    //Duyệt đơn hàng và quay về trang quản lý đơn hàng
    thong_bao_html_chuyen_trang("Đã duyệt đơn hàng, có trách thì hãy trách người vội vàng..",$link);
?>