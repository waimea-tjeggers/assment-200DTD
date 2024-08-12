<?php
require '_functions.php';
include 'partials/top.php';



?>
<h2> Add Card</h2>

<form method = "post" action = "add-card.php" enctype="multipart/form-data">
    <label>Card Name</label>
    <input name = "name" type = "text" required>

    <br>

    <label>Commander?</label>
    <input name="commander" type="checkbox" value="1" >

    <br>

    <label>Card Type</label>
    <select name ="type" required>
    <option> land </option>
    <option> creature </option>
    <option> enchantment </option>
    <option> artifact </option>
    <option> instant </option>
    <option> sorcery </option>
    <option> enchantment creature </option>
    <option> artifact creature </option>
    </select>

    <br>

    <label>Legendary</label>
    <input name="legendary" type="checkbox" value="1">

    <br>

    <label>Mana Cost</label>
    <input name ="mana_cost" type ="text" placeholder = "e.g. Three G G B" required>

    <br>

    <label>Converted Mana Cost</label>
    <input name ="cmc" type ="int" placeholder = "e.g. 6" required>

    <br>

    <label>Card image</label>
    <input type="file" name="image" accept="image/*" required>

    <br>

    <label>Card Price</label>
    <input name ="price" input ="int" required>
    
    <br>

    <input type="submit" value="Add">

    


<?php include 'partials/bottom.php'; ?>