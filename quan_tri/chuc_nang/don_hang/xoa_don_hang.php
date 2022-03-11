<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<?php
    $SoDonDH = $_GET['SoDonDH'];

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
?>