<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<?php
    $ten_sp = trim($_POST['ten_sp']);
    $ten_sp = str_replace("'","&#39;",$ten_sp);//Đổi ký tự ' thành ký tự đặc biệt của ' để tránh xung đột code

    $ma_danh_muc_sp = $_SESSION['danh_muc_sp'];

    $gia_sp = trim($_POST['gia_sp']);
    $sl_sp = trim($_POST['sl_sp']);
    $quy_cach_sp = trim($_POST['quy_cach_sp']);

    if( $gia_sp=="" ) {
        $gia_sp = 0;
    }
    if( $sl_sp=="" ) {
        $sl_sp = 0;
    }

    $ten_file_anh = $_FILES['hinh_anh']['name'];
    $mo_ta_sp = $_POST['mo_ta_sp'];
    $mo_ta_sp = str_replace("'","&#39;",$mo_ta_sp);

    //MSHH,TenHH,QuyCach,MoTa,Gia,SoLuongHang,MaLoaiHang
    //MaHinh,TenHinh,MSHH
    if( $ten_sp!="" ) {
        if( $ten_file_anh!="" ) {
            $sql = "select count(*)
                    from hinhhanghoa
                    where TenHinh like '$ten_file_anh'";
            $sql_1 = $conn_dathang->query($sql)->fetch_array();

            //Kiểm tra xem ảnh có tồn tại chưa
            if( $sql_1[0]==0 or $sql_1[0]==NULL) {
                
                $sql_2 = "insert into hanghoa (MSHH,TenHH,QuyCach,MoTa,Gia,SoLuongHang,MaLoaiHang)
                    value (NULL,'$ten_sp','$quy_cach_sp','$mo_ta_sp','$gia_sp','$sl_sp','$ma_danh_muc_sp');";
                $conn_dathang->query($sql_2);

                $sql_3 = "select MSHH
                        from hanghoa
                        order by MSHH desc";
                $sql_4 = $conn_dathang->query($sql_3)->fetch_array();
                
                $sql_5 = "insert into hinhhanghoa (MaHinh,TenHinh,MSHH)
                    value (NULL,'$ten_file_anh','".$sql_4[0]."');";
                $conn_dathang->query($sql_5);

                $link_anh = "../khach_hang/hinh_anh/san_pham/".$ten_file_anh;
                move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$link_anh);

                $_SESSION['danh_muc_sp_chon']=$ma_danh_muc_sp;
            }
            else {
                thong_bao_html("Hình ảnh bị trùng tên !");
            }
        }
        else {
            thong_bao_html("Chưa chọn ảnh !");
        }
    }
    else {
        thong_bao_html("Chưa điền tên sản phẩm !");
    }
    thong_bao_html_chuyen_trang("Đã thêm sản phẩm !","index.php");
?>