<?php
define('DB_SERVER', 'localhost'); // Database server
define('DB_USER', 'root'); // Database user
define('DB_PASSWORD', ''); // Database password
define('DB_DATABASE', 'clinicmanagersdb'); // Database name

try {
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
echo '<div class="success-message">Connected successfully</div>';
} catch (Exception $e) {
    echo '<div class="error-message">Connection failed: ...</div>' . mysqli_connect_error();
}

    function insertData($name, $email) {
        global $conn;
        // used my sql prepare to prevent sql injection
        $stmt = mysqli_prepare($conn, "INSERT INTO user (name, email) VALUES (?, ?)");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $name, $email);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return $result;
        }
        return false;
    }
  ?>