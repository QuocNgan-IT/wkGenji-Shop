<?php
    //Đưa thông tin từ tài khoản vào biểu mẫu
    //MSKH,HoTenKH,SoDienThoai,Email,KyDanh,MatKhau
    $sql = "select *
            from khachhang
            where KyDanh like '".$_SESSION['ky_danh']."';";
    $sql_1 = $conn_dathang->query($sql)->fetch_array();
    
    //MaDC,DiaChi,MSKH
    $sql_2 = "select *
            from diachikh
            where MSKH='".$sql_1['MSKH']."';";
    $sql_3 = $conn_dathang->query($sql_2)->fetch_array();
    if( $sql_1[0]==1 and $sql_3[0]==1 ) { //Có tồn tại thông tin của khách hàng
        $ten = $sql_1['HoTenKH'];
        $dchi = $sql_3['DiaChi'];
        $sdt = $sql_1['SoDienThoai'];
    }
    else {
        $ten = "";
        $dchi = "";
        $sdt = "";
    }
    //

    echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='thong_tin_dat_hang' value='co'>";
        echo "<table width='80%' align='center' class='chi_muc_bang required'>";
            echo "<tr>";
                echo "<td colspan='2' class='chi_muc'>";
                    echo "Thông tin mua hàng";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td style='width: 200px; text-indent: 10px'>";
                    echo "<label>Tên người mua (</label>): ";
                echo "</td>";
                echo "<td>";
                    echo "<input type='text' style='width: 99%' name='ten_nguoi_mua' value='$ten'>";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td style='width: 200px; text-indent: 10px'>";
                    echo "<label>Địa chỉ (</label>): ";
                echo "</td>";
                echo "<td>";
                    echo "<textarea style='resize: none; width: 99%; height: 100px' name='dia_chi'>$dchi</textarea>";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td style='width: 200px; text-indent: 10px'>";
                    echo "<label>Số điện thoại (</label>): ";
                echo "</td>";
                echo "<td>";
                    echo "<input type='text' style='width: 99%' name='so_dien_thoai' value='$sdt'>";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td style='width: 200px; text-indent: 10px'>";
                    echo "Email: ";
                echo "</td>";
                echo "<td>";
                    echo "<input type='text' style='width: 99%' name='email'>";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td style='width: 200px; text-indent: 10px'>";
                    echo "Lời nhắn: ";
                echo "</td>";
                echo "<td>";
                    echo "<textarea style='resize: none; width: 99%; height: 200px' name='loi_nhan'></textarea>";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";                
                echo "<td colspan='2' align='center'>";
                    echo "<hr>";
                    echo "<input type='submit' class='nut_submit' value='Mua hàng'>";
                echo "</td>";
            echo "</tr>";
        echo "</table>";
    echo "</form>";

    /*
    ?>
        <script type="text/javascript">
            document.getElementByName("ten_nguoi_mua").value = <?php echo $sql_1['HoTenKH']; ?>;
            document.getElementByName("dia_chi").value = <?php echo $sql_3['DiaChi']; ?>;
            document.getElementByName("so_dien_thoai").value = <?php echo $sql_1['SoDienThoai']; ?>;
        </script>
    <?php
    */
?>