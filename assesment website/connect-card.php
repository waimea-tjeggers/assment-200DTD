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

echo '<h2> Add Card </h2>';

echo '<h3> Add Brand New Card';
echo '<div id = "Add">
        <a href ="form-card.php">
            add new card
        </a>
    </div>';

?>

<h3> Add Pre-existing Card </h3>

<label>Choose Card</label>
<select name = 'cards.name' required>
    <?php
    foreach($cards as $card){
        echo '<option>';
        echo $card['name'];
        echo '</option>';
    }
    ?>
    </select>

    <br>
    
    <input type="submit" value="Add">
<?php include 'partials/bottom.php'; ?>