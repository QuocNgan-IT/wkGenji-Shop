<br>
<div>
    <div class="chi_muc">Sản phẩm mới</div>

    <?php
        $sql = "select MSHH,TenHH,Gia,QuyCach,MaLoaiHang 
        from hanghoa 
        order by MSHH desc
        limit 0,3";
        $sql_1 = $conn_dathang->query($sql);

        echo "<table border='1px' cellspacing='5px' width='95%' align='center'>";   
            while( $sql_2=$sql_1->fetch_array() ) {
                //
                $ma_hang_hoa = $sql_2['MSHH'];
                $sql_3 = "select MaHinh,TenHinh,MSHH 
                    from hinhhanghoa
                    where MSHH='$ma_hang_hoa'";
                $sql_4 = $conn_dathang->query($sql_3)->fetch_array();

                $link_anh = "hinh_anh/san_pham/".$sql_4['TenHinh'];
                $link_chi_tiet = "?thamso=chi_tiet_san_pham&MSHH=".$sql_2['MSHH'];
                echo "<tr>";
                    echo "<td align='center'>";
                    echo "<table border='1px' width='100%'>";
                    echo "<tr>";
                        echo "<td height='250px' align='center'>";
                            echo "<a href='$link_chi_tiet'>";
                                echo "<img width='90%'
                                height='100%' object-fit='fill'; src='$link_anh'>";
                            echo "</a>";
                        echo "</td>";
                    echo "</tr>";
                    echo "<tr height='50px'>";
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
                    echo "</td>";
                echo "</tr>";
            }
        echo "</table>";        
    ?> 
</div>