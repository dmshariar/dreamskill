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

  <div class="signup-form">
    <form action="" method="post">
      <div class="form-header">
        <h2>Sign Up</h2>
        <p>Fill out this form</p>
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="someone" name="user_name" autocomplete="off" required="required">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="user_pass" autocomplete="off" required="required">

      </div>
      <div class="form-group">
        <label>Email Address</label>
        <input type="email" class="form-control" placeholder="someone@email.com" name="user_email" autocomplete="off" required="required">
      </div>
      <div class="form-group">
        <label>Country</label>
        <select class="form-control" name="user_country" required="required">
          <option>Select a Country</option>
          <option>Bangladesh</option>
          <option>USA</option>
          <option>India</option>
          <option>UK</option>
          <option>Australia</option>
        </select>
      </div>
      <div class="form-group">
        <label>Gender</label>
        <select class="form-control" name="user_gender" required="required">
          <option>Select a Gender</option>
          <option>Male</option>
          <option>Female</option>
          <option>Others</option>
        </select>
      </div>
      <div class="form-group">
        <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
      </div>
      <?php include("regu.php"); ?>
    </form>
    <div class="text-center small" style='color:#67428B;'>Already have an account? <a href="log.php">Signin here</a></div>
  </div>
</body>

</html>
