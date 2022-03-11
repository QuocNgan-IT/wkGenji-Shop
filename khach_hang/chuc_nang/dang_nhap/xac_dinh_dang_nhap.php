<?php
    if( isset($_POST['dang_nhap']) ) {
        $ky_danh = $_POST['ky_danh'];
        $mat_khau = $_POST['mat_khau'];

        //Dùng like để so sánh tên tài khoản không phân biệt hoa thường
        $sql = "select *
                from khachhang
                where KyDanh like '$ky_danh' and MatKhau='$mat_khau'";
        $sql_1 = $conn_dathang->query($sql);

        if( $sql_2=$sql_1->fetch_array() ) {
            $_SESSION['xac_dinh_dang_nhap'] = "co";
            $_SESSION['ky_danh'] = $ky_danh;
        }
        else {
            thong_bao_html("Thông tin nhập vào không đúng !");
        }
    }
?>