<!-- This bike-rentals.php page was made by Isaac Ferrer. -->
<?php
require 'db.php'; 
require 'functions.php';

$pdo = db();

$queries = [
    'All Customers' => 'sqlAllCustomers',
    'Available Bikes' => 'sqlAvailableBikes',
    'All Bikes by Price' => 'sqlAllBikesByPrice',
    'Open Rentals' => 'sqlOpenRentals',
    'Rentals with Customers' => 'sqlJoinRentalsCustomers',
    'Rentals with Bikes' => 'sqlJoinRentalsBikes',
    'Top 3 Most Expensive Bikes' => 'sqlTop3Bikes',
    'Rentals with Customers & Bikes' => 'sqlMultiJoinRentals',
    'Close Rental 3' => 'sqlUpdateCloseRental',
    'Set Bike 4 Unavailable' => 'sqlUpdateBikeUnavailable'
];


function displayTable(array $rows) {
    if (empty($rows)) {
        echo "No results found.<br>";
        return;
    }

    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";

    foreach (array_keys($rows[0]) as $header) {
        echo "<th>$header</th>";
    }
    echo "</tr>";

    foreach ($rows as $row) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }

    echo "</table><br>";
}

echo "<h1>Bike Rentals Database Queries</h1>";

foreach ($queries as $title => $functionName) {
    echo "<h2>$title</h2>";

    $sql = $functionName();

    if (stripos($sql, 'SELECT') === 0) {
        $stmt = $pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        displayTable($rows);
    } else {
        $pdo->exec($sql);

        if ($functionName === 'sqlUpdateCloseRental') {
            $stmt = $pdo->query("SELECT * FROM rentals WHERE rental_id = 3");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            displayTable($rows);
        } elseif ($functionName === 'sqlUpdateBikeUnavailable') {
            $stmt = $pdo->query("SELECT * FROM bikes WHERE bike_id = 4");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            displayTable($rows);
        } else {
            echo "Query executed successfully.<br>";
        }
    }
}
?>
