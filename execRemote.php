<?php
// Using ssh2_connect
if (!function_exists("ssh2_connect")) die("function ssh2_connect doesn't exist");

$cmd = '/usr/bin/php /home/ubuntu/prjfldr/your_script.php';
$result = rawExec( $cmd . " " . $argv[1]);

$arr = array("result" => $result);
print(json_encode($arr));

function exec1( $command ){
    $result = rawExec( $command.';echo -en "\n$?"' );
    if( ! preg_match( "/^(.*)\n(0|-?[1-9][0-9]*)$/s", $result[0], $matches ) ) {
        throw new RuntimeException( "output didn't contain return status" );
    }
    if( $matches[2] !== "0" ) {
        throw new RuntimeException( $result[1], (int)$matches[2] );
    }
    return $matches[1];
}

function rawExec( $command ){
	global $conn;
    $stream = ssh2_exec( $conn, $command );
    $error_stream = ssh2_fetch_stream( $stream, SSH2_STREAM_STDERR );
    stream_set_blocking( $stream, TRUE );
    stream_set_blocking( $error_stream, TRUE );
    $output = stream_get_contents( $stream );
    $error_output = stream_get_contents( $error_stream );
    fclose( $stream );
    fclose( $error_stream );
    return array( $output, $error_output );
}

?>
