<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<div>
    <form method="POST">
        <table align="center">
            <tr>
                <td>
                    Ký danh: 
                </td>
                <td>
                    <input style="width: 200px" name="ky_danh_ad">
                </td>
            </tr>
            <tr>
                <td>
                    Mật khẩu: 
                </td>
                <td>
                    <input type="password" style="width: 200px" name="mat_khau">
                </td>
            </tr>
            <tr align="center">
                <td>
                    &nbsp;
                </td>
                <td>
                    <input type="submit" name="dang_nhap_ad" value="Đăng nhập">
                </td>
            </tr>
        </table>
    </form>
</div>