<?php
require '_functions.php';
include 'partials/top.php';

$db = connectToDB();

$query = 'SELECT * FROM decks ORDER BY name ASC'

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $companies = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB company Fetch', ERROR);
    die('There was an error adding data to the database');
}

// See what we got back
consoleLog($decks);



?>
<h2> Add Card</h2>

<form method = "post" action = "deck.php">
    <label> Deck Name </label>
    <input name = 'name' type = text required>

    <input type="submit" value="Add">

<?php include 'partials/bottom.php'; ?>