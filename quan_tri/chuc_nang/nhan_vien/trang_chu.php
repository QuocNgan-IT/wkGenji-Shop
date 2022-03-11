<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<div>
    <body>
        <table width="100%" height="auto">
            <tr>
                <td>
                    <?php
                        include("../khach_hang/chuc_nang/banner/banner.php");
                    ?>
                </td>            
            </tr>
            <tr>
                <td>
                    <div class='menu'>
                        <ul type='none'>
                            <a href="index.php"><li>Trang chủ</li></a>
                            <a href="?thamso=san_pham"><li>Sản phẩm</li></a>
                            <a href="?thamso=quan_ly_don_hang"><li>Đơn hàng</li></a>
                            <a href="?thamso=dang_xuat"><li>Đăng xuất</li></a>
                        </ul>
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>        
        </table>
    </body>

<?php
    include("chuc_nang/quan_tri/dieu_huong.php");
?>

    <footer>
        <br><hr>
        <table width="100%">
            <tr>
                <td width="445px" align="right">
                    Cửa hàng: 
                </td>
                <td width="445px">
                    wkGenji Shop
                </td>
            </tr>
            <tr>
                <td align="right">
                    Nhân viên: 
                </td>
                <td>
                    Huỳnh Quốc Ngạn _ B1805892
                </td>
            </tr>
            <tr>
                <td align="right">
                    Số điện thoại: 
                </td>
                <td>
                    +84 337 *** 009
                </td>
            </tr>
        </table>
        <hr>
    </footer>
</div>
