<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<body>
    <div id="loginBox">
        <div>
            <h1 class="login">Login</h1>
        </div>

        <form method="POST">
            <div class="login">
                <input type="text" name="emailOrUsername" class="login" placeholder="E-Mail or Username" value="<?php echo isset($_POST['emailOrUsername']) ? $_POST['emailOrUsername'] : '' ?>">
            </div>

            <div class="login">
                <input type="password" name="password" class="login" placeholder="Password">
            </div>

            <div class="login">
                <input type="submit" name="submit" class="login btn" value="Login">
            </div>

            <div class="login">
                <a class="login" href="signUp.php">Sign Up</a>
            </div>
        </form>

        <?php
          session_start();
          if (isset($_POST['submit'])) {
              include 'dbh.php';

              $emailOrUsername = mysqli_real_escape_string($conn, $_POST['emailOrUsername']);
              $password = mysqli_real_escape_string($conn, $_POST['password']);

              $error = "";
              if (empty($emailOrUsername))
                  $error .= "Email or username is required, ";

              // if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL))
              //     $error .= "Email address is not valid, ";

              if (empty($password))
                  $error .= "Password is required, ";

              if(!empty($error)) {
                  echo '<script type="text/javascript">
                      alert("Error(s): ' .$error. '");
                    </script>';

                  exit();
              }

              if(empty($error)) {
                $sql = "SELECT * FROM user WHERE email = '" .$emailOrUsername. "' OR username = '" .$emailOrUsername. "';";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck == 0) {
                  echo '<script type="text/javascript">
                        alert("No one with that username or email exists.");
                        </script>';

                  exit();
                } else {
                  if ($rows = mysqli_fetch_assoc($result)) {
                    $checkHashedPassword = password_verify($password, $rows['password']);
                    if (!$checkHashedPassword) {
                      echo '<script type="text/javascript">
                          alert("Password does not match.");
                          </script>';
                    } else if ($checkHashedPassword) {
                      $_SESSION['userID'] = $rows['userID'];
                      $_SESSION['username'] = $rows['username'];
                      header("Location: welcome.php");
                    }
                  }
                }
              }
          }
        ?>
    </div>
</body>
