<?php
ini_set( 'display_errors', 0 );     // NOTICE!!! display_errors 1 occurr "Warnings" ==> this will be broken JSON syntax.

require_once "config.php";
require_once "functions.php";

// echo '<meta http-equiv="refresh" content="2;URL=.">';


// $img_input_dir = PATH_INROOT."/";
$img_input_dir = "imgin/";


$curr_Y = date('Y');
$curr_m = date('m');
$curr_d = date('d');
$curr_Ymd = $curr_Y.$curr_m.$curr_d;
$curr_His = date('His');
$img_file_path = PATH_OUTROOT."/".$curr_Ymd."/".$curr_Ymd."_".$curr_His.".jpg";
$img_file_dir = PATH_OUTROOT."/".$curr_Ymd;

@create_dirs( $img_file_dir );
@chmod( $img_file_dir, 0777 );




$files = array();
if ($handle = opendir( $img_input_dir )) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            $files[filemtime($file)] = $file;
        }
    }
}

closedir($handle);


// sort ksort($files); // find the last modification $reallyLastModified = end($files);

@rename( PATH_INROOT."/".$files[0], $img_file_path );


$arr_json = array();

if ( strlen($files[0]) > 0 ) { 
    // 画像があれば
    $arr_json['req']['imgin']['path'] = PATH_INROOT."/".$files[0];
    $arr_json['req']['imgout']['path'] = $img_file_path;
    
    $arr_json['res']['code'] = 200;
    $arr_json['res']['type'] = "moved"; 
    $arr_json['res']['time'] = $curr_Ymd."_".$curr_His; 
    $arr_json['res']['msg'] = "moved : imgin/{$files[0]} ==> {$img_file_path}";
    echo json_encode( $arr_json );
    exit;
}
else {
    $arr_json['res']['code'] = 200;
    $arr_json['res']['type'] = "empty"; 
    $arr_json['res']['time'] = $curr_Ymd."_".$curr_His; 
    $arr_json['res']['msg'] = "empty : imgin/ directory does NOT have image file";
    echo json_encode( $arr_json );
    exit;
}

exit;
?>