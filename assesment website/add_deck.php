<?php
require '_functions.php';
include 'partials/top.php';

echo "<h1> adding cards to the database </h1>";
consoleLog($_POST, "POST Data");

$name=$_POST['name'];
$budget=$_POST['budget'];

echo'<p>name, ' . $name;
echo'<p>budget, ' . $budget;


$db = connectToDB();

$query = 'INSERT INTO decks (name,budget) VALUES (?,?)';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$name,$budget]);
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Company Add', ERROR);
    die('There was an error adding data to the database');
}

echo'<p>Success!!!!!</p>';

include 'partials/bottom.php'; ?>