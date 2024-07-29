<?php
require '_functions.php';
include 'partials/top.php';

echo "<h1> adding cards to the database </h1>";
consoleLog($_POST, "POST Data");

$card_id=$_POST['card-id']
$card_name=$_POST['card-name']
$commander=$_POST['commander']
$card_type=$_POST['card-type']
$legendary=$_POST['legendary']
$mana_cost=$_POST['mana-cost']
$cmc=$_POST['cmc']
$image_data=$_POST['image-data']
$image_type=$_POST['image-type']
$price=$_POST['card-id']


include 'partials/bottom.php'; ?>