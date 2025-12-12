<?php
require_once('db_connect.php');

$create_table_query = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if ($db->query($create_table_query)) {
    echo "Table 'users' created successfully or already exists.<br>";
} else {
    die("Error creating table: " . $db->error . "<br>");
}

$stmt_check = $db->prepare("SELECT id FROM users WHERE username = ?");
$admin_user = 'admin';
$stmt_check->bind_param("s", $admin_user);
$stmt_check->execute();
$result = $stmt_check->get_result();
if ($result->num_rows === 0) {
    $password = 'strongpassword';
    
    $stmt_insert = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt_insert->bind_param("ss", $admin_user, $password);

    if ($stmt_insert->execute()) {
        echo "Admin user created successfully.<br>";
    } else {
        echo "Error creating admin user: " . $stmt_insert->error . "<br>";
    }
    $stmt_insert->close();
} else {
    echo "Admin user already exists.<br>";
}

$stmt_check->close();
$db->close();

echo "Database initialization complete! You can now navigate to the main page.";
?>