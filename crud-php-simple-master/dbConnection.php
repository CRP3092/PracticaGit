<?php
/**
 * Database Connection Class
 *
 * This class handles the connection to the MySQL database using MySQLi.
 * It provides a method to get the database connection.
 *
 * PHP version 7+
 *
 * @category Database_Operations
 * @package  DatabaseConnection
 * @author   Your Name
 * @license  MIT License
 * @link     http://yourwebsite.com
 */

class DatabaseConnection
{
    /**
     * Database host
     * @var string
     */
    private $host = "localhost";

    /**
     * Database username
     * @var string
     */
    private $username = "root";

    /**
     * Database password
     * @var string
     */
    private $password = "root";

    /**
     * Database name
     * @var string
     */
    private $database = "test_db";

    /**
     * MySQLi connection object
     * @var mysqli
     */
    private $connection;

    /**
     * Constructor to initialize the database connection
     */
    public function __construct()
    {
        $this->connection = new mysqli(
            $this->host, 
            $this->username, 
            $this->password, 
            $this->database
        );

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    /**
     * Get the database connection
     *
     * @return mysqli Database connection object
     */
    public function getConnection()
    {
        return $this->connection;
    }
}

/**
 * Create a new database connection instance
 *
 * @return mysqli Database connection object
 */
function connectToDatabase()
{
    $db = new DatabaseConnection();
    return $db->getConnection();
}

// Example usage
$conn = connectToDatabase();
if ($conn) {
    echo "Database connected successfully!";
}
?>
