<?php
require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $isSucced = insertData($name, $email);
    if ($isSucced) {
        header("Location: index.php?success=1");
        exit();
    } else {
        header("Location: index.php?error=1");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>ClinicManagers Form</title>
  </head>
  <body>
    <?php
      if (isset($_GET['success'])) {
          echo '<div class="success-message">New record created successfully</div>';
      }
      if (isset($_GET['error'])) {
          echo '<div class="error-message">Error: Could not insert record.</div>';
      }
    ?>
    <form action="index.php" method="post">
      <div class="from-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required />
      </div>
      <br />
      <div class="from-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />
      </div>
      <br />
      <button type="submit">Submit</button>
    </form>
  </body>
</html>
