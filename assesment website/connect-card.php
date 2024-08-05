<?php
require '_functions.php';
include 'partials/top.php';

$db = connectToDB();

$query = 'SELECT * FROM cards';

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $cards = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}

consoleLog($cards);

foreach($cards as $card){
    echo $card['name'];
}

include 'partials/bottom.php'; ?>