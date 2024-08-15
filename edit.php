<?php 
include "koneksi.php";
session_start(); // Start the session to use session variables

$id = $_GET['id']; // Get the ID from the URL

if (isset($_POST['submit'])) { // If the update button is clicked
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    // Updating the data
    $sql = $conn->query("UPDATE crud SET firstName = '$firstName', lastName = '$lastName', email = '$email', gender = '$gender' WHERE id = $id");

    if ($sql) { // If the query was successful
        $_SESSION['alert'] = ['type' => 'success', 'message' => 'Data berhasil diedit']; // Set session variable for success alert
        header("Location: edit.php?id=$id"); // Redirect to the same page to show alert
    } else {
        $_SESSION['alert'] = ['type' => 'error', 'message' => 'Failed inputting data: ' . mysqli_error($conn)]; // Set session variable for error alert
        header("Location: edit.php?id=$id"); // Redirect to the same page to show alert
    }
    exit(); // Exit after redirection
}

// Check if there's an alert in the session
$alert = isset($_SESSION['alert']) ? $_SESSION['alert'] : null;
unset($_SESSION['alert']); // Clear the alert from session

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
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
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <?php 
        if (isset($_GET['id'])) {
            $sql = $conn->query("SELECT * FROM crud WHERE id = $id LIMIT 1");
            $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="firstName" value="<?php echo htmlspecialchars($row['firstName']); ?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="lastName" value="<?php echo htmlspecialchars($row['lastName']); ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($row['email']); ?>">
                </div>

                <div class="form-group mb-3">
                    <label>Gender</label>
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo ($row['gender']=='male')?"checked":"";?>>
                    <label for="male" class="form-input-table">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo ($row['gender']=='female')?"checked":"";?>>
                    <label for="female" class="form-input-table">Female</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.js"></script>

    <?php if ($alert): ?>
    <script>
        Swal.fire({
            icon: '<?php echo $alert['type']; ?>',
            title: '<?php echo ucfirst($alert['type']); ?>!',
            text: '<?php echo $alert['message']; ?>',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php';
            }
        });
    </script>
    <?php endif; ?>

  </body>
</html>
