<?php
// Retrieve POST data from the form submission
$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];
$rating = $_POST['rating'];

// Validate form data
if(empty($name) || empty($email) || empty($feedback) || empty($rating)) {
    die('Please fill in all required fields.');
}

// Create a new MySQLi connection to the database
$con = new mysqli("localhost", "root", "", "campaign_feedback");

// Check if the connection to the database was successful
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Prepare the SQL query to insert the data into the feedback table
$sql = "INSERT INTO feedback (name, email, feedback, rating) VALUES ('$name', '$email', '$feedback', '$rating')";

// Execute the SQL query
$result = $con->query($sql);

// Check if the query was successful
if ($result) {
    echo "<script>
            alert('Thank you for your feedback!');
            window.location.href = 'feedback_form.html';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

// Close the database connection
$con->close();
?>
