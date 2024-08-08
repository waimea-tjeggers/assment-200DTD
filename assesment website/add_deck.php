<?php
require '_functions.php';
include 'partials/top.php';

echo "<h1> adding cards to the database </h1>";
consoleLog($_POST, "POST Data");

$deck_name=$_POST['name']
$deck_budget=$_POST['budget']

db = connectToDB();

$query = 'INSERT INTO decks (name,budget) VALUES (?,?)'

include 'partials/bottom.php'; ?>