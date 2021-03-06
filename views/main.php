<!-- 
.thumb (absolute)
    .img-container (relative)
        .square 
        .img
--><?

function populate($thisnumber) {

    $html  = "<div class='img-container'>";
    $html .= "  <div class='square'></div>";
    $imgdir = "media/" . $thisnumber . "/";
    $txtdir = "media/txt/captions/";
    chdir($imgdir);
    $images = glob("*.jpg");
    if ($thisnumber == "2") $startimg = "96.4511.jpg";
    if ($thisnumber == "0") $startimg = "41.283.jpg";
    if ($thisnumber == "1") $startimg = "92.4113.jpg";
    shuffle($images);
    // array_unshift($images,$startimg);   // insert $startimg at [0]
    array_push($images,$startimg);   // insert $startimg at end
    chdir("../../");
    $i = 0;
    foreach($images as $image) {
        $url = $imgdir . $image;        // getimagesize requires relative url
                $size = getimagesize($url);
                $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
                $html .= "  <img src='" . $url . "' class='stack centered " . $wide_tall ."'>";
                // $captionslong[$i] = file_get_contents($txtdir . "long/" . pathinfo($image, PATHINFO_FILENAME));
                $captionsshort[$i] = file_get_contents($txtdir . "short/" . pathinfo($image, PATHINFO_FILENAME));
                $i++;
    }
    $html .= "</div>";
    $html .= "<div class='caption-container'>";
    $i = 0;
    foreach($captionsshort as $captionshort) {
        $html .= "<div class='caption'>" . nl2br($captionshort) . "</div>";
                $i++;
            }
        $html .= "</div>";
    return $html;
}
?>

<!--[if lt IE 9]>
<div style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; background-color: white; color: black;">
    <div style="position: absolute; top: 50%; left: 50%; width: 300px; height: 300px; margin-top: -150px; margin-left: -150px;">
        This website will not display in your chosen browser. Happy New Year, from everyone at the Guggenheim.
    </div>
</div>
<![endif]-->

<div id="thumb-container">

    <div id="two" class="thumb"><?
        $number = "2"; 
        echo populate($number);
    ?></div>

    <div id="zero" class="thumb"><?
        $number = "0"; 
        echo populate($number);
    ?></div>

    <div id="one" class="thumb"><?
        $number = "1"; 
        echo populate($number);
    ?></div>

    <div id="seven" class="thumb"> 
        <div class="img-container">
            <div class="square"></div>
            <img src="media/7/7.png" class="stack centered wide">
        </div>
       <div class="caption-container">
            <div class="caption"><div id="credits-btn">Credits +</div></div>
        </div>
    </div>
    <!-- see http://stackoverflow.com/questions/6865194/fluid-width-with-equally-spaced-divs -->
    <span class="stretch"></span>
</div>

<div id="credits" class="block"><? 
    $txtdir = "media/txt/captions/long/";
    $credits = file_get_contents($txtdir . "credits.txt");
    echo "<div class='block'>" . $credits . "</div>";
?></div>

<script type="text/javascript" src="<? echo $host ?>/static/js/shuffle.js"></script><?
    // set speed for dev
    // $speed = $_GET["speed"];
    // if (!$speed)
    //    $speed = 1150;
?><script type="text/javascript">
    // var speed = <? echo $speed; ?>;
    if (document.body.addEventListener) {                
        // IE9+ and all major browsers
        document.body.addEventListener("load", init());
    } else {
        // edge cases only, as IE9 already validated with conditional css above
        $html = "<div style='position: fixed; width: 100%; height: 100%; top: 0; left: 0; background-color: white; color: black;'>";
        $html += "<div style='position: absolute; top: 50%; left: 50%; width: 300px; height: 300px; margin-top: -150px; margin-left: -150px;'>";
        $html += "This website will not display in your chosen browser. Happy New Year, from everyone at the Guggenheim.";
        $html += "</div></div>";
        document.write($html);
    }
</script>
