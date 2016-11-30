<?
// read captions.csv file to array, line by line

$captions = file('../media/txt/captions/src/captions.csv');
$long = "../media/txt/captions/long/";
$short = "../media/txt/captions/short/";

// explode on first "," then write new txt files

foreach ($captions as $thiscaption) {
    $captionwithfilename = explode(",", $thiscaption, 2);
    $out = fopen($long . $captionwithfilename[0], "w") or die("Unable to open file!");
    $captionwithfilename[1] = substr($captionwithfilename[1], 1, -3);       // rm leading & trailing quotation marks 
    $txt = $captionwithfilename[1] . "\n";
    fwrite($out, $txt);
    fclose($out);
}

// explode on "." for short captions

foreach ($captions as $thiscaption) {
    $captionwithfilename = explode(",", $thiscaption, 2);
    $out = fopen($short . $captionwithfilename[0], "w") or die("Unable to open file!");
    $captionwithfilename[1] = substr($captionwithfilename[1], 1, -3);       // rm leading & trailing quotation marks 
    $captionshort = explode(".", $captionwithfilename[1]);
    $txt = $captionshort[0] . "\n";
    fwrite($out, $txt);
    fclose($out);
}
?>
