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
                                        username VARCHAR(30) NOT NULL,
                                        phone VARCHAR(30) NOT NULL UNIQUE,
                                        PRIMARY KEY(id));";

$sql = "CREATE TABLE IF NOT EXISTS incidentReport (user_id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
                                    ReporterName VARCHAR(30) NOT NULL,
                                    I_Name VARCHAR(30) NOT NULL,
                                    I_Category VARCHAR(30) NOT NULL,
                                    Location VARCHAR(30) NOT NULL,
                                    Dated VARCHAR(30) NOT NULL,
                                    Timer VARCHAR(30) NOT NULL,
                                    Summary VARCHAR(30) NOT NULL,
                                    FOREIGN KEY(user_id) REFERENCES User(id));";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?> 