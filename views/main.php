<!-- 
.thumb (absolute)
    .img-container (relative)
        .square 
        .img
-->

<?
// adjust chdir logic so tht each one works
?>

<div id="container">

    <div id="two" class="thumb">
        <div class="img-container">
            <div class="square"></div>
            <img src="media/png/2.png" class="stack centered wide"><?
            $dir = "media/2/";
            chdir($dir);      
            $images = glob("*.jpg");
            foreach($images as $image) {
                $url = "../../" . $dir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='media/2/" . $image . "' class='stack centered " . $wide_tall ."'>";
            }
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="zero" class="thumb">
        <div class="img-container">
            <div class="square"></div>
            <img src="media/png/0.png" class="stack centered wide"><?
            $dir = "media/2/";
            // chdir($dir);      
            $images = glob("*.jpg");
            foreach($images as $image) {
                $url = "../../" . $dir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='media/2/" . $image . "' class='stack centered " . $wide_tall ."'>";
            }
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="one" class="thumb">
        <div class="img-container">
            <div class="square"></div>
            <img src="media/png/1.png" class="stack centered wide"><?
            $dir = "media/2/";
            // chdir($dir);      
            $images = glob("*.jpg");
            foreach($images as $image) {
                $url = "../../" . $dir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='media/2/" . $image . "' class='stack centered " . $wide_tall ."'>";
            }
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="seven" class="thumb">
        <div class="img-container">
            <div class="square"></div>
            <img src="media/png/7.png" class="stack centered wide"><?
            $dir = "media/2/";
            // chdir($dir);      
            $images = glob("*.jpg");
            foreach($images as $image) {
                $url = "../../" . $dir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                echo "<img src='media/2/" . $image . "' class='stack centered " . $wide_tall ."'>";
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











<!-- old
<div id="container">
    <div id="two" class="thumb">
        <div class="img-container">
            <div class="square"></div>
            <img src="media/png/k/2.png" class="stack centered wide"><?
            $dir = "media/2/";
            chdir($dir);      
            $images = glob("*.jpg");
            foreach($images as $image) 
                echo "<img src='media/2/" . $image . "' class='stack centered wide'>";
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="zero" class="thumb">
        <div class="img-container">
            <div class="square"></div>
            <img src="media/png/k/0.png" class="stack centered wide"><?
            $dir = "../0/";
            chdir($dir);      
            $images = glob("*.jpg");
            foreach($images as $image) 
                echo "<img src='media/0/" . $image . "' class='stack centered wide'>";
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="one" class="thumb">
        <div class="img-container">
            <div class="square"></div>
            <img src="media/png/k/1.png" class="stack centered wide"><?
            $dir = "../1/";
            chdir($dir);      
            $images = glob("*.jpg");
            foreach($images as $image) 
                echo "<img src='media/1/" . $image . "' class='stack centered wide'>";
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="seven" class="thumb">
        <div class="img-container">
            <div class="square"></div>
            <img src="media/png/k/7.png" class="stack centered wide"><?
            $dir = "../7/";
            chdir($dir);      
            $images = glob("*.jpg");
            foreach($images as $image) 
                echo "<img src='media/7/" . $image . "' class='stack centered wide'>";
        ?></div>
        <div class="caption">
        </div>
    </div>

    <div id="logo">
        <img src="media/png/logo.png">
    </div>
 
</div>








<div class="thumb">
    <div class="img-container">
        <div class="square"></div>   
            <img src="media/7/2011.17_ph_web.jpg" class="stack centered tall">
    </div>
</div>

<div class="thumb">
    <div class="img-container">
        <div class="square"></div>   
            <img src="media/7/2012.147_ph2.jpg" class="stack centered wide">
    </div>
</div>

<div class="thumb">
    <div class="img-container">
        <div class="square"></div>   
            <img src="media/7/2011.17_ph_web.jpg" class="stack centered tall">
    </div>
</div>

<div class="thumb">
    <div class="img-container">
        <div class="square"></div>   
            <img src="media/7/2011.17_ph_web.jpg" class="stack centered tall">
    </div>
</div>

-->



            
