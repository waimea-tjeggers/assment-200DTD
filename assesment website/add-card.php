<?php
require '_functions.php';
include 'partials/top.php';

echo "<h1> adding cards to the database </h1>";

consoleLog($_POST, 'POST');
consoleLog($_FILES, 'FILES');

if(empty($_POST) && empty($_FILES)) die ('There was a problem uploading the file (probably too large)');

//----------------------------------------------------------------------------
// Get image data and type of uploaded file from the $_FILES super-global

[
    'data' => $imageData,
    'type' => $imageType
] = uploadedImageData($_FILES['image']);

//----------------------------------------------------------------------------
// Get other data from form via the $_POST super-global.

$name=$_POST['name'];
$commander=$_POST['commander'] ?? 0;
$type=$_POST['type'];
$legendary=$_POST['legendary'] ?? 0;
$mana_cost=$_POST['mana_cost'];
$cmc=$_POST['cmc'];
$price=$_POST['price'];

$db = connectToDB();

$query = 'INSERT INTO cards (name,commander,type,legendary,mana_cost,cmc,image_data,image_type,price) VALUES (?,?,?,?,?,?,?,?,?)';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$name,$commander,$type,$legendary,$mana_cost,$cmc,$imageData,$imageType,$price]);
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Company Add', ERROR);
    die('There was an error adding data to the database');
}

echo'<p>Success!!!!!</p>';


include 'partials/bottom.php'; ?>