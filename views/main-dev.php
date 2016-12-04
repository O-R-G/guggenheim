<!-- 
.thumb (absolute)
    .img-container (relative)
        .square 
        .img
-->

<?
/*
function populate($thisnumber) {

	$html  = "<div class='img-container'>";
        $html .= "	<div class='square'></div>";
	$imgdir = "media/" . $thisnumber . "/";
	$txtdir = "media/txt/captions/";
	chdir($imgdir);      
	$images = glob("*.jpg");
	shuffle($images);
	chdir("../../");
	$i = 0;       
	foreach($images as $image) {
                
		$url = $imgdir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                $html .= "	<img src='" . $url . "' class='stack centered " . $wide_tall ."'>";
                $captionslong[$i] = file_get_contents($txtdir . "long/" . pathinfo($image, PATHINFO_FILENAME));
                $captionsshort[$i] = file_get_contents($txtdir . "short/" . pathinfo($image, PATHINFO_FILENAME));
                $i++;
	}
        $html .= "</div>";
        $html .= " and";

        $html .= "<div class='caption-container'>";
	$i = 0;
	foreach($captionsshort as $captionshort) {
                
		$html .= "<div class='caption'>" . nl2br($captionshort) . "</div>";
                $i++;
            }
        $html .= "</div>";
	return $html;
}
*/
?>


<div id="logo">
    <img src="media/svg/logo.svg" id="logo-svg">
</div>    

<div id="thumb-container">
    
    <div id="two" class="thumb"><? 
        $number = "2"; 
        ?><div class="img-container">
            <div class="square"></div><?
            $imgdir = "media/" . $number . "/";
            $txtdir = "media/txt/captions/";
            chdir($imgdir);      
            $images = glob("*.jpg");
	    shuffle($images);
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
        <div class="caption-container"><?
            $i = 0;
            foreach($captionsshort as $captionshort) {
                echo "<div class='caption'>" . nl2br($captionshort) . "</div>";
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
	    shuffle($images);
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
        <div class="caption-container"><?
            $i = 0;
            foreach($captionsshort as $captionshort) {
                echo "<div class='caption'>" . nl2br($captionshort) . "</div>";
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
        <div class="caption-container"><?
            $i = 0;
            foreach($captionsshort as $captionshort) {
                echo "<div class='caption'>" . nl2br($captionshort) . "</div>";
                $i++;
            }
        ?></div>
    </div>

    <div id="seven" class="thumb"><? 
        $number = "7";
        ?><div class="img-container">
            <div class="square"></div>
            <img src="media/png/<? echo $number; ?>.png" class="stack centered wide"><?
        ?></div>
       <div class="caption-container">
            <div class="caption"><a href="javascript: document.getElementById('credits').style.display='inline-block';">Credits +</a></div>
        </div>
    </div>

</div>

<div id="credits" class="block"><? 
    $txtdir = "media/txt/captions/long/";
    chdir($txtdir);
    $txts = glob("*");
    chdir("../../../../");
    $i = 0;
    foreach($txts as $txt) {
        $captionslong[$i] = file_get_contents($txtdir . $txt);
        echo "<div class='block'>" . $captionslong[$i] . "</div>";
        $i++;
    }
?></div>
    
<!-- <div id="controls">
    <img src="media/svg/stop.svg" id="control">
</div> -->

<script type="text/javascript" src="<? echo $host ?>/static/js/shuffle.js"></script>

