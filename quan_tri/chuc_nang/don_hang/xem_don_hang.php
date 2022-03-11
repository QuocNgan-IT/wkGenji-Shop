<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<?php
    $SoDonDH = $_GET['SoDonDH'];

    $link_xoa="?xoa_don_hang_2=co&SoDonDH=".$SoDonDH."&trang=".$_GET['trang'];
    $link_duyet="?duyet_don_hang=co&SoDonDH=".$SoDonDH."&trang=".$_GET['trang'];

    //SoDonDH,MSKH,LoiNhan,MSNV,NgayDH,NgayGH,TongGiaTri,TrangThaiDH
    $sql = "select *
            from dathang
            where SoDonDH='$SoDonDH'";
    $sql_1 = $conn_dathang->query($sql)->fetch_array();

    if( $sql_1['TrangThaiDH']=="Đã duyệt" ) {
        $ngay_GH = $sql_1['NgayGH'];
    }
    else {
        $ngay_GH = "&nbsp; Khoảng từ 5-7 ngày";
    }
    //MSKH,HoTenKH,SoDienThoai,Email
    $sql_2 = "select *
            from khachhang
            where MSKH='".$sql_1['MSKH']."'";
    $sql_3 = $conn_dathang->query($sql_2)->fetch_array();

    //MaDC,DiaChi,MSKH
    $sql_4 = "select *
            from diachikh
            where MSKH='".$sql_3['MSKH']."'";
    $sql_5 = $conn_dathang->query($sql_4)->fetch_array();

    //SoDonDHChiTiet,MSHH,SoLuong,GiaDonHang
    $sql_6 = "select *
            from chitietdathang
            where SoDonDHChiTiet like '%".$sql_1['SoDonDH']."_%'";
    $sql_7 = $conn_dathang->query($sql_6)->fetch_array();

    $sql_6_count = "select count(*)
            from chitietdathang
            where SoDonDHChiTiet like '%".$sql_1['SoDonDH']."_%'";
    $sql_7_count = $conn_dathang->query($sql_6_count)->fetch_array();
    
    //Lấy mã số nhân viên hiện tại
    //MSNV,HoTenNV,ChucVu,DiaChi,SoDienThoai,KyDanh,MatKhau
    $sql_12 = "select *
            from nhanvien
            where KyDanh like '".$_SESSION['ky_danh_ad']."'";
    $sql_13 = $conn_dathang->query($sql_12)->fetch_array();

    ////////////////////////////////////////
    echo "<div class='chi_muc'>Sản phẩm đặt mua</div>";
    echo "<table class='bang_gio_hang' align='center'";
                echo "<tr>";
                    echo "<td width='10px' class='chi_muc'>STT</td>";
                    echo "<td width='auto' class='chi_muc'>Tên</td>";
                    echo "<td width='20%' class='chi_muc'>Số lượng</td>";
                    echo "<td width='14%' class='chi_muc'>Đơn giá</td>";
                    echo "<td width='16%' class='chi_muc'>Thành tiền</td>";
                echo "</tr>";
                
                $tong_cong = $sql_1['TongGiaTri'];$STT=0;
                for( $i=0;$i<$sql_7_count[0];$i++ ) {
                    //SoDonDHChiTiet,MSHH,SoLuong,GiaDonHang
                    $sql_8 = "select *
                            from chitietdathang
                            where SoDonDHChiTiet='".$sql_1['SoDonDH']."_".$i."'";
                    $sql_9 = $conn_dathang->query($sql_8)->fetch_array();

                    $sql_10 = "select MSHH,TenHH,QuyCach,Gia,SoLuongHang,MaLoaiHang 
                            from hanghoa 
                            where MSHH='".$sql_9['MSHH']."'";
                    $sql_11 = $conn_dathang->query($sql_10)->fetch_array();
                    $tien = $sql_9['GiaDonHang'];

                    if( $sql_9['SoLuong']!=0 ) { 
                        $STT = $STT + 1;
                        echo "<tr>";
                            echo "<td align='center'>".$STT."</td>";
                            echo "<td>".$sql_11['TenHH']."</td>";
                            echo "<td align='right'>".$sql_9['SoLuong']."&nbsp;".$sql_11['QuyCach']."</td>";
                            echo "<td align='right'>".$sql_11['Gia']." vnđ </td>";
                            echo "<td align='right';'>".$tien." vnđ </td>";
                        echo "</tr>";
                    }
                }  
                echo "<tr>";
                    echo "<td colspan='4'>&nbsp;</td>";
                echo "</tr>"; 
                echo "<tr style='background-color: rgb(255, 150, 200); color: white;'>";
                    echo "<td colspan='3' align='right'>";
                        echo "<div ><strong>TỔNG GIÁ TRỊ ĐƠN HÀNG ==></strong></div>";
                    echo "</td>";
                    echo "<td colspan='2' align='center'>";   
                        echo $tong_cong." VNĐ";
                    echo "</td>";
                echo "</tr>";       
            echo "</table>";
            
    echo "<br><hr>";
    echo "<form method='POST' action=''>";
    echo "<table width='95%' align='center' class='chi_muc_bang'>
            <tr>
                <td colspan='2' class='chi_muc'>
                    Thông tin khách đặt hàng
                </td>
                <td width='1px'></td>
                <td colspan='2' class='chi_muc'>
                    Thông tin nhân viên duyệt đơn
                </td>
            </tr>
            <tr>
                <td width='15%' align='left'>
                    MSKH: 
                </td>
                <td width='35%'>
                    ".$sql_1['MSKH']."
                </td>
                <td width='1px'></td>
                <td width='15%' align='left'>
                    MSNV: 
                </td>
                <td width='35%'>
                    ".$sql_13['MSNV']."
                </td>
            </tr>
            <tr>
                <td align='left'>
                    Họ tên KH: 
                </td>
                <td>
                    ".$sql_3['HoTenKH']."
                </td>
                <td width='1px'></td>
                <td align='left'>
                    Họ tên NV: 
                </td>
                <td>
                    ".$sql_13['HoTenNV']."
                </td>
            </tr>
            <tr>
                <td weight='auto' align='left'>
                    Địa chỉ: 
                </td>
                <td>
                    ".$sql_5['DiaChi']."
                </td>
                <td width='1px'></td>
                <td colspan='2' align='center'><hr>
                </td>
            </tr>
            <tr>
                <td align='left'>
                    Số điện thoại: 
                </td>
                <td>
                    ".$sql_3['SoDienThoai']."
                </td>
                <td width='1px'></td>
                <td colspan='2' align='center'><hr>
                </td>
            </tr>
            <tr>
                <td align='left'>
                    Email: 
                </td>
                <td>
                ".$sql_3['Email']."
                </td>
                <td width='1px'></td>
                <td colspan='2' align='center'><hr>
                    <div class='chi_muc'>Duyệt đơn hàng</div> 
                </td>
            </tr>
            <tr>
                <td align='left'>
                    Lời nhắn: 
                </td>
                <td>
                ".$sql_1['LoiNhan']."
                </td>
                <td width='1px'></td>
                <td align='left'>
                    Ngày giao hàng dự kiến: 
                </td>
                <td>
                    ".$ngay_GH."
                </td>
            </tr>
            <tr>
                <td align='left'>
                    Ngày đặt hàng: 
                </td>
                <td>
                    ".$sql_1['NgayDH']."
                </td>
                <td width='1px'></td>
                <td align='left'>Duyệt đơn hàng: &nbsp;
                    <a href=".$link_duyet."><button type='button' class='nut_submit'>Duyệt</button></a> 
                </td>
                <td align='right'>Xóa đơn hàng: &nbsp;
                    <a href=".$link_xoa."><button type='button' class='nut_submit'>Xóa</button></a>
                </td>
            </tr>
        </table>";
?>