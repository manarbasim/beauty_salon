<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty_salon";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}
$sql = "SELECT a.id, u.name, a.service, a.date, a.time
        FROM appointments a
        JOIN users u ON a.user_id = u.id";
$result = $conn->query($sql);
$appointments = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
} else {
    $appointments = "No appointments found.";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>All Booked Appointments</h1>
        <?php
        if ($appointments != "No appointments found.") {
            echo "<table>";
            echo "<tr><th>Name</th><th>Service</th><th>Date</th><th>Time</th></tr>";
            foreach ($appointments as $appointment) {
                echo "<tr>";
                echo "<td>" . $appointment['name'] . "</td>";
                echo "<td>" . $appointment['service'] . "</td>";
                echo "<td>" . $appointment['date'] . "</td>";
                echo "<td>" . $appointment['time'] . "</td>";
                echo "</tr>";
            }
            echo "</table>"; } else { echo "<p>No appointments found.</p>";    }
        ?>
    </div> </body> </html>
