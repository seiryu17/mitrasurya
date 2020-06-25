<?php
$servername = "sql107.epizy.com";
$username = "epiz_26100031";
$password = "6aUX7F2nWDEudA";
$dbname = "epiz_26100031_portfolio1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>