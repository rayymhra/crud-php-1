<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "personalpro_phpcrud1";
$conn = mysqli_connect($hostname, $username, $password, $database);

if(!$conn){
    die("connection failed" . mysqli_connect_error());
}


//chekkk
// $status = connection_status();
// if($status == CONNECTION_NORMAL){
//     echo "koneksi normal";
// }elseif($status == CONNECTION_ABORTED){
//     echo "koneksi bermasalah";
// }elseif($status == CONNECTION_TIMEOUT){
//     echo "koneksi habis";
// }else{
//     echo "koneksi gagal";
// }
?>