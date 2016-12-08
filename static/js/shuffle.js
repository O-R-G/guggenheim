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
var speed;
if (!speed) 
    speed = 1150;
var probability = 1/3;
var timers = [];    // settimeout ids
var interval;       // setinterval id
var running;
var mobile = false;
var debug = true;


// init

function init() {

    // build imgs[], captions[] 2D arrays

    var tmp = [];
    imgcontainers = document.getElementsByClassName('img-container');
    captioncontainers = document.getElementsByClassName('caption-container');
    for (var i = 0; i < imgcontainers.length; i++) {
        tmp[i] = imgcontainers[i].children;
        var tmpimgs = [];            
        for (var j = 0; j < imgcontainers[i].children.length; j++) {
            if (tmp[i][j].tagName == "IMG")
                tmpimgs.push(tmp[i][j]);
        }
        imgs[i] = tmpimgs;
        // index[i] = Math.floor((Math.random() * (imgs[i].length-2)) + 1);     // start on random img b/t 1 & max
        index[i] = imgs[i].length-1;    // start on last img
        if (debug) debuglog(index[i]);
    }
    index[3] = 0;   // 7 position only has one, so start on [0]
    for (var i = 0; i < captioncontainers.length; i++)
        captions[i] = captioncontainers[i].children;
    var numberofstacks = imgcontainers.length;
    var updatenumberofstacks = imgcontainers.length-1;

    // set handlers

    var creditsbtn = document.getElementById("credits-btn");
    creditsbtn.addEventListener("click", function(event) {
        if (creditsbtn.innerHTML == "Credits +") {
            creditsbtn.innerHTML = "Credits –";
            document.body.style.overflow='scroll';
            document.getElementById('credits').style.visibility='visible';
        } else {
            creditsbtn.innerHTML = "Credits +";
            document.getElementById('credits').style.visibility='hidden';
        } 
        event.stopImmediatePropagation();
    });

    window.addEventListener("click", function(event) {
        if (running) {
            for (var i = 0; i < captioncontainers.length; i++)
                captioncontainers[i].style.display = "block";
            for (var i = 0; i < timers.length; i++)
                clearTimeout(timers[i]);
            if (interval) clearInterval(interval);
            running = null;
        }
        else {
            for (var i = 0; i < captioncontainers.length; i++)
                captioncontainers[i].style.display = "none";
            interval = setInterval( function() { updateall(updatenumberofstacks); }, speed);
            updateall();
        }
        document.getElementById('credits').style.visibility='hidden';
        creditsbtn.innerHTML = "Credits +";
        if (debug) debuglog(e); 
    });

    // display all, start updates

    for (var i = 0; i < numberofstacks; i++)
        index[i] = update(i, index[i], speed, false);
    interval = setInterval( function() { updateall(updatenumberofstacks); }, speed);
    // updateallatdifferentspeeds(updatenumberofstacks);
    running = true;
}


// update

function update(thisstack, thisindex, thisspeed, recursive) {

    var previndex = (thisindex - 1) % imgs[thisstack].length;
    if (previndex <= 0) previndex = imgs[thisstack].length - 1;
    var thisimg = imgs[thisstack][thisindex];
    var previmg = imgs[thisstack][previndex];        
    var thiscaption = captions[thisstack][thisindex];
    var prevcaption = captions[thisstack][previndex];
    thisimg.style.display = "block";
    if (thiscaption)
        thiscaption.style.display = "block";
    if (previndex != thisindex) {
        previmg.style.display = "none";
        prevcaption.style.display = "none";
    }
    thisindex++;
    thisindex %= imgs[thisstack].length;
    if (thisindex == 0) thisindex++;
    if (recursive) {
        if (interval) clearInterval(interval);
        timers[thisstack] = setTimeout(function(){ update(thisstack, thisindex, thisspeed, true); }, thisspeed);
    }
    if (debug) debuglog(imgs[thisstack].length + " : " + thisindex + " / " + previndex);
    return thisindex;
}

function updateall(numberofstacks) {

    // change each image 33% of the time
    // enforce at least one changed each cycle

    var updated = false;
    for (var i = 0; i < numberofstacks; i++) {
        var updatestack = Math.random();
        if (updatestack <= probability) {
            index[i] = update(i, index[i], speed, false);
            updated = true;
        }
        if (debug) debuglog(i + " : " + updatestack + " --> " + (updatestack <= probability));
    }
    if (!updated) {
        var updatestack = Math.floor((Math.random() * 3));
        index[updatestack] = update(updatestack, index[updatestack], speed);
        updated = true;
        if (debug) debuglog("nothing updated --" + updatestack);
    } 
    running = true;
}

function updateallatdifferentspeeds(numberofstacks) {

    // change each at different speeds
    // uses settimeout in place of setinterval
    // update recursively

    var updated = false;
    for (var i = 0; i < numberofstacks; i++) {    
        var thisspeed = Math.random();
        index[i] = update(i, index[i], speed * thisspeed, true);
        updated = true;
        if (debug) debuglog(i + " : " + updatespeed + " / " + updated);
    }
    running = true;
}


// utility

function debuglog(thisdebugstring) {

    // console.log("+");
    console.log(thisdebugstring);
}
