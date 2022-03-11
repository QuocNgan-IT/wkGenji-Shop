<?php
    $sql = "select *
            from banner
            limit 0,1";
    $sql_1 = $conn_trangweb->query($sql)->fetch_array();
    $link = "../khach_hang/hinh_anh/banner/".$sql_1['Banner'];

    echo "<img class='banner' src='$link'>";
?>