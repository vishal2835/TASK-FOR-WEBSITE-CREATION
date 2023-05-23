<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form fields and sanitize the data
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $message = htmlspecialchars($_POST["message"]);

  // Validate the form data (optional)
  if (empty($name) || empty($email) || empty($message)) {
    // Handle form validation errors
    echo "Please fill in all the required fields.";
    exit;
  }

  // Database connection settings
  $host = "127.0.0.1";
  $username = "root"; // Replace with your MySQL username
  $password = ""; // Replace with your MySQL password
  $database = "data1"; // Replace with your database name

  // Create a new MySQLi instance
  $mysqli = new mysqli($host, $username, $password, $database);

  // Check for connection errors
  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }

  // Prepare and execute the SQL statement to insert the form data into the database
  $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("sss", $name, $email, $message);
  $stmt->execute();

  // Check if the SQL statement was executed successfully
  if ($stmt->affected_rows === 1) {
    // Data inserted successfully
    echo "Thank you for your message. We will get back to you shortly.";
  } else {
    // Error inserting data
    echo "Oops! An error occurred while submitting the form. Please try again later.";
  }

  // Close the database connection
  $stmt->close();
  $mysqli->close();
} else {
  // Invalid request method
  echo "Invalid request method.";
}
?>
