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

$sql = "CREATE TABLE IF NOT EXISTS User (id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
                                        username VARCHAR(30) ,
                                        phone VARCHAR(30) NOT NULL UNIQUE,
                                        PRIMARY KEY(id));";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?> 