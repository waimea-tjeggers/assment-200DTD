<?php
require '_functions.php';
include 'partials/top.php';

echo "<h1> adding cards to the database </h1>";
consoleLog($_POST, "POST Data");

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

$card_name=$_POST['card-name']
$commander=$_POST['commander']
$card_type=$_POST['card-type']
$legendary=$_POST['legendary']
$mana_cost=$_POST['mana-cost']
$cmc=$_POST['cmc']
$image_data=$_POST['image-data']
$image_type=$_POST['image-type']
$price=$_POST['price']

$db = connectToDB();

$query = 'INSERT INTO cards (card-name,commander,card-type,legendary,mana-cost,cmc,image-data,price) VALUES (?,?,?,?,?,?,?,?,?)';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$code,$name,$website]);
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB Company Add', ERROR);
    die('There was an error adding data to the database');
}

echo'<p>Success!!!!!</p>';


include 'partials/bottom.php'; ?>