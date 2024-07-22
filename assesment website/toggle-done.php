<?php
require '_functions.php';

$todoId = $_GET['id'] ?? '';

// Connect to the database
$db = connectToDB();

//set up a query to get task info
$query = 'UPDATE decks SET completed = NOT completed WHERE id =? ';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$todoId]); // Pass in the data
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB  task status update', ERROR);
    die('There was an error updating data from the database');
}

header('location:index.php');


 ?>