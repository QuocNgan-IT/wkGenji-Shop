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

    //SoDonDHChiTiet,MSHH,SoLuong,GiaDonHang
    $sql = "delete
            from chitietdathang
            where SoDonDHChiTiet like '%".$SoDonDH."%'";
    $sql_1 = $conn_dathang->query($sql);

    //SoDonDH,MSKH,LoiNhan,MSNV,NgayDH,NgayGH,TongGiaTri,TrangThaiDH
    $sql_2 = "delete
            from dathang
            where SoDonDH='$SoDonDH'";
    $sql_3 = $conn_dathang->query($sql_2);

    //Xóa đơn hàng và quay về trang quản lý đơn hàng
    thong_bao_html_chuyen_trang("Đã xóa đơn hàng, có hối hận thì cũng đã muộn màng..",$link);
?>