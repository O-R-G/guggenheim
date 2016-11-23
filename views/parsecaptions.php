<?
// read captions.csv file to array, line by line

$captions = file('../media/txt/src/captions.csv');

// explode on first "," then write new txt files

foreach ($captions as $thiscaption) {
    $captionswithfilenames = explode(",", $thiscaption, 2);
    $out = fopen("../media/txt/" . $captionswithfilenames[0], "w") or die("Unable to open file!");
    $txt = $captionswithfilenames[1] . "\n";
    fwrite($out, $txt);
    fclose($out);
}
?>
