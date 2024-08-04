<?php
require '_functions.php';
include 'partials/top.php';

$deckid = $_GET['id'] ?? '';

$db = connectToDB();

$query = 'SELECT * FROM decks WHERE id = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$deckid]);
    $decks = $stmt->fetch(); 
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting deck data from the database');
}

consoleLog($decks);

if ($decks == false) die('Unknown deck: ' . $deckid);

echo '<h2>' . $deck['name'] . '</h2>';




include 'partials/bottom.php'; ?>