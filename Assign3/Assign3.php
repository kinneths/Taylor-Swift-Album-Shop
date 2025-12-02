<?php
declare(strict_types=1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Stock Monitor – Taylor Swift Store</title>
    <style>
        body{
            font-family: Arial;
            background: #f3e8ff; /* minimalist lavender background matching TS theme */
            padding: 40px;
            display: flex;
            justify-content: center;
        }
        .container{
            width: 750px;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 0 12px rgba(0,0,0,0.2);
        }
        h2{
            color: #7720ad;
            margin-bottom: 15px;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        th, td{
            padding: 12px;
            border: 1px solid #444;
            text-align: center;
        }
        th{
            background: #efe3ff;
        }
    </style>
</head>

<body>
<div class="container">

<h2>Stock Control – Taylor Swift Albums</h2>

<?php

$ts_products = [
    "1989 (Taylor's Version)" => ["price" => 350, "stock" => 12],
    "Red (Taylor's Version)" => ["price" => 360, "stock" => 26],
    "Folklore" => ["price" => 340, "stock" => 8],
    "Evermore" => ["price" => 345, "stock" => 15],
    "Midnights" => ["price" => 380, "stock" => 5],
    "Lover" => ["price" => 330, "stock" => 9],
];

$taxRate = 12;

function get_reorder_message(int $stock): string {
    return ($stock < 10) ? "Yes" : "No";
}

function get_total_value(float $price, int $quantity): float {
    return $price * $quantity;
}

function get_tax_due(float $price, int $quantity, int $tax = 0): float {
    return ($price * $quantity) * ($tax / 100);
}
?>

<table>
    <tr>
        <th>Product</th>
        <th>Stock</th>
        <th>Re-order?</th>
        <th>Total Value</th>
        <th>Tax Due</th>
    </tr>

    <?php
    
    foreach($ts_products as $product_name => $data){
        $price = $data["price"];
        $stock = $data["stock"];
        $reorder = get_reorder_message($stock);
        $totalValue = get_total_value($price, $stock);
        $taxDue = get_tax_due($price, $stock, $taxRate);
    ?>

    <tr>
        <td><?php echo $product_name; ?></td>
        <td><?php echo $stock; ?></td>
        <td><?php echo $reorder; ?></td>
        <td>₱<?php echo number_format($totalValue, 2); ?></td>
        <td>₱<?php echo number_format($taxDue, 2); ?></td>
    </tr>

    <?php } ?>
</table>

</div>
</body>
</html>
