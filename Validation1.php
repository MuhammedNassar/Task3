<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $uName = $_POST['uname'];
      $psw = $_POST['psw'];
      $email = $_POST['email'];
      $linkedin = $_POST['linkedin'];
      $address  = $_POST['address'];

      $errors = [];
      if (empty($uName)) {  // Empty user true;

            $errors['emptyUserName'] = 'User name field is Requird';

            if (!is_string($uName)) { // check length
                  $errors['strUserName'] = 'User name Is most be a string format';
            }
      } 
      if (!empty($psw)) {  // if password not null 
            if (strlen($psw) < 6) {   // check Length
                  $errors['pswLimit'] = 'Password most be at least 6 chars';
            }
      } else { // password is Null
            $errors['pswEmpty'] = 'Password field is Requird';
      }
      if (!empty($email)) {  //  check if not null 
            if (!(strpos($email, '@') && strpos($email, '.'))) {  // search in text (@ and . both  exist) if not will return false 
                  $errors['emailFormat'] = 'Invalid Email Format' . $email;
            }
      } else { //Email Is Null
            $errors['emptyEmail'] = 'Email Field is Requird';
      }
      if (!empty($linkedin)) {   // not null and contains www. and another . 
               if (!(strpos($linkedin, 'www.') && strpos($linkedin, '.')) ) {
                  $errors['UrlFormat'] = 'Invalid Url Format';
            }
      } else { // linkedin is null
            $errors['linkedinUrl'] = 'linkedin URL Field is Requird';  
      }
      if (!empty($address)) { // address not null 
            if (strlen($address) > 10) { // check length
                  $errors['addressLimit'] = 'Address most be at Max 10 chars';
            }
      } else { // address is null
            $errors['addressEmpty'] = 'Address Field is Requird';
      }

      if (count($errors) > 0) { // there is errors found
            foreach ($errors as $key => $value) {
                  echo ' *' . ' ' . $key . ' ' . $value . '<br>';
            }
      } else {
            echo 'Post Event done'; // confirm msgs (Posted Successfully)
      }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
      <title>Register</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
      <div class="container" style="padding-top: 20px;">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                  <div class="form-group">
                        <label for="uname"  ><b>Username</b></label>
                  </div> <input type="text" name="uname" class="form-control" >
                  <div class="form-group">
                        <label for="psw" ><b>Password</b></label>
                        <input type="password" name="psw" class="form-control" >
                  </div>
                  <div class="form-group">
                        <label for="email"  ><b>Email</b></label>
                        <input type="text" name="email" class="form-control" >
                  </div>
                  <div class="form-group">
                        <label for="Address"  ><b>Address</b></label>
                        <input type="text" name="address" class="form-control" >
                  </div>
                  <div class="form-group">
                        <label for="linkedin" ><b>LinkediN</b></label>
                        <input type="text" name="linkedin" class="form-control" >
                  </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
      </div>
</body>
