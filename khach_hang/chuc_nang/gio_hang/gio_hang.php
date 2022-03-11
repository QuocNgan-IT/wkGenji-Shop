<?php
    //Kiểm tra tình trạng giỏ hàng
    if( isset($_SESSION['MSHH_them_vao_gio']) ) {
        $so_luong = 0;

        for( $i=0;$i<count($_SESSION['MSHH_them_vao_gio']);$i++ ) {
            //Xử lý trường hợp bỏ trống số lượng
            if( $_SESSION['sl_them_vao_gio'][$i]==null ) {
                $_SESSION['sl_them_vao_gio'][$i]=0;
            }
            //

            $so_luong = $so_luong + $_SESSION['sl_them_vao_gio'][$i];
        }
     
        if( $so_luong==0 ) {
            $gio_hang = "khong";
        }
        else {
            $gio_hang = "co";
        }
    }
    else {
        $gio_hang = "khong";
    }
    //

    echo "<div class='chi_muc'>Giỏ hàng</div>";
    echo "<br>";
    if( $gio_hang=="khong" ) {
        echo "Không có sản phẩm trong giỏ hàng";
    }
    else {
        echo "<form action='' method='POST'>";
            //echo "<input type='hidden' name='cap_nhat_gio_hang' value='co'>";
            echo "<table class='bang_gio_hang' align='center'";
                echo "<tr>";
                    echo "<td width='10px' class='chi_muc'>STT</td>";
                    echo "<td width='auto' class='chi_muc'>Tên</td>";
                    echo "<td width='20%' class='chi_muc'>Số lượng</td>";
                    echo "<td width='14%' class='chi_muc'>Đơn giá</td>";
                    echo "<td width='16%' class='chi_muc'>Thành tiền</td>";
                echo "</tr>";
                
                $tong_cong = 0;$STT=0;
                for( $i=0;$i<count($_SESSION['MSHH_them_vao_gio']);$i++ ) {
                    $sql = "select MSHH,TenHH,QuyCach,Gia,SoLuongHang,MaLoaiHang 
                            from hanghoa 
                            where MSHH='".$_SESSION['MSHH_them_vao_gio'][$i]."'";
                    $sql_1 = $conn_dathang->query($sql)->fetch_array();
                    $tien = $sql_1['Gia'] * $_SESSION['sl_them_vao_gio'][$i];
                    $tong_cong = $tong_cong + $tien;
                    $name_MSHH = "MSHH_".$i;
                    $name_SL = "SL_".$i;

                    if( $_SESSION['sl_them_vao_gio'][$i]!=0 ) { 
                        $STT = $STT + 1;
                        echo "<tr>";
                            echo "<td align='center'>".$STT."</td>";
                            echo "<td>".$sql_1['TenHH']."</td>";
                            echo "<td>";
                                echo "<div align='center'>";
                                    echo "<input type='hidden' name='".$name_MSHH."' value='".$_SESSION['MSHH_them_vao_gio'][$i]."'>";
                                    echo "<input type='text' style='width: 50%' id='CNSL' name='".$name_SL."' value='".$_SESSION['sl_them_vao_gio'][$i]."'>";
                                    echo " &nbsp;".$sql_1['QuyCach'];
                                    echo "<input type='hidden' name='cap_nhat_gio_hang' value='co'>";
                                echo "</div>";                                
                            echo "</td>";
                            echo "<td style='text-align: right;'>".$sql_1['Gia']." vnđ </td>";
                            echo "<td style='text-align: right;'>".$tien." vnđ </td>";
                            $_SESSION['gia_don_hang'][$i] = $tien;
                        echo "</tr>";
                    }
                }  
                echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='center'>
                        <input type='submit' class='nut_submit' id='nut_cap_nhat' value='Cập nhật'>
                    </td>";
                    echo "<td>&nbsp;</td>";
                    echo "<td>&nbsp;</td>";
                echo "</tr>"; 
                echo "<tr style='background-color: rgb(255, 150, 200); color: white;'>";
                    echo "<td colspan='3' align='right'>";
                        echo "<div ><strong>TỔNG GIÁ TRỊ ĐƠN HÀNG ==></strong></div>";
                    echo "</td>";
                    echo "<td colspan='2' align='center'>";   
                        echo $tong_cong." VNĐ";
                        $_SESSION['tong_gia_tri'] = $tong_cong;
                    echo "</td>";
                echo "</tr>";       
            echo "</table>";
        echo "</form>";
        echo "<br>";
        include("chuc_nang/gio_hang/bieu_mau_mua_hang.php");
        /*?>
            <div align="center">
                <button class="nut_submit" onclick="myFunction()" id="nut_mua">Tiến hành mua hàng</button>
            </div>
            <hr><br>
            <div id="event" align="center">
                <div class="chi_muc_bang_chi_tiet">
                    Click nút trên để thực hiện mua hàng
                </div>
            </div>

            <script type="text/javascript">
                change = 0

                function myFunction() {
                    if( change==0 ) {
                        document.getElementById("event").innerHTML = "<?php include("chuc_nang/gio_hang/bieu_mau_mua_hang.php"); ?>";
                        
                        document.getElementById("nut_mua").innerHTML = "Hủy mua hàng";

                        document.getElementById("nut_cap_nhat").disable = true;

                        change = 1
                    }
                    else {
                        document.getElementById("event").innerHTML = "<div class='chi_muc_bang_chi_tiet'>Click nút trên để thực hiện mua hàng</div>";

                        document.getElementById("nut_mua").innerHTML = "Tiến hành mua hàng";

                        document.getElementById("CNSL").disable = false;
                        
                        change = 0
                    }
                    
                }
            </script>            
        <?php*/
    }
?>