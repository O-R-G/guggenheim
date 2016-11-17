<div id="container">

    <div id="two" class="thumb">
        <div class="img-container">
            <div class="square"></div>
            <img src="media/png/2.png" class="stack centered wide"><?
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
            <img src="media/png/0.png" class="stack centered wide"><?
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
            <img src="media/png/1.png" class="stack centered wide"><?
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
            <img src="media/png/7.png" class="stack centered wide"><?
            $dir = "../7/";
            chdir($dir);      
            $images = glob("*.jpg");
            foreach($images as $image) 
                echo "<img src='media/7/" . $image . "' class='stack centered wide'>";
        ?></div>
        <div class="caption">
        </div>
    </div>

    <!-- <div id="logo">
        <img src="media/png/logo.png">
    </div> -->
 
</div>

<script type="text/javascript" src="<? echo $host ?>/static/js/fade.js"></script>


