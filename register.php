<?php
// Koneksi ke database
$db = mysqli_connect("localhost", "username", "", "userauth");

// Inisialisasi variabel error_message
$error_message = "";

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validasi input
  $username = mysqli_real_escape_string($db, $_POST["username"]);
  $password = mysqli_real_escape_string($db, $_POST["password"]);

  // Query INSERT ke dalam tabel "users"
  $stmt = mysqli_prepare($db, "INSERT INTO users (username, password) VALUES (?, ?)");
  mysqli_stmt_bind_param($stmt, "ss", $username , $password);
  if (mysqli_stmt_execute($stmt)) {
    // Redirect ke halaman login.php
    header("Location: login.php");
    exit();
  } else {
    $error_message = "Failed to create account";
  }
  mysqli_stmt_close($stmt);
}

mysqli_close($db);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container-fluid login-page">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-4 col-sm-12">
          <div class="card login-card">
            <div class="card-body">
              <h1 class="text-center mb-5"><i class="fab fa-instagram"></i>Register</h1>
              <form method="POST">
                <?php if ($error_message): ?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                  </div>
                <?php endif; ?>
                <div class="mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Username"
                    required
                  />
                </div>
                <div class="mb-3">
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Password"
                    required
                  />
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Register</button>
                </div>
              </form>
              <div class="mt-4 text-center">
                <p>Already have an account? <a href="login.php" class="link-primary">Login</a></p>
              </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>
