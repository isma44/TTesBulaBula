<?php

// branch

function elapsed_seconds( $timeSerial )
{
    $ts = date( "YmdHis", strtotime( $timeSerial ) );
    
    $secs = date( "YmdHis" ) - $ts;
    
    return $secs;
}


// http://php.net/manual/ja/ref.zip.php
function create_dirs( $path )
{
  if (!is_dir($path))
  {
    $directory_path = "";
    $directories = explode("/",$path);
    // array_pop($directories);
   
    foreach($directories as $directory)
    {
      // print $directory."<br/>\n";
      $directory_path .= $directory."/";
      if (!is_dir($directory_path))
      {
        @mkdir($directory_path);
        chmod($directory_path, 0777);
      }
    }
  }
}


// http://php.net/manual/ro/function.gzcompress.php
function compress_to_gzip( $strSrc, $dstFileName )
{
  $zp = gzopen( $dstFileName, "w9" );
  gzwrite( $zp, $strSrc );
  gzclose( $zp );
  // echo $dstFileName." path <br/>";
}


function header_gzip( $dstFileName )
{
    header('Content-Type: application/x-download');
    header('Content-Encoding: gzip'); #
    header('Content-Length: '.strlen($gzipoutput)); #
    header('Content-Disposition: attachment; filename="myfile.name"');
    // header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
    // header('Pragma: no-cache');
}

?>
