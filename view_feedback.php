<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campaign_feedback";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the feedback table
$sql = "SELECT id, name, email, feedback, rating, submission_date FROM feedback";
$result = $conn->query($sql);

// HTML and CSS for styling
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Feedback Data</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }";
echo "table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }";
echo "th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }";
echo "th { background-color: #f2f2f2; }";
echo "tr:nth-child(even) { background-color: #f9f9f9; }";
echo "</style>";
echo "</head>";
echo "<body>";
echo "<h2>Feedback Data</h2>";

// Check if there are any results and display them
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Feedback</th><th>Rating</th><th>Submission Date</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["feedback"] . "</td>";
        echo "<td>" . $row["rating"] . "</td>";
        echo "<td>" . $row["submission_date"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No feedback data found.";
}

// Close the database connection
$conn->close();

echo "</body>";
echo "</html>";
?>
