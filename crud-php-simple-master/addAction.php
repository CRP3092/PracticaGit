<?php
/**
 * Add Data Page
 *
 * This script handles form submissions for adding user data to the database.
 * It validates input fields and inserts data into the `users` table.
 *
 * PHP version 7+
 *
 * @category Database_Operations
 * @package  UserManagement
 * @author   Your Name
 * @license  MIT License
 * @link     http://yourwebsite.com
 */

// Include the database connection file
require_once "dbConnection.php";

/**
 * Handles form submission and inserts data into the database.
 *
 * @return void
 */
if (isset($_POST['submit'])) {
    // Escape special characters in string for use in SQL statement	
    $name  = mysqli_real_escape_string($mysqli, $_POST['name']);
    $age   = mysqli_real_escape_string($mysqli, $_POST['age']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        
    // Check for empty fields
    if (empty($name) || empty($age) || empty($email)) {
        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if (empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if (empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
        // Show link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // If all the fields are filled (not empty)

        // Insert data into database
        $query = "INSERT INTO users (`name`, `age`, `email`) VALUES ('$name', '$age', '$email')";
        $result = mysqli_query($mysqli, $query);
        
        if ($result) {
            // Display success message
            echo "<p><font color='green'>Data added successfully!</p>";
            echo "<a href='index.php'>View Result</a>";
        } else {
            // Display error message
            echo "<p><font color='red'>Error adding data: " . mysqli_error($mysqli) . "</font></p>";
        }
    }
}
?>
