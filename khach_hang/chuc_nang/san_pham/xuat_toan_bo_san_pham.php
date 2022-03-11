<?php
   //Tính toán số sản phẩm để hiển thị theo trang
    $so_du_lieu = 15;
    $sql = "select count(*)
            from hanghoa";
    $sql_1 = $conn_dathang->query($sql)->fetch_array();
    $so_trang = ceil( $sql_1[0] / $so_du_lieu );

    if( !isset($_GET['trang']) ) {
        $vtbd = 0;
    }
    else {
        $vtbd = ($_GET['trang']-1) * $so_du_lieu;
    }

    //
    $sql = "select MSHH,TenHH,QuyCach,Gia 
            from hanghoa 
            order by MSHH desc
            limit $vtbd,$so_du_lieu";
    $sql_1 = $conn_dathang->query($sql);
    
    echo "<div class='chi_muc'>Toàn bộ sản phẩm</div>";
    echo "<table border='1px' cellspacing='5px' width='100%'>";
    while( $sql_2=$sql_1->fetch_array()) {
        echo "<tr>";
            for( $i=1;$i<=5;$i++ ) {
                echo "<td width='20%'>";
                    if( $sql_2!=false ) {
                        //Lấy TenHinh ứng mới MSHH
                        $ma_hang_hoa = $sql_2['MSHH'];
                        $sql_3 = "select MaHinh,TenHinh,MSHH 
                            from hinhhanghoa
                            where MSHH='$ma_hang_hoa'";
                        $sql_4 = $conn_dathang->query($sql_3)->fetch_array();

                        $link_anh = "hinh_anh/san_pham/".$sql_4['TenHinh'];
                        $link_chi_tiet = "?thamso=chi_tiet_san_pham&MSHH=".$ma_hang_hoa;

                        //Màu mè tý :)
                        echo "<table border='1px' width='100%'>";
                            echo "<tr>";
                                echo "<td height='300px' align='center'>";
                                    echo "<a href='$link_chi_tiet'>";
                                        echo "<img width='100%'
                                        height='100%' object-fit='fill'; src='$link_anh'>";
                                    echo "</a>";
                                echo "</td>";
                            echo "</tr>";
                            echo "<tr height='80px'>";
                                echo "<td align='center'>";
                                    echo "<a href='$link_chi_tiet'>";
                                        echo $sql_2['TenHH'];
                                    echo "</a>";
                                echo "</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td align='center'>";
                                    echo "Giá: ".$sql_2['Gia']."vnđ/".$sql_2['QuyCach'];
                                echo "</td>";
                            echo "</tr>";
                        echo "</table>";
                    }
                    else {
                        echo "&nbsp;";
                    }
                echo "</td>";
                //Nếu i=5 thì bỏ qua lần lấy dữ liệu đấy, việc đấy để while xử lý
                if( $i!=5 ) {
                    $sql_2 = $sql_1->fetch_array();
                }
            }
        echo "</tr>";
        //Cho thêm khoảng trống giữa các dòng
        echo "<tr>";
        for( $i=1;$i<=5;$i++ ) {
            echo "<td style='border: none; font-size: smaller; color: gray' align=' center'>wkGenji Shop</td>";
        }
        echo "</tr>";
    }
        echo "<tr>";
            echo "<td colspan='5' align='center'>";
                echo "<div class='phan_trang'>";
                    for( $i=1;$i<=$so_trang;$i++ ) {
                        $link = "?thamso=xuat_san_pham_2&trang=".$i;
                        echo "<a href='$link'>";
                            echo $i; echo " ";
                        echo "</a>";
                    }
                echo "</div>";
            echo "</td>";
        echo "</tr>";
    echo "</table>";
?>