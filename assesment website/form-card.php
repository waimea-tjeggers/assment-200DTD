<?php
require '_functions.php';
include 'partials/top.php';

// Connect to the database
$db = connectToDB();

$query = 'SELECT * FROM cards ORDER BY card-name ASC'

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
consoleLog($cards);

?>
<h2> Add Card</h2>

<form method = "post" action = "add-card.php" enctype="multipart/form-data">
    <label>Card Name</label>
    <input name = "card-name" type = "text" required>

    <label>Commander?</label>
    <input name="commander" type="checkbox" required>

    <label>Card Type</label>
    <select name ="card-type" required>
    <option> land </option>
    <option> creature </option>
    <option> enchantment </option>
    <option> artifact </option>
    <option> instant </option>
    <option> sorcery </option>
    <option> enchantment creature </option>
    <option> artifact creature </option>
    </select>

    <label>Legendary</label>
    <input name="legendary" type="checkbox" required>


    <label>Mana Cost</label>
    <input name ="mana-cost" type ="text" placeholder = "e.g. Three G G B" required>

    <label>Converted Mana Cost</label>
    <input name ="cmc" type ="int" placeholder = "e.g. 6" required>

    <label>Card image</label>
    <input type="file" name="image" accept="image/*" required>

    <label>Image type</label>
    <input name ="image-type" input ="text" required>

    <label>Card Price</label>
    <input name ="price" input ="int" required>

    <input type="submit" value="Add">

    


<?php include 'partials/bottom.php'; ?>