<?php
include 'db.php';

if ($conn) {
    echo "Database connection successful!<br>";

    // Check if admin table exists and has data
    $result = mysqli_query($conn, "SHOW TABLES LIKE 'admin'");
    if (mysqli_num_rows($result) > 0) {
        echo "Admin table exists.<br>";
        
        $query = "SELECT * FROM admin";
        $admins = mysqli_query($conn, $query);
        if (mysqli_num_rows($admins) > 0) {
            echo "Admin users found:<br>";
            while ($row = mysqli_fetch_assoc($admins)) {
                echo "ID: " . $row['adminid'] . ", Name: " . $row['name'] . ", Email: " . $row['email'] . ", Password: " . $row['password'] . "<br>";
            }
        } else {
            echo "No admin users in the table.<br>";
        }
    } else {
        echo "Admin table does not exist. Database not imported properly.<br>";
    }
} else {
    echo "Database connection failed: " . mysqli_connect_error();
}

mysqli_close($conn);
?>
