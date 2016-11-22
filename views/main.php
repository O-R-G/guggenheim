<!-- 
.thumb (absolute)
    .img-container (relative)
        .square 
        .img
-->

<div id="container">

    <div id="two" class="thumb">
        <div class="img-container">
            <div class="square"></div>
            <img src="media/png/2.png" class="stack centered wide"><?
            $dir = "media/2/";
            chdir($dir);      
            $images = glob("*.jpg");
            chdir("../../");
            foreach($images as $image) {
                $url = $dir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='" . $url . "' class='stack centered " . $wide_tall ."'>";
            }
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="zero" class="thumb">
        <div class="img-container">
            <div class="square"></div>
            <img src="media/png/0.png" class="stack centered wide"><?
            $dir = "media/0/";
            chdir($dir);      
            $images = glob("*.jpg");
            chdir("../../");
            foreach($images as $image) {
                $url = $dir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='" . $url . "' class='stack centered " . $wide_tall ."'>";
            }
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="one" class="thumb">
        <div class="img-container">
            <div class="square"></div>
            <img src="media/png/1.png" class="stack centered wide"><?
            $dir = "media/1/";
            chdir($dir);      
            $images = glob("*.jpg");
            chdir("../../");
            foreach($images as $image) {
                $url = $dir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='" . $url . "' class='stack centered " . $wide_tall ."'>";
            }
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="seven" class="thumb">
        <div class="img-container">
            <div class="square"></div>
            <img src="media/png/7.png" class="stack centered wide"><?
            $dir = "media/7/";
            chdir($dir);      
            $images = glob("*.jpg");
            chdir("../../");
            foreach($images as $image) {
                $url = $dir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='" . $url . "' class='stack centered " . $wide_tall ."'>";
            }
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="logo">
        <img src="media/png/logo.png">
    </div>
    
</div>

<script type="text/javascript" src="<? echo $host ?>/static/js/fade.js"></script>

            
