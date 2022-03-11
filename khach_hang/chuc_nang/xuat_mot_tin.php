<?php
    $id = $_GET['ID'];

    $sql = "select *
            from menu
            where ID='$id'";
    $sql_1 = $conn_trangweb->query($sql)->fetch_array();

    echo "<div class='chi_muc'>";
        echo $sql_1['TenMenu'];
    echo "</div>";
    echo $sql_1['NoiDung'];
?>