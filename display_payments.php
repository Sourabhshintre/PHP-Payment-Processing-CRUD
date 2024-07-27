<?php
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "reso";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Records</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <div class="container">
        <h2>Payment Records</h2>
        <?php
        $sql = "SELECT * FROM payments";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Name</th><th>Payment Amount</th><th>GST</th><th>Total Payable Amount</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["payment_amount"]. "</td><td>" . ($row["gst"] ? "Yes" : "No"). "</td><td>" . $row["total_payable_amount"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        <a href="index.html" class="button">Back to Home</a>
    </div>
</body>
</html>
