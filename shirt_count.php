<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fest_entry";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$sql = "SELECT shirt_size, COUNT(*) AS total FROM users GROUP BY shirt_size";
$result = $conn->query($sql);

$counts = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $counts[] = $row;
    }
}

echo json_encode($counts);
$conn->close();
?>
