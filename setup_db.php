<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "incidentreporting";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Users (id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
                                        name VARCHAR(30) NOT NULL, 
                                        username VARCHAR(30) NOT NULL UNIQUE, 
                                        userEmail VARCHAR(30) NOT NULL UNIQUE, 
                                        password VARCHAR(100) NOT NULL,
                                        phone VARCHAR(30) NOT NULL,
                                        reg_date DATETIME NOT NULL,PRIMARY KEY(id));";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?> 