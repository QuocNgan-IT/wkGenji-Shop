<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<form action="" method="POST" enctype="multipart/form-data">
    <table width="95%" align="center" class="chi_muc_bang">
        <tr>
            <td colspan="2" class="chi_muc">
                Thêm sản phẩm
            </td>
        </tr>
        <tr>
            <td width="20%">Tên sản phẩm: </td>
            <td width="80%">
            <input style="width: 70%; margin-top: 5px; margin-bottom: 5px;" name="ten_sp" value="">
            </td>
        </tr>
        <tr>
            <td>Danh mục:</td>
            <td>
                <?php
                    if( !isset($_SESSION['danh_muc_sp']) ) {
                        $_SESSION['danh_muc_sp']="";
                    }
                ?>
                <select name="danh_muc_sp" style="margin-top: 5px; margin-bottom: 5px;">
                    <?php
                        //MaLoaiHang,TenLoaiHang
                        $sql = "select *
                                from loaihanghoa
                                order by MaLoaiHang";
                        $sql_1 = $conn_dathang->query($sql);

                        $lua_chon="";

                        while( $sql_2=$sql_1->fetch_array() ) {
                            $ten_danh_muc = $sql_2['TenLoaiHang'];
                            $ma_danh_muc = $sql_2['MaLoaiHang'];

                            if( $_SESSION['danh_muc_sp']==$ma_danh_muc ) {
                                $lua_chon = "selected";
                            }

                            echo "<option value='$ma_danh_muc' $lua_chon>";
                                echo $ten_danh_muc;
                            echo "</option>";
                            $_SESSION['danh_muc_sp'] = $ma_danh_muc;
                            $lua_chon="";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Hình ảnh: </td>
            <td>
                <input type="file" name="hinh_anh">
            </td>
        </tr>
        <tr>
            <td>Giá: </td>
            <td>
            <input style="width: 70%; margin-top: 5px; margin-bottom: 5px;" name="gia_sp" value="">
            </td>
        </tr>
        <tr>
            <td>Số lượng: </td>
            <td>
            <input style="width: 70%; margin-top: 5px; margin-bottom: 5px;" name="sl_sp" value="">
            </td>
        </tr>
        <tr>
            <td>Quy cách: </td>
            <td>
            <input style="width: 70%; margin-top: 5px; margin-bottom: 5px;" name="quy_cach_sp" value="">
            </td>
        </tr>
        <tr>
            <td>Mô tả: </td>
            <td>
                <script type="text/javascript">
                    tinymce.init( {
                        selector: '#mo_ta_sp',
                        theme: 'modern',
                        width: '100%',
                        max_height: 500,
                        plugins: [
                            'advlist autoresize autolink lists charmap preview hr anchor pagebreak',
                            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                            'save table contextmenu directionality emoticons template paste textcolor jbimages'
                        ],
                        menubar: [
                            'insert'
                        ],
                        toolbar: [ 
                            'preview | undo redo | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent |',
                            ' bold italic |  forecolor backcolor emoticons | jbimages'
                        ],
                        autoresize_bottom_margin: 'auto',
                        relative_urls: false
                    } );
                </script>
                <!-- Thông tin thêm về TinyMCE:
                    - Config: https://www.tiny.cloud/docs-4x/configure/editor-appearance/ 
                    
                    - Toolbar: https://www.tiny.cloud/docs-4x/advanced/editor-control-identifiers/#toolbarcontrols 
                    
                    - Feature: https://www.tiny.cloud/docs/demo/full-featured/ -->
                <textarea id="mo_ta_sp" name="mo_ta_sp"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
            <td>
                <br>
                <input type="submit" style="width: 30%; height: auto; font-size: medium" name="bieu_mau_them_san_pham" value="Thêm Sản phẩm">
            </td>
        </tr>
    </table>
</form>