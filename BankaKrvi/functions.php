<?php
$dbhost = 'localhost';
$dbname = 'bankakrvi';
$dbuser = 'root';
$dbpass = 'mysql';

  $connection = new mysqli($dbhost,$dbuser, $dbpass, $dbname);
if($connection->connect_error) die("Greska!");

function queryMysql($query){
    global $connection;
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
    return $result;
}

function destroySession(){

    $_SESSION = array();
    $var = strip_tags($var);
    $var = htmlentities($var);
    if (get_magic_quotes_gpc())
        $var = stripslashes($var);
    return $connection->real_escape_string($var);

}

function sanitizeString($var)
{
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    if (get_magic_quotes_gpc())
        $var = stripslashes($var);
return $connection->real_escape_string($var);
}
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}


?>