<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<?php
    $so_don_hang = 20;//Số hóa đơn hiển thị trên 1 trang

    if( !isset($_GET['trang']) ) {
        $_GET['trang'] = 1;
    }

    $sql = "select count(*)
            from dathang";
    $sql_1 = $conn_dathang->query($sql)->fetch_array();

    //Tính toán số trang
    $so_trang = ceil( $sql_1[0] / $so_don_hang );

    $vtbd = ($_GET['trang']-1) * $so_don_hang;
    //SoDonDH,MSKH,LoiNhan,MSNV,NgayDH,NgayGH,TongGiaTri,TrangThaiDH
    $sql_2 = "select *
            from dathang
            order by SoDonDH desc
            limit $vtbd,$so_don_hang";
    $sql_3 = $conn_dathang->query($sql_2);
           
?>
<table width="100%" align="center" class="bang_gio_hang">
    <tr class="chi_muc">
        <td width="7%">SoDonDH</td>
        <td width="5%">MSKH</td>
        <td width="5%">MSNV</td>
        <td width="18%">Ngày DH</td>
        <td width="18%">Ngày GH</td>
        <td width="15%">Giá trị DH</td>
        <td width="18%">Trạng thái DH</td>
        <td width="10%">Chi tiết DH</td>
        <td width="4%">Xóa</td>
    </tr>
    <?php
        while( $sql_4=$sql_3->fetch_array() ) {
            $SoDonDH = $sql_4['SoDonDH'];
            $MSKH = $sql_4['MSKH'];
            $MSNV = $sql_4['MSNV'];
            $NgayDH = $sql_4['NgayDH'];
            $NgayGH = $sql_4['NgayGH'];
            $GiaTriDH = $sql_4['TongGiaTri'];
            $TrangThaiDH = $sql_4['TrangThaiDH'];
            $ChiTietDH = "?thamso=xem_don_hang&SoDonDH=".$SoDonDH."&trang=".$_GET['trang'];
            $XoaDH = "?xoa_don_hang=co&SoDonDH=".$SoDonDH;
    ?>
    <tr align="center">
        <td><?php echo $SoDonDH; ?></td>
        <td><?php echo $MSKH; ?></td>
        <td><?php echo $MSNV; ?></td>
        <td><?php echo $NgayDH; ?></td>
        <td><?php echo $NgayGH; ?></td>
        <td style='text-align: right'><?php echo $GiaTriDH." vnđ &nbsp;"; ?></td>
        <td><?php echo $TrangThaiDH; ?></td>
        <td align="center"><a href="<?php echo $ChiTietDH; ?>">Xem</a></td>
        <td align="center"><a href="<?php echo $XoaDH; ?>">Xóa</a></td>
    </tr>
    <?php
        }
    ?>
    <tr>
        <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="9" align="center">
            <div class="phan_trang">
                <?php
                    for( $i=1;$i<=$so_trang;$i++ ) {
                        $link_phan_trang="?thamso=quan_ly_don_hang&trang=".$i;
                        echo "<a href='$link_phan_trang'>";
                            echo $i;
                        echo "</a>";
                    }
                ?>
            </div>
        </td>
    </tr>
</table>