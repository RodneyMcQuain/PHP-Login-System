<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<body>
  <div id="signUpBox">
      <div>
          <h1 class="signUp">Sign Up</p>
      </div>

      <form method="POST">
          <div class="signUp">
              <input type="text" name="email" class="signUp" placeholder="E-Mail" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
          </div>

          <div class="signUp">
            <input type="text" name="username" class="signUp" placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>">
          </div>

          <div class="signUp">
              <input type="password" id="password" name="password" class="signUp" placeholder="Password">
          </div>

          <div class="signUp">
              <input type="password" name="passwordCheck" class="signUp" placeholder="Re-Type Password">
          </div>

          <div class="signUp">
              <input type="submit" name="submit" class="signUp btn" value="Sign Up">
          </div>

          <div class="signUp">
              <a class="signUp" href="index.php">Login</a>
          </div>
      </form>

      <div id="passwordBox">
        <p class="invalid" id="characterLength">Minimum of 8 Characters</p>
        <p class="invalid" id="lowercaseLetter">Lowercase Letter</p>
        <p class="invalid" id="uppercaseLetter">Uppercase Letter</p>
        <p class="invalid" id="number">Number</p>
        <p class="invalid" id="symbol">Symbol (?!@#$%^&*)</p>
      </div>

      <script src="passwordValidator.js"></script>

      <?php
          if (isset($_POST['submit'])) {
            include 'dbh.php';

            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $passwordCheck = mysqli_real_escape_string($conn, $_POST['passwordCheck']);

            $error = "";
            if (empty($email)) {
                $error .= "Email is required, ";
            } elseif (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error .= "Email address is not valid, ";
            } else {
              $sql = "SELECT * FROM user WHERE email = '" .$email. "';";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0)
                  $error .= "Email already in use, ";
            }

            if (empty($username)) {
              $error .= "Username is required, ";
            } elseif (!empty($username) && strlen($username) > 50) {
              $error .= "Username must be less than 50 characters, ";
            } else {
              $sql = "SELECT * FROM user WHERE username = '" .$username. "';";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);

              if ($resultCheck > 0)
                  $error .= "Username already in use, ";
            }

            if (empty($password))
                $error .= "Password is required, ";

            if ((!empty($password) && !empty($passwordCheck)) && strcmp($password, $passwordCheck))
                $error .= "Passwords do not match ";

            if(!empty($error)) {
                echo '<script type="text/javascript">
                    alert("Error(s): ' .$error. '");
                    </script>';

                exit();
            }

            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO user (email, username, password)
                    VALUES('$email', '$username', '$passwordHashed');";
                      //VALUES('" .$email. "', '" .$username. "', '" .$passwordHashed. "');";
            $result = mysqli_query($conn, $sql);

            header("Location: index.php");
            exit();
        }
      ?>
    </div>
</body>
