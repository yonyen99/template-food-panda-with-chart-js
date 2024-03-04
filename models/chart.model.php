<?php
require_once '../database/database.php'; // Include the database connection file

function getMonthlies() {
    global $connection;
    $statement = $connection->prepare("SELECT * FROM monthly_data");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

$monthlies = getMonthlies();

$labels = array();
$maleData = array();
$femaleData = array();

foreach ($monthlies as $monthly) {
    // Assuming your database structure has 'month', 'male', and 'female' columns
    $labels[] = $monthly['month'];
    $maleData[] = $monthly['male'];
    $femaleData[] = $monthly['female'];
}

$data = array(
    "labels" => $labels,
    "maleData" => $maleData,
    "femaleData" => $femaleData
);

echo json_encode($data);
?>
