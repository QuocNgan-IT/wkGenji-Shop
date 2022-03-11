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
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="?thamso=danh_muc">Danh mục</a></li>
                            <li><a href="?thamso=menu">Menu</a></li>
                            <li><a href="?thamso=san_pham">Sản phẩm</a></li>
                            <li><a href="?thamso=don_hang">Đơn hàng</a></li>
                            <li align="right"><a href="?thamso=dang_xuat">Đăng xuất</a></li>
                        </ul>
                    </div>
                </td>
            </tr>  
            <tr>
                <td>
                    <p align="center">
                        Trang Admin đang trong quá trình phát triển, mời đăng nhập bằng tài khoản nhân viên!
                    </p>
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
                    Quản trị viên: 
                </td>
                <td>
                    Huỳnh Quốc Ngạn (wkGenji)
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
