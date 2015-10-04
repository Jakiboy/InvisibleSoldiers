<?php
/*
@autor   : JIHAD SINNAOUR
*/
$file = './Export/fb.xml';
$sourcePath = "./Import/index.html" ;
if(!file_exists($sourcePath)){
	echo 'No Source file found !';
	exit;
}
else{
	$source = file_get_contents($sourcePath);
file_put_contents($file, $source);
//header('Content-Type: text/plain');
// STEP 1
$str = $source ;
$start = '{"list":[';
$end = '"]}';

$pattern = sprintf(
    '/%s(.+?)%s/ims',
    preg_quote($start, '/'), preg_quote($end, '/')
);
if (preg_match($pattern, $str, $matches)) {
    list(, $match) = $matches;
    //echo '<p>your invisible Soldier is : </p>';
    //echo '<a href="https://www.facebook.com/'.$match.'">Click too see who ?</a>'. "<br>";
}
// SECOND STEP 2
$str = $match ;

$start = '"';
$end = '-0"';

$pattern = sprintf(
    '/%s(.+?)%s/ims',
    preg_quote($start, '/'), preg_quote($end, '/')
);
if (preg_match($pattern, $str, $matches)) {
    list(, $match) = $matches;
}
// STEP 3
// Start the buffering //
$text_line = $match;
$text_line = explode('-2",',$text_line);
for ($start=0; $start < count($text_line); $start++) {
$match = $text_line[$start];
echo $match ;

}
echo '<br>';
// STEP 4
if(!file_exists('./Export/clean.txt')){
	echo 'No Source file found !'.'<br>';
	exit;
}
else{
$match = file_get_contents('./Export/clean.txt');
$text_line = $match;
$text_line = explode('"',$text_line);

//for ($start=0; $start < count($text_line); $start++) {
for ($start=0; $start < 10; $start++) {

$match = $text_line[$start];
echo '<a href="https://www.facebook.com/'.$match.'">Click too see who ?</a>'. "<br>";
}
}
}
?>
