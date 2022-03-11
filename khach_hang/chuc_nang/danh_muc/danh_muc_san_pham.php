<?php
    $sql = "select * 
            from loaihanghoa 
            order by MaLoaiHang";
    $sql_1 = $conn_dathang->query($sql);

    echo "<div class='danh_muc'>";
        echo "<div class='chi_muc'>Danh mục</div>";
        echo "<ul type='none'>";
            while( $sql_2=$sql_1->fetch_array() ) {
                $link = "?thamso=xuat_san_pham&MaLoaiHang=".$sql_2['MaLoaiHang'];
                echo "<a href='$link'><li>";
                    echo $sql_2['TenLoaiHang'];
                echo "</li></a>";
            }
        echo "</ul>";
    echo "</div>";
?>