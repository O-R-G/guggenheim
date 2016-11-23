<!-- 
.thumb (absolute)
    .img-container (relative)
        .square 
        .img
-->

<div id="container">

    <div id="two" class="thumb"><? 
        $number = "2"; 
        ?><div class="img-container">
            <div class="square"></div>
            <img src="media/png/<? echo $number; ?>.png" class="stack centered wide"><?
            $imgdir = "media/" . $number . "/";
            $txtdir = "media/captions/";
            chdir($imgdir);      
            $images = glob("*.jpg");
            chdir("../../");
            foreach($images as $image) {
                $url = $imgdir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='" . $url . "' class='stack centered " . $wide_tall ."'>";
                $caption = file_get_contents("media/txt/" . pathinfo($image, PATHINFO_FILENAME));
                echo "<div class='caption centered'>" . $caption . "</div>";
            }
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="zero" class="thumb"><? 
        $number = "0"; 
        ?><div class="img-container">
            <div class="square"></div>
            <img src="media/png/<? echo $number; ?>.png" class="stack centered wide"><?
            $imgdir = "media/" . $number . "/";
            $txtdir = "media/captions/";
            chdir($imgdir);      
            $images = glob("*.jpg");
            chdir("../../");
            foreach($images as $image) {
                $url = $imgdir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='" . $url . "' class='stack centered " . $wide_tall ."'>";
                $caption = file_get_contents("media/txt/" . pathinfo($image, PATHINFO_FILENAME));
                echo "<div class='caption centered'>" . $caption . "</div>";
            }
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="one" class="thumb"><? 
        $number = "1"; 
        ?><div class="img-container">
            <div class="square"></div>
            <img src="media/png/<? echo $number; ?>.png" class="stack centered wide"><?
            $imgdir = "media/" . $number . "/";
            $txtdir = "media/captions/";
            chdir($imgdir);      
            $images = glob("*.jpg");
            chdir("../../");
            foreach($images as $image) {
                $url = $imgdir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='" . $url . "' class='stack centered " . $wide_tall ."'>";
                $caption = file_get_contents("media/txt/" . pathinfo($image, PATHINFO_FILENAME));
                echo "<div class='caption centered'>" . $caption . "</div>";
            }
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="seven" class="thumb"><? 
        $number = "7"; 
        ?><div class="img-container">
            <div class="square"></div>
            <img src="media/png/<? echo $number; ?>.png" class="stack centered wide"><?
            $imgdir = "media/" . $number . "/";
            $txtdir = "media/captions/";
            chdir($imgdir);      
            $images = glob("*.jpg");
            chdir("../../");
            foreach($images as $image) {
                $url = $imgdir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='" . $url . "' class='stack centered " . $wide_tall ."'>";
                $caption = file_get_contents("media/txt/" . pathinfo($image, PATHINFO_FILENAME));
                echo "<div class='caption centered'>" . $caption . "</div>";
            }
        ?></div>
        <div class="caption">
        </div>
    </div>




    <div id="logo">
        <img src="media/png/logo.png">
    </div>

    <div id="controls">
        <img src="media/svg/stop.svg" id="control">
    </div>    
</div>

<script type="text/javascript" src="<? echo $host ?>/static/js/fade.js"></script>

            
