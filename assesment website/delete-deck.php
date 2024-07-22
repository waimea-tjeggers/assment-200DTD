<?php
require '_functions.php';

$todoId = $_GET['id'] ?? '';

// Connect to the database
$db = connectToDB();

$query ='DELETE FROM decks WHERE id = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$todoId]); // Pass in the data
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB  data removal', ERROR);
    die('There was an error removing the task from the database');
}

header('location:index.php');


 ?>