<?php
    $_SESSION['trang_chi_tiet_gio_hang'] = "co";
    $ma_hang_hoa = $_GET['MSHH'];

    //MSHH,TenHH,QuyCach,MoTa,Gia,SoLuongHang,MaLoaiHang
    $sql = "select *
            from hanghoa
            where MSHH='$ma_hang_hoa'";
    $sql_1 = $conn_dathang->query($sql)->fetch_array();
    //MaHinh,TenHinh,MSHH
    $sql_2 = "select *
            from hinhhanghoa
            where MSHH='$ma_hang_hoa'";
    $sql_3 = $conn_dathang->query($sql_2)->fetch_array();
    $link_anh = "hinh_anh/san_pham/".$sql_3['TenHinh'];

    echo "<div class='chi_muc'>Chi tiết sản phẩm</div>";
    echo "<table border='1px' cellspacing='3px' width='100%' align='center'>";
        echo "<tr>";
            echo "<td rowspan='4' width='50%' align='center'>";
                echo "<img height='auto' width='100%' object-fit='fill' src='$link_anh'>";
            echo "</td>";
            echo "<td class='chi_muc' height='80px'>";
                echo $sql_1['TenHH'];
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='chi_muc_bang_chi_tiet' height='50px'>";
                echo "Giá: ".$sql_1['Gia']."/".$sql_1['QuyCach'];
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='chi_muc_bang_chi_tiet' height='150px'>";
                echo "<form>";
                    echo "<input type='hidden' name='thamso' value='them_vao_gio'>";
                    echo "<input type='hidden' name='MSHH' value='".$_GET['MSHH']."'>";
                    echo "<b>Chọn mua: </b>";
                    echo "<input type='text' name='so_luong_mua' value='1' style='width: 40px'>";
                    echo "&nbsp;".$sql_1['QuyCach'];
                    echo "<hr>";
                    echo "Hàng còn lại: ".$sql_1['SoLuongHang']."&nbsp;".$sql_1['QuyCach'];
                    echo "<br><br>";
                    if( !isset($_SESSION['xac_dinh_dang_nhap']) or $_SESSION['xac_dinh_dang_nhap']=="khong" ) {
                        echo "<div style='color: red'>Mời đăng nhập để thêm sản phẩm vào giỏ!</div>";
                    }
                    else {
                        echo "<input type='submit' class='nut_submit' value='Thêm vào giỏ hàng' style='margin-left: 15px'>";
                    }
                    
                echo "</form>";
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td class='chi_muc_bang_chi_tiet' height='auto' style='vertical-align: top'>";
                echo "<div><b>Mô tả</b></div>";
                echo "<hr>";
                echo $sql_1['MoTa'];
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td colspan='2' class='chi_muc_bang_chi_tiet'>";
                echo "<div class='chi_muc'>";
                    echo "Phần đánh giá & Bình luận";
                echo "</div>";
                echo "<br><hr>";
                echo "<p align='center'>Tính năng đang trong quá trình phát triển..</p>";
                echo "<hr><br>";
            echo "</td>";
        echo "</tr>";
    echo "</table>";
?>