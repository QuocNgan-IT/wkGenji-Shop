<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<?php
    //Tùy vào tài khoản đăng nhập mà trang Quản trị có chức năng khác nhau

    //Đăng nhập nhân viên
    if( isset($_POST['dang_nhap_ad']) ) {
        $ky_danh = $_POST['ky_danh_ad'];
        $mat_khau = $_POST['mat_khau'];

        $sql = "select count(*)
                from nhanvien
                where KyDanh like '$ky_danh' and MatKhau='$mat_khau'";
        $sql_1 = $conn_dathang->query($sql)->fetch_array();

        //Kiểm tra
        if( $sql_1[0]==1 ) {
            $_SESSION['ky_danh_ad'] = $ky_danh;
            $_SESSION['xac_dinh_dang_nhap_ad'] = "co";
            $_SESSION['loai_dang_nhap'] = "nhan_vien";
        }
        else if( $sql_1[0]!=1 ) {
            //Đăng nhập admin
            //Mã hóa mật khẩu bằng md5 2 lần
            $mat_khau = md5($_POST['mat_khau']);
            $mat_khau = md5($mat_khau);

            $sql_2 = "select count(*)
                from admin
                where KyDanh like '$ky_danh' and MatKhau='$mat_khau'";
            $sql_3 = $conn_trangweb->query($sql_2)->fetch_array();

            //Kiểm tra
            if( $sql_3[0]==1 ) {
                $_SESSION['ky_danh_ad'] = $ky_danh;
                $_SESSION['xac_dinh_dang_nhap_ad'] = "co";
                $_SESSION['loai_dang_nhap'] = "admin";
            }
            else if( $sql_3[0]!=1) {
                thong_bao_html("Thông tin nhập vào không đúng !");
            }
        }
        else {
            thong_bao_html("Thông tin nhập vào không đúng !");
        }
    }
?>