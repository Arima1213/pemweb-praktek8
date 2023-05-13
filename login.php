<?php
session_start();

// Check if user is already logged in
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $db = new mysqli('localhost', 'root', '', 'userauth');
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $db->prepare("SELECT password FROM users WHERE username=?");
    $stmt->bind_param("s", $username);

    // Execute the SQL statement
    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }

    // Get the result of the SQL statement
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if ($password == $hashed_password) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        } else {
            $error_message = "Invalid password $hashed_password $password";

        }
    } else {
        $error_message = "Invalid username or password";
    }

    $stmt->close();
    $db->close();
}
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
              <h1 class="text-center mb-5"><i class="fab fa-instagram"></i>Login</h1>
              <form method="POST">
                <?php if (isset($error_message)): ?>
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
                  <button type="submit" class="btn btn-primary">Log in</button>
                </div>
                <div class="mt-4 text-center">
                  <a href="#" class="link-primary">Forgot password?</a>
                </div>
              </form>
              <div class="mt-4 text-center">
                <p>Don't have an account? <a href="register.php" class="link-primary">Register</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
