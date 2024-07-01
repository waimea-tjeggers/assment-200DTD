<?php
require '_functions.php';
include 'partials/top.php';

echo '<h1>Main Page</h1>';

// Connect to the database
$db = connectToDB();

// query to attempt to get deck data
$query 'SELECT * FROM decks ORDER BY name ASC'

// Attempt to run the query
try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $todos = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}

// See what we got back
consoleLog($decks);

echo '<div id = "Add Deck">
        <a href ="form-deck">
            add deck
        </a>
    </div>'



include 'partials/bottom.php'; ?>