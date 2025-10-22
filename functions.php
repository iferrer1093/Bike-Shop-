<?php
function sqlAllCustomers(): string
{
    return "SELECT * FROM customers ORDER BY last_name, first_name;";
}

function sqlAvailableBikes(): string
{
    return "SELECT * FROM bikes WHERE available = 1;";
}

function sqlAllBikesByPrice(): string 
{
    return "SELECT * FROM bikes ORDER BY hourly_rate DESC;";
}

function sqlOpenRentals(): string 
{
    return "SELECT * FROM rentals WHERE end_time IS NULL;";
}

function sqlJoinRentalsCustomers(): string 
{
    return 
    "SELECT rentals.*, customers.first_name, customers.last_name
    FROM rentals
    INNER JOIN customers ON rentals.customer_id = customers.customer_id;";
}

function sqlJoinRentalsBikes(): string 
{
    return 
    "SELECT rentals.*, bikes.model, bikes.type, bikes.hourly_rate
    FROM rentals
    INNER JOIN bikes ON rentals.bike_id = bikes.bike_id;";
}

function sqlTop3Bikes(): string 
{
    return "SELECT * FROM bikes ORDER BY hourly_rate DESC LIMIT 3;";
}

function sqlMultiJoinRentals(): string 
{
    return 
    "SELECT rentals.rental_id, customers.first_name, customers.last_name,
    bikes.model, bikes.type, rentals.start_time, rentals.end_time
    FROM rentals
    INNER JOIN customers ON rentals.customer_id = customers.customer_id
    INNER JOIN bikes ON rentals.bike_id = bikes.bike_id;";
}

function sqlUpdateCloseRental(): string 
{
    return "UPDATE rentals SET end_time = NOW() WHERE rental_id = 3;";
}

function sqlUpdateBikeUnavailable(): string 
{
    return "UPDATE bikes SET available = 0 WHERE bike_id = 4;";
}





?>