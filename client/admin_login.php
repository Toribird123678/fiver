<?php require_once 'classloader.php'; ?>
<?php 
if ($userObj->isLoggedIn() && $userObj->isAdmin()) {
  header("Location: admin_index.php");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <title>Admin Login</title>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 p-5">
          <div class="card shadow">
            <div class="card-header">
              <h2>Admin Login</h2>
            </div>
            <form action="core/handleForms.php" method="POST">
              <div class="card-body">
                <?php  
                if (isset($_SESSION['message']) && isset($_SESSION['status'])) {
                  if ($_SESSION['status'] == "200") {
                    echo "<h5 style='color: green;'>{$_SESSION['message']}</h5>";
                  } else {
                    echo "<h5 style='color: red;'>{$_SESSION['message']}</h5>"; 
                  }
                }
                unset($_SESSION['message']);
                unset($_SESSION['status']);
                ?>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="tori@gmail.com" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" value="123" required>
                  <input type="hidden" name="adminLoginFlag" value="1">
                  <input type="submit" class="btn btn-primary float-right mt-4" name="loginUserBtn" value="Login">
                </div>
              </div>
            </form>
            <div class="card-footer d-flex justify-content-between">
              <a class="btn btn-link p-0" href="admin_register.php">Register</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>


