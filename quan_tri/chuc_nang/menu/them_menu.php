<?php
    if( !isset($bien_bao_mat) ) {
        exit();
    }
    /* Nếu truy cập trang admin bằng cách thức khác ngoài "localhos/b1805892/admin" thì sẽ không hiển thị trang web */
    /* Ví dụ truy cập bằng "localhost/b1805892/admin/chuc_nang/quan_tri/khung_dang_nhap.php" thì trang web sẽ không hiển thị */
?>

<?php
    $ten_menu = trim($_POST['ten']);
    //Thay ký tự ' thành ký tự đặc biệt ' (mã &#39;) để tránh xung đột với code sql
    $ten_menu = str_replace("'","&#39;",$ten_menu);
    $loai_menu = $_POST['loai_menu'];
    $noi_dung = $_POST['noi_dung'];
    $noi_dung = str_replace("'","&#39;",$noi_dung);

    if( $ten_menu!="" ) {
        $sql = "insert into menu (id,ten,noi_dung,loai_menu)
                value (NULL,'$ten_menu','$noi_dung','$loai_menu')";
        $conn_trangweb->query($sql);
        $_SESSION['loai_menu_wr8'] = $loai_menu;
    }
    else {
        thong_bao_html("Chưa điền tên Menu !");
    }
?>