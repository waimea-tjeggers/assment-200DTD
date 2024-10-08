<?php
require '_functions.php';
include 'partials/top.php';

$deckid = $_GET['id'] ?? '';

$db = connectToDB();

$query = 'SELECT * FROM decks WHERE id = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$deckid]);
    $decks = $stmt->fetch(); 
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting deck data from the database');
}

consoleLog($decks);

if ($decks == false) die('Unknown deck: ' . $deckid);

echo '<h2>' . $decks['name'] . '</h2>';
echo 'budget is ' . $decks['budget'] .'$';

//----------------------------------------------------------------------------------------

$query = 'SELECT cards.name, 
                 cards.price,
                 cards.type
            FROM cards
            JOIN contains ON contains.card_id=cards.id
            JOIN decks ON contains.deck_id=decks.id
            WHERE decks.id = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$deckid]);
    $cards = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}

consoleLog($cards);


echo '<ul id = "company-list">';

foreach($cards as $card) {
    echo '<li>';

    echo $card['name'];

    echo '<br>';

    echo $card['price'];

    echo '</li>';
}

echo '</ul>';

echo '<a href="deck-view_cmc.php?id='. $decks['id'] . '">';
echo $decks['name'] . '_converted mana cost view';
echo '</a>';

echo '<div id ="add-button">
        <a href ="connect-card.php">
            add card
        </a>
    </div>';


include 'partials/bottom.php'; ?>