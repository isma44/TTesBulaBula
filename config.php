<?php   

// TESTING CONFIG

if ( !defined('PATH_HTTPROOT') ) {
    define( 'PATH_HTTPROOT', $_SERVER['DOCUMENT_ROOT'] );
}
if ( !defined('PATH_OUTROOT') ) {
    define( 'PATH_OUTROOT', PATH_HTTPROOT."/imgout" );  
    // define( 'PATH_OUTROOT', "imgout" );          
}
if ( !defined('PATH_INROOT') ) {
    define( 'PATH_INROOT', PATH_HTTPROOT."/imgin" );     
    // define( 'PATH_INROOT', "imgin" );
}

date_default_timezone_set('Asia/Tokyo');

// NOTICE : from pal

?>
