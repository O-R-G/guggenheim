// get all children imgs
// fade opacity between
// based on modernart gallery.js
// requires html/css:
//  .thumb
//    .img-container
//      .square
//      .img centered [wide][tall]
//    .caption

var imgcontainers = [];
var captioncontainers = [];
var imgs = [];
var captions = [];
var index;
var index0 = 1;
var index1 = 1;
var index2 = 1;
var index3 = 1;
var o_src;
var gallery;
var fullscreen;
var fullwindow;
var speed = 500;
var timers = [];  // timer ids
var running;
var mobile = false;
var debug = false;

// init

function init() {

    // imgs[], captions[] return 2d array of htmlcollection objects

    imgcontainers = document.getElementsByClassName('img-container');
    captioncontainers = document.getElementsByClassName('caption-container');
    for (var i = 0; i < imgcontainers.length; i++)
        imgs[i] = imgcontainers[i].children;        
    for (var i = 0; i < captioncontainers.length; i++)
        captions[i] = captioncontainers[i].children;

    // shuffle(imgs);       

    window.onclick = function(e) {
        if (running) {
            for (var i = 0; i < captioncontainers.length; i++)
                captioncontainers[i].style.display = "block";
            for (var i = 0; i < timers.length; i++)
                clearTimeout(timers[i]);
            running = null;
        }
        else {
            for (var i = 0; i < captioncontainers.length; i++)
                captioncontainers[i].style.display = "none";
            updateall();
        }
        // e.preventDefault(); 
        // e.stopPropagation();
        if (debug) debuglog(e); 
    };

    updateall();
}
init();


// update

function update(thisstack, thisindex, thisspeed) {

    var previndex = (thisindex - 1) % imgs[thisstack].length;
    if (previndex == 0) previndex = imgs[thisstack].length - 1;
    var thisimg = imgs[thisstack][thisindex];
    var previmg = imgs[thisstack][previndex];        
    var thiscaption = captions[thisstack][thisindex-1];
    var prevcaption = captions[thisstack][previndex-1];        
    thisimg.style.display = "block";
    thiscaption.style.display = "block";
    if (previndex != thisindex) {
        previmg.style.display = "none";
        prevcaption.style.display = "none";
    }
    thisindex++;
    thisindex %= imgs[thisstack].length;
    if (thisindex == 0) thisindex++;        
    timers[thisstack] = setTimeout(function(){ update(thisstack, thisindex, thisspeed); }, thisspeed);
    if (debug) debuglog(imgs[thisstack].length + " : " + thisindex + " / " + previndex);
    return thisindex;
}

function updateall() {

        index0 = update(0, index0, 5000);
        index1 = update(1, index1, 9000);
        index2 = update(2, index2, 8000);
        index3 = update(3, index3, 10000000000000000000000);
        running = true;
}


// utility

function shuffle (array) {

    var i = 0, j = 0, temp = null
    for (i = array.length - 1; i > 0; i -= 1) {
        j = Math.floor(Math.random() * (i + 1))
        temp = array[i]
        array[i] = array[j]
        array[j] = temp
    }
}

function debuglog(thisdebugstring) {

    console.log(thisdebugstring);
    // console.log("+");
}

/*
// iOS device orientation

function readdeviceorientation() {
    var thisimgcontainer = gallery.parentElement;
    if (Math.abs(window.orientation) === 90) {
        thisimgcontainer.style.display="block";
        // document.getElementById("orientation").innerHTML = "LANDSCAPE";
    } else {
        // for the moment, show regular full window
        // would like to instead prompt to rotate phone
        // but perhaps for now this is best
        // thisimgcontainer.style.display="none";
        thisimgcontainer.style.display="block";
        // document.getElementById("orientation").innerHTML = "PORTRAIT";
    }
}

window.onorientationchange = readdeviceorientation;
*/
