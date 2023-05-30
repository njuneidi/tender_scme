<?PHP
session_start();
// print_r($_SESSION);
session_destroy();
#print_r($_SESSION);
$url = "http://localhost/tender_scme";
header("Location: $url");
?>