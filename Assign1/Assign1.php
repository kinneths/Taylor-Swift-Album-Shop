<?php
$drinks = array(
    array("name" => "Lover Lemonade", "price" => 120, "album" => "Lover"),
    array("name" => "Red Raspberry Iced Tea", "price" => 110, "album" => "Red"),
    array("name" => "Midnights Mocha", "price" => 150, "album" => "Midnights"),
    array("name" => "1989 Blue Breeze", "price" => 130, "album" => "1989"),
    array("name" => "Folklore Forest Matcha", "price" => 140, "album" => "Folklore")
);

$discount = 10;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Swift Sips Store</title>
    <style>
        body{
            background: #f7e9f5;
            font-family: Arial;
        }
        h1{
            text-align:center;
            color:#b84894;
        }
        .tagline{
            text-align:center;
            margin-top:-10px;
            margin-bottom:20px;
            color:#7a3e6c;
            font-size:14px;
        }
        table{
            width:70%;
            margin:auto;
            border-collapse:collapse;
            background:white;
            border:2px solid #e6b8d7;
        }
        th{
            padding:12px;
            border:1px solid #e1c3db;
            background:#f3d1e7;
            color:#5c2e4f;
        }
        td{
            padding:10px;
            border:1px solid #e1c3db;
        }
        footer{
            text-align:center;
            margin-top:30px;
            padding:10px;
            font-size:14px;
            color:#5b3b5e;
        }
    </style>
</head>
<body>

<h1>Swift Sips – Drinks Inspired by Taylor Swift Albums</h1>
<p class="tagline">“Every era comes with a flavor.”</p>

<table>
    <tr>
        <th>Drink Name</th>
        <th>Album</th>
        <th>Price</th>
        <th>Price w/ Discount</th>
    </tr>

    <?php
    foreach($drinks as $one){
        $finalPrice = $one["price"] - $discount;
        echo "<tr>";
        echo "<td>". $one["name"] ."</td>";
        echo "<td>". $one["album"] ."</td>";
        echo "<td>P ". $one["price"] ."</td>";
        echo "<td>P ". $finalPrice ."</td>";
        echo "</tr>";
    }
    ?>
</table>

<footer>
    © 2025 Swift Sips Store. All rights reserved. [Kenneth Guanlao]
</footer>

</body>
</html>