<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location:index.php");
  }
?>
<head>
  <link  rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<body>
  <?php
    include 'header.html';
  ?>
  <script>
    //document.getElementById('liWelcome').className = "active";
    document.getElementById('liWelcome').classList.toggle("active");
  </script>
  <h1 class="welcome">Welcome</h1>
  <?php
    if(isset($_SESSION['username'])) {
      echo "<p class='welcome'>Hello " .$_SESSION['username']. ", you are now logged in.</p>";
    }
  ?>
  <form action="logout.php" method="POST">
    <div class="welcome">
      <button class="btn welcome" type="submit" name="submit">Logout</button>
    </div>
  </form>
</body>
