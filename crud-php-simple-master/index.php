<?php
/**
 * Homepage - Displays a list of users from the database.
 * 
 * This script fetches user data from the database and displays it in a table.
 * It also provides options to edit or delete user records.
 * 
 * @package  UserManagement
 * @author   Tu Nombre
 * @license  MIT
 * @link     https://tu-sitio.com
 */

// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (latest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

?>

<html>
<head>    
    <title>Homepage</title>
</head>

<body>
    <h2>Homepage</h2>
    <p>
        <a href="add.php">Add New Data</a>
    </p>
    <table width='80%' border=0>
        <tr bgcolor='#DDDDDD'>
            <td><strong>Name</strong></td>
            <td><strong>Age</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Action</strong></td>
        </tr>
        <?php
        /**
         * Fetch and display user data from the database.
         * 
         * This loop iterates over the fetched user records, formats them, 
         * and displays them in an HTML table.
         */
        while ($res = mysqli_fetch_assoc($result)) {
            /**
             * Replaces "@" with "[at]" in email addresses.
             * 
             * This helps obfuscate emails to protect from spam bots.
             * 
             * @param string $email Original email address.
             * @return string Sanitized email address.
             */
            $sanitizedEmail = str_replace("@", "[at]", $res['email']);

            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['age']."</td>";
            echo "<td>".$sanitizedEmail."</td>";    
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | 
            <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
