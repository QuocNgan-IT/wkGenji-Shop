<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<div>
    <form action="" method="POST">
        <table width="90%">
            <tr>
                <td colspan="2">
                    <b style="color: blue; font-size: 20px">Thêm Menu</b>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    Tên: 
                </td>
                <td width="80%">
                    <input style="width: 70%; margin-top: 5px; margin-bottom: 5px;" name="ten" value="">
                </td>
            </tr>
            <tr>
                <td>
                    Loại Menu: 
                </td>
                <td>
                    <?php
                        $a_1 = "";
                        $a_2 = "";

                        if( isset($_SESSION['loai_menu_wr8']) ) {
                            if( $_SESSION['loai_menu_wr8']=="san_pham" ) {
                                $a_2 = "selected";
                            }
                        }
                    ?>

                    <select style="margin-top: 3px; margin-bottom: 3px" name="loai_menu">
                        <option value="" <?php echo $a_1; ?> >Bình thường</option>
                        <option value="san_pham" <?php echo $a_2; ?> >Sản phẩm</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Nội dung: 
                </td>
                <td>
                    <script type="text/javascript">
                        tinymce.init( {
                            selector: '#noi_dung',
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
                    <textarea id="noi_dung" name="noi_dung"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
                <td>
                    <br>
                    <input type="submit" style="width: 30%; height: auto; font-size: large" name="bieu_mau_them_menu" value="Thêm Menu">
                </td>
            </tr>
        </table>
    </form>
</div>