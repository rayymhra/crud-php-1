<?php 
include "koneksi.php";

$id = $_GET['id'];
$sql = $conn->query("DELETE FROM crud WHERE id = $id");
//if sql is executed successfully then show msg 
// if($sql){
//     header("Location: index.php?msg=Data berhasil dihapus yey");
// }else{
//     echo"Yahh: " . mysqli_error($conn);
// }


// if($sql){
//     echo "
//     <script>
//         Swal.fire({
//             icon: 'success',
//             title: 'Deleted!',
//             text: 'Data berhasil dihapus yey',
//             confirmButtonText: 'OK'
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 window.location.href = 'index.php';
//             }
//         });
//     </script>";
// }else{
//     echo "
//     <script>
//         Swal.fire({
//             icon: 'error',
//             title: 'Error!',
//             text: 'Yahhh: " . mysqli_error($conn) . "',
//             confirmButtonText: 'OK'
//         });
//     </script>";
// }
// gabisa karna ini di server bukan html, jadi caranya kita buat notifnya di index.html



if($sql){
    echo "
    <script>
        window.location.href = 'index.php?msg=success';
    </script>";
}else{
    echo "
    <script>
        window.location.href = 'index.php?msg=error&error=" . mysqli_error($conn) . "';
    </script>";
}

?>