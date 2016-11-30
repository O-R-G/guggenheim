<!-- 
.thumb (absolute)
    .img-container (relative)
        .square 
        .img
-->

<div id="thumb-container">

    <div id="two" class="thumb"><? 
        $number = "2"; 
        ?><div class="img-container">
            <div class="square"></div><?
            $imgdir = "media/" . $number . "/";
            $txtdir = "media/txt/captions/";
            chdir($imgdir);      
            $images = glob("*.jpg");
            chdir("../../");
            $i = 0;
            foreach($images as $image) {
                $url = $imgdir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='" . $url . "' class='stack centered " . $wide_tall ."'>";
                $captionslong[$i] = file_get_contents($txtdir . "long/" . pathinfo($image, PATHINFO_FILENAME));
                $captionsshort[$i] = file_get_contents($txtdir . "short/" . pathinfo($image, PATHINFO_FILENAME));
                $i++;
            }
        ?></div>
        <div class="caption"><?
            $i = 0;
            foreach($captionsshort as $captionshort) {
                echo "<div class='caption'>" . $captionshort . "</div>";
                $i++;
            }
        ?></div>
    </div>

    <div id="zero" class="thumb"><? 
        $number = "0"; 
        ?><div class="img-container">
            <div class="square"></div><?
            $imgdir = "media/" . $number . "/";
            $txtdir = "media/txt/captions/";
            chdir($imgdir);      
            $images = glob("*.jpg");
            chdir("../../");
            $i = 0;
            foreach($images as $image) {
                $url = $imgdir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='" . $url . "' class='stack centered " . $wide_tall ."'>";
                $captionslong[$i] = file_get_contents($txtdir . "long/" . pathinfo($image, PATHINFO_FILENAME));
                $captionsshort[$i] = file_get_contents($txtdir . "short/" . pathinfo($image, PATHINFO_FILENAME));
                $i++;
            }
        ?></div>
        <div class="caption"><?
            $i = 0;
            foreach($captionsshort as $captionshort) {
                echo "<div class='caption'>" . $captionshort . "</div>";
                $i++;
            }
        ?></div>
    </div>

    <div id="one" class="thumb"><? 
        $number = "1"; 
        ?><div class="img-container">
            <div class="square"></div><?
            $imgdir = "media/" . $number . "/";
            $txtdir = "media/txt/captions/";
            chdir($imgdir);      
            $images = glob("*.jpg");
            chdir("../../");
            $i = 0;
            foreach($images as $image) {
                $url = $imgdir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='" . $url . "' class='stack centered " . $wide_tall ."'>";
                $captionslong[$i] = file_get_contents($txtdir . "long/" . pathinfo($image, PATHINFO_FILENAME));
                $captionsshort[$i] = file_get_contents($txtdir . "short/" . pathinfo($image, PATHINFO_FILENAME));
                $i++;
            }
        ?></div>
        <div class="caption"><?
            $i = 0;
            foreach($captionsshort as $captionshort) {
                echo "<div class='caption'>" . $captionshort . "</div>";
                $i++;
            }
        ?></div>
    </div>

    <div id="seven" class="thumb"><? 
        $number = "7"; 
        ?><div class="img-container">
            <div class="square"></div>
            <img src="media/png/<? echo $number; ?>.png" class="stack centered wide"><?
            // removed for now, but should update class 
            // so that it is not shuffled like others
        ?></div>
        <div class="caption">
        </div>
    </div>

</div>

    <div id="logo">
        <img src="media/svg/logo.svg" id="logo-svg">
    </div>    
   
    <!-- <div id="controls">
        <img src="media/svg/stop.svg" id="control">
    </div> -->

<script type="text/javascript" src="<? echo $host ?>/static/js/fade.js"></script>

            
