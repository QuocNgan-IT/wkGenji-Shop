<?php
    for( $i=0;$i<count($_SESSION['MSHH_them_vao_gio']);$i++ ) {
        $name_MSHH = "MSHH_".$i;
        $name_SL = "SL_".$i;

        if( isset($_POST[$name_MSHH]) ) {
            //Xử lý khi số lượng mua > số hàng còn lại
            $sql = "select TenHH,SoLuongHang
                    from hanghoa
                    where MSHH=".$_POST[$name_MSHH].";";
            $sql_1 = $conn_dathang->query($sql)->fetch_array();
            $ten_hang = $sql_1['TenHH'];
            $hang_con = $sql_1['SoLuongHang'];
            
            if( $_POST[$name_SL]>$hang_con ) {
                thong_bao_html("Sản phẩm:\\n".$ten_hang."\\n\\nCó số lượng ".$_POST[$name_SL]." sản phẩm muốn mua vượt quá số lượng ".$hang_con." hàng còn lại !");
                
                // Định gán số lượng mua = hàng còn người dùng cập nhất số lượng nhiều > hàng còn, nhưng ko được :c
                ?>
                    <script type="text/javascript">
                        document.getElementByName('<?php echo $name_SL; ?>').value = <?php echo $hang_con; ?>;  
                        location.reload();                 
                    </script>
                <?php                 
            }
            else {
                $_SESSION['MSHH_them_vao_gio'][$i] = $_POST[$name_MSHH];
                $_SESSION['sl_them_vao_gio'][$i] = $_POST[$name_SL]; 
            }
            //
        }
    }
?>