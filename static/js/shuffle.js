// ** shuffle **
// shuffle and display child divs in stack
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
var index = [];
var o_src;
var gallery;
var fullscreen;
var fullwindow;
var speed = 1500;
var timers = [];  // timer ids
var running;
var mobile = false;
var debug = true;

// init

function init() {

    // get imgs[], captions[] 
    // returns 2d array of htmlcollection objects

    imgcontainers = document.getElementsByClassName('img-container');
    captioncontainers = document.getElementsByClassName('caption-container');
    for (var i = 0; i < imgcontainers.length; i++) {
        imgs[i] = imgcontainers[i].children;
        // index[i] = 1;   // skip .square div
        index[i] = Math.floor((Math.random() * (imgs[i].length-1)) + 1);    // start with random img
    }
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
            document.getElementById('credits').style.display='none';        // ** fix **
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

function updaterandom(thisstack, thisindex, thisspeed) {

    var nextindex = Math.floor((Math.random() * imgs[thisstack].length) + 1);   
    var previndex = thisindex % imgs[thisstack].length;

    if (previndex == 0) previndex = imgs[thisstack].length - 1;     // ?
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
    // thisindex++;
    thisindex = nextindex;
    thisindex %= imgs[thisstack].length;
    // if (thisindex == 0) thisindex++;        
    if (debug) debuglog("nextindex : " + nextindex);
    if (debug) debuglog("previndex : " + previndex);
    if (debug) debuglog("thisindex : " + thisindex);

    timers[thisstack] = setTimeout(function(){ updaterandom(thisstack, thisindex, thisspeed); }, thisspeed);
    if (debug) debuglog(imgs[thisstack].length + " : " + thisindex + " / " + previndex);
    return thisindex;
}

function updateall() {

        index[3] = 1;   // hack
        // index[0] = updaterandom(0, index[0], 5000);
        index[0] = update(0, index[0], speed * 5);
        index[1] = update(1, index[1], speed * 9);
        index[2] = update(2, index[2], speed * 8);
        index[3] = update(3, index[3], speed * 10000000000000000000000);
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