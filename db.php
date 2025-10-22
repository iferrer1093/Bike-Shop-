<!-- This db.php page was made by Isaac Ferrer. -->
<?php

        $DB_HOST = 'localhost';
        $DB_NAME = 'bikes';
        $DB_USER = 'root';
        $DB_PASS = '';

    function db()
    {
        global 
        $DB_HOST,
        $DB_NAME,
        $DB_USER,
        $DB_PASS;

        $dsn="mysql:host=$DB_HOST; dbname=$DB_NAME";

        

    try {
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS);
    return $pdo;
    } catch (PDOException $e) 
    {
    echo "Database connection failed: " . $e->getMessage();
    exit;
    }
    }
?>