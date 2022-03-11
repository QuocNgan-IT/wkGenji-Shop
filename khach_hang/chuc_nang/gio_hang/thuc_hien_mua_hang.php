<?php
    if( isset($_SESSION['MSHH_them_vao_gio']) ) {
        $ten_nguoi_mua = trim($_POST['ten_nguoi_mua']);
        $dia_chi = trim($_POST['dia_chi']);
        $so_dien_thoai = trim($_POST['so_dien_thoai']);
        $email = trim($_POST['email']);
        $loi_nhan = trim($_POST['loi_nhan']);
        
        if( $ten_nguoi_mua!="" and $so_dien_thoai!="" and $dia_chi!="" ) {
            //Thêm các thông tin vào CSDL
            //MSKH,HoTenKH,SoDienThoai,Email,KyDanh,MatKhau
            $sql = "update khachhang
                    set HoTenKH='$ten_nguoi_mua',SoDienThoai='$so_dien_thoai',Email='$email'
                    where KyDanh like '".$_SESSION['ky_danh']."';";
            $conn_dathang->query($sql);
            /*    if( $conn_dathang->query($sql)===true ) {
                    echo "sql thành công<br>";
                }
                else {
                    echo "sql thất bại:<br>".$sql."<br>".$conn_dathang->error."<br>";
                }*/

            $sql_1 = "select MSKH
                    from khachhang
                    where KyDanh like '".$_SESSION['ky_danh']."';";
            $sql_2 = $conn_dathang->query($sql_1)->fetch_array();
            //MaDC,DiaChi,MSKH
                $ma_khach_hang = $sql_2['MSKH'];
            $sql_3 = "update diachikh
                    set DiaChi='$dia_chi'
                    where MSKH='$ma_khach_hang';";
            $conn_dathang->query($sql_3);
            /*    if( $conn_dathang->query($sql_3)===true ) {
                    echo "sql_3 thành công<br>";
                }
                else {
                    echo "sql_3 thất bại:<br>".$sql."<br>".$conn_dathang->error."<br>";
                }*/

            //Định dạng ngày giờ năm-tháng-ngày
            $date = date('Y-m-d');
            //SoDonDH,MSKH,LoiNhan,MSNV,NgayDH,NgayGH,TongGiaTri,TrangThaiDH
            $sql_4 = "insert into dathang (MSKH,LoiNhan,MSNV,NgayDH,TongGiaTri,TrangThaiDH)
                    value ('$ma_khach_hang','$loi_nhan','0','$date','".$_SESSION['tong_gia_tri']."','Chưa xác nhận');";
            $conn_dathang->query($sql_4);
            /*    if( $conn_dathang->query($sql_4)===true ) {
                    echo "sql_4 thành công<br>";
                }
                else {
                    echo "sql_4 thất bại:<br>".$sql."<br>".$conn_dathang->error."<br>";
                }*/

            //Lấy SoDonDH vừa thêm vào để gán vào chitietdathang
            $sql_5 = "select SoDonDH
                    from dathang
                    order by SoDonDH desc;";
            $sql_6 = $conn_dathang->query($sql_5)->fetch_array();

            $so_don_DH = $sql_6[0];
            echo $so_don_DH;
            for( $i=0;$i<count($_SESSION['MSHH_them_vao_gio']);$i++ ) {
                //SoDonDHChiTiet,MSHH,SoLuong,GiaDonHang
                $sql_7 = "insert into chitietdathang (SoDonDHChiTiet,MSHH,SoLuong,GiaDonHang) 
                        value ('".$so_don_DH."_".$i."','".$_SESSION['MSHH_them_vao_gio'][$i]."','".$_SESSION['sl_them_vao_gio'][$i]."','".$_SESSION['gia_don_hang'][$i]."');";
                $conn_dathang->query($sql_7);
                /*    if( $conn_dathang->query($sql_7)===true ) {
                        echo "sql_7 ".$i." thành công<br>$sql_7";
                    }
                    else {
                        echo "sql_7 ".$i." thất bại:<br>".$sql_7."<br>".$conn_dathang->error."<br>";
                    }*/
            }
            //

            unset($_SESSION['MSHH_them_vao_gio']);
            unset($_SESSION['sl_them_vao_gio']);
            unset($_SESSION['gia_don_hang']);
            unset($_SESSION['tong_gia_tri']);
            thong_bao_html_chuyen_trang("Cảm ơn bạn đã mua hàng","index.php");
            
        }
        else {
            thong_bao_html("Không được bỏ trống các trường có dấu (*), xin nhập lại!");            
            exit();
        }
    }
?>