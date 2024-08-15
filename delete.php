<?php 
include "koneksi.php";

$id = $_GET['id'];
$sql = $conn->query("DELETE FROM crud WHERE id = $id");
//if sql is executed successfully then show msg 
if($sql){
    header("Location: index.php?msg=Data berhasil dihapus yey");
}else{
    echo"Yahh: " . mysqli_error($conn);
}

?>