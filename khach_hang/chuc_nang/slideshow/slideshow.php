<style type="text/css">
    div.slideshow img {
        width: 100%;
        height: 500px;
        object-fit: fill;
        border-radius: 15px;
    }
</style>

<div class="slideshow" id="slideshow" align="center">
    <?php
        $sql = "select HinhAnh
                from slideshow
                order by ID";
        $sql_1 = $conn_trangweb->query($sql);
        
        while( $sql_2=$sql_1->fetch_array() ) {
            $link_hinh = "hinh_anh/slideshow/".$sql_2['HinhAnh'];

            echo "<img src='".$link_hinh."'>";
        }
    ?>
</div>

<script type="text/javascript">
    var i_img = 0;
    var div_slideshow = document.getElementById("slideshow");
    var img_slideshow = div_slideshow.getElementsByTagName("img");

    for( var i=0;i<img_slideshow.length;i++ ) {
        img_slideshow[i].style.display = "none";
    }

    img_slideshow[0].style.display = "block";

    setInterval(function() {
        img_slideshow[i_img].style.display = "none";
        i_img = i_img + 1;

        if( i_img>=img_slideshow.length ) {
            i_img = 0;
        }

        img_slideshow[i_img].style.display = "block";
    }, 5000);
</script>