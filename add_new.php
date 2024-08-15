<?php 
include "koneksi.php";

if(isset($_POST['submit'])){  //mastiin ke submit
    $firstName = $_POST["firstName"]; 
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    $sql = $conn->query("INSERT INTO crud VALUES(NULL, '$firstName', '$lastName', '$email', '$gender')"); 
    if($sql){ //kalo sql nya executed maka
        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Data berhasil diinput',
                    confirmButtonText: 'OK'
                }).then((result) => {   //kalo mencet oke maka 
                    if (result.isConfirmed) {
                        window.location.href = 'index.php';
                    }
                });
            });
        </script>";
    }else{  
        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Yahhhhh: " . mysqli_error($conn) . "',
                    confirmButtonText: 'OK'
                });
            });
        </script>";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        NYOBA PHP CRUD
    </div>  
    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New User</h3>
            <p class="text-muted">complete the form below to add a new user</p>
        </div>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="firstName" placeholder="Enter Ur Name">
                    </div>
                    <div class="col">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="lastName" placeholder="Enter Ur Name">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Ur Email">
                </div>
                <div class="form-group mb-3">
                    <label>Gender</label>
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                    <label for="male" class="form-input-table">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                    <label for="female" class="form-input-table">Female</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.js"></script>
  </body>
</html>
