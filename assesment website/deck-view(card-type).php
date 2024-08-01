<?php
require '_functions.php';
include 'partials/top.php';

$deckid = $_GET['id'] ?? '';

$db = connectToDB();

$query = 'SELECT * FROM deck WHERE id = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$companyCode]);
    $company = $stmt->fetch(); 
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting company data from the database');
}

consoleLog($deck);

if ($deck == false) die('Unknown deck: ' . $deckid);

echo '<h2>' . $deck['name'] . '</h2>';



include 'partials/bottom.php'; ?>