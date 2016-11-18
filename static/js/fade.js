// get all children imgs
// fade opacity between
// based on modernart gallery.js
// requires html/css:
//  .thumb
//    .img-container
//      .square
//      .img centered [wide][tall]
//    .caption

var thumbs = [];
var imgcontainers  = [];
var captions = [];
var imgs = [];
var index;
var o_src;
var gallery;
var fullscreen;
var fullwindow;
var mobile=false;
var debug=false;

// get elements

var thumbs = document.getElementsByClassName('thumb');
var imgcontainers = document.getElementsByClassName('img-container');
var captions = document.getElementsByClassName('caption');

// shuffle(imgcontainers);

// init

function init() {
    index=1;
    for (var i = 0; i < thumbs.length; i++) {
        for (var j = 1; j < imgcontainers[i].children.length; j++) {
            // children[0] = .square div, so skip
            var img = imgcontainers[i].children[j];
            img.style.opacity = "0.00";
        }
    }
    // first child is not an img ** fix **
    index0 = 1;
    index1 = 1;
    index2 = 1;
    index3 = 1;
    increment1 = (Math.random() * 3) + 1;
    increment2 = (Math.random() * 3) + 1;
    increment3 = (Math.random() * 3) + 1;
    increment4 = (Math.random() * 3) + 1;
}
init();


// update

function update(thisstack, thisindex, thisincrement) {

    // first child is not an img
    // should fix this more robustly
    // check if img always
    // also previndex goes to to 0 which is an error ** fix **

    var previndex = (thisindex - 1) % imgcontainers[thisstack].children.length;
    if (previndex == 0) previndex = imgcontainers[thisstack].children.length - 1;
    if (debug) {
        console.log(imgcontainers[thisstack].children.length);
        console.log("previndex = " + previndex);
        console.log("thisindex = " + thisindex);
    }
    var img = imgcontainers[thisstack].children[thisindex % imgcontainers[thisstack].children.length];
    var previmg = imgcontainers[thisstack].children[previndex];
    img.style.opacity = parseFloat(img.style.opacity) + thisincrement;
    previmg.style.opacity = parseFloat(previmg.style.opacity) - thisincrement;
    if (parseFloat(img.style.opacity) >= 1.0) 
        thisindex++;    
    thisindex %= imgcontainers[thisstack].children.length;
    if (thisindex == 0) thisindex++;        // first child is not an img
                                            // should fix this more robustly
                                            // check if img always
    return thisindex;
}

     
// var index0 = update(0, index0, 0.1);

// update all

function updateall(thisincrement) {

    for (var i = 0; i < thumbs.length; i++) {    
        /*
        index0 = update(0, index0, thisincrement*2.5);
        index1 = update(1, index1, thisincrement*1.25);
        index2 = update(2, index2, thisincrement*1.5);
        index3 = update(3, index3, thisincrement*2);
        */

        index0 = update(0, index0, thisincrement*increment1);
        index1 = update(1, index1, thisincrement*increment2);
        index2 = update(2, index2, thisincrement*increment3);
        index3 = update(3, index3, thisincrement*increment4);
    }
    // index++;
}


    
// set interval 
interval = setInterval(function() { updateall(0.0005); }, 60);
// interval = setInterval(function() { updateall(0.001); }, 1000);


// utility

function shuffle (array) {
  var i = 0
    , j = 0
    , temp = null

  for (i = array.length - 1; i > 0; i -= 1) {
    j = Math.floor(Math.random() * (i + 1))
    temp = array[i]
    array[i] = array[j]
    array[j] = temp
  }
}










/*

for (var i = 0; i < thumbs.length; i++) {
    ( function () {
        // ( closure ) -- retains state of local variables
        var imgcontainer = imgcontainers[i];
        var caption = captions[i];
        var img = imgcontainer.children[1];          
        var j = i;
        
        caption.addEventListener('click', function() {
            index = j;
            gallery = img;
            var thisimgcontainer = this.previousElementSibling;
            thisimgcontainer.style.display="block";
            this.style.display="none";
            this.parentElement.parentElement.className="";  // rm parent "transform"
            if (fullscreen) {
                screenfull.request(thisimgcontainer);
            } else { 
                imgcontainer.className = "img-container-fullwindow";
                readdeviceorientation();
            }
        });
        controlsnext.addEventListener('click', next); 
        controlsprev.addEventListener('click', prev); 
        controlsclose.addEventListener('click', function() {                
            var thisimgcontainer = this.parentElement.parentElement; 
            var thiscaption = thisimgcontainer.nextElementSibling;
            thisimgcontainer.style.display="none";
            thiscaption.style.display="block";
            this.parentElement.parentElement.parentElement.parentElement.className="centered";
            if (fullscreen)
                screenfull.exit();
            debuglog();
        });
        imgs.push(img);
    }());
}


// navigation 

function next() {
    index++;
    if (index >= imgs.length)
        index = 0;
    gallery.src = imgs[index].src;
    gallery.className = imgs[index].className;
    debuglog();
}

function prev() {
    index--;
    if (index < 0)
        index = imgs.length - 1;
    gallery.src = imgs[index].src;
    gallery.className = imgs[index].className;
    debuglog();
}

document.onkeydown = function(e) {
    if(screenfull.isFullscreen || fullwindow) {
        e = e || window.event;
        switch(e.which || e.keyCode) {
            case 37: // left
                prev();
                break;
            case 39: // right
                next();
                break;
            case 27: // esc
                var thisimgcontainer = gallery.parentElement;
                var thiscaption = thisimgcontainer.nextElementSibling;
                thisimgcontainer.style.display="none";
                thisimgcontainer.parentElement.parentElement.className="centered";
                thiscaption.style.display="block";   
                debuglog();
                break;
            default: return; // exit this handler for other keys
        }
        e.preventDefault();
     }
}

if (screenfull.enabled) {
    document.addEventListener(screenfull.raw.fullscreenchange, function() {
        if (!screenfull.isFullscreen) {
            resetthumbnail();
        }
    });
}

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

// utility

function resetthumbnail() {
    for (var i = imgcontainers.length-1; i >= 0; i--)
        imgcontainers[i].style.display="none";
    for (var i = captions.length-1; i >= 0; i--)
        captions[i].style.display="block";
    index = -1;
    gallery = null;
}


*/


function debuglog() {
    if (debug) {
        // console.log("index = " + index + " / " + imgs.length);
        console.log("thumbs = " + thumbs + " / " + thumbs.length);
        // console.log("img = " + img);   
        // console.log("img.src = " + img.src);   
        // console.log("thisimgcontainer.innerHTML = " + thisimgcontainer.innerHTML);   
        console.log("+");
    }
}

