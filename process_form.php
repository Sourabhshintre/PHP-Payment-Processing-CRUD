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
    <title>Form Processing</title>
    <link rel="stylesheet" href="process_form.css">
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $payment_amount = $_POST['payment_amount'];
            $gst = $_POST['gst'];
            $total_payable_amount = $gst ? $payment_amount * 1.18 : $payment_amount;

            $sql = "INSERT INTO payments (name, payment_amount, gst, total_payable_amount) VALUES ('$name', '$payment_amount', '$gst', '$total_payable_amount')";

            if ($conn->query($sql) === TRUE) {
                echo "<p class='success-message'>New record created successfully</p>";
            } else {
                echo "<p class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>
        <a href="index.html" class="button">Back to Home</a>
    </div>
</body>
</html>
