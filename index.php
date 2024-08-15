<?php 
include "koneksi.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweet alert -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        NYOBA PHP CRUD
    </div>  

    <div class="container">
      <?php //muncul msg when data is saved
  //     if(isset($_GET['msg'])) {  //kalo ada url msg (dapet dari get) then muncul msg
  //       $msg = $_GET['msg'];
  //       echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  //       '. $msg.'
  //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  // </div>';
  //     }


  if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    $error = isset($_GET['error']) ? $_GET['error'] : '';

    echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: '" . ($msg == 'success' ? 'success' : 'error') . "',
                        title: '" . ($msg == 'success' ? 'Deleted!' : 'Error!') . "',
                        text: '" . ($msg == 'success' ? 'Data berhasil dihapus yey' : 'Yahhh: ' . $error) . "',
                        confirmButtonText: 'OK'
                    });
                });
            </script>";
}

      ?>
        <a href="add_new.php" class="btn btn-dark mb-3">Add New</a>
            <table class="table table-hover text-center">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    //READ
                      $sql = $conn->query("SELECT * FROM crud"); //nge execute query
                      while($row = mysqli_fetch_assoc($sql)){ //loop bakal jalan terus selama ada data yg bisa diambil
                          ?>  <!-- tutup tag php untuk naro tag html-->
                            <tr>
                              <th><?php echo $row["id"];?></th>
                              <th><?php echo $row["firstName"];?></th>
                              <th><?php echo $row["lastName"];?></th>
                              <th><?php echo $row["email"];?></th>
                              <th><?php echo $row["gender"];?></th>
                              <td>
                                <a href="edit.php?id=<?php echo $row["id"];?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a> <!-- tombol edit-->
                                <a href="delete.php?id= <?php echo $row["id"];?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a> <!-- tombol hapus-->
                              </td>
                            </tr>
                      
                          <?php  //buka lagi tag php nya buat kurung kurawalnya (biar php tetep gabung)
                      }  // closing the while looooopppp
                    
                    ?>
                    
                </tbody>
      </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.js"></script>
  </body>
</html>