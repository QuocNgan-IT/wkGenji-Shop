<?php
    $sql = "select ID,TenMenu,LoaiMenu
            from menu 
            order by ID";
    $sql_1 = $conn_trangweb->query($sql);

    echo "<div class='menu'>";
        echo "<ul type='none'>";
            echo "<a href='index.php'><li>Trang chủ</li></a>";
            while( $sql_2=$sql_1->fetch_array() ) {
                if( $sql_2['LoaiMenu'] == "" ) {
                    $link_menu = "?thamso=xuat_mot_tin&ID=".$sql_2['ID'];
                }
                if( $sql_2['LoaiMenu'] == "san_pham" ) {
                    $link_menu = "?thamso=xuat_san_pham_2";
                }
                echo "<a href='$link_menu'><li>";
                    echo $sql_2['TenMenu'];
                echo "</li></a>";
            }
        echo "</ul>";
    echo "</div>";
?>