<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css\style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\front.css">
  <script src="js\query.js"></script>
  <title></title>

</head>

<body>

  <div class="signin-form">
    <form action="" method="post">
      <div class="form-header">
        <h2>Sign in</h2>
        <p>Login to Dream skill</p>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" placeholder="someone@email.com" name="email" autocomplete="off" required="required">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="pass" autocomplete="off" required="required">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_in">Sign in</button>
      </div>
      <?php include("logu.php"); ?>
    </form>
    <div class="text-center small" style='color:#67428B;'>Don't have an account? <a href="reg.php">Create one</a></div>
  </div>

</body>

</html>
