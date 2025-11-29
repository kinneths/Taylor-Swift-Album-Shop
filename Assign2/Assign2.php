<!DOCTYPE html>
<html>
<head>
    <title>Taylor Swift Album Store</title>
    <style>
        body{
            font-family: Arial;
            background:linear-gradient(to bottom,#d9a7ff,#fffcdc);
            display:flex;
            justify-content:center;
            padding:40px;
        }
        .container{
            width:700px;
            background:white;
            padding:22px;
            border-radius:14px;
            box-shadow:0 0 15px rgba(0,0,0,.25);
        }
        h2{
            color:#7720ad;
            margin-bottom:10px;
        }
        table{
            width:100%;
            border-collapse:collapse;
            margin-bottom:18px;
        }
        table,td,th{
            border:1px solid #222;
        }
        td,th{
            padding:10px;
            text-align:center;
        }
        select,input{
            padding:6px;
            margin:5px 0 15px 0;
            width:235px;
        }
        button{
            padding:9px 16px;
            border:none;
            background:#6a0dad;
            border-radius:5px;
            color:white;
            cursor:pointer;
        }
        .reset-btn{
            background:#666;
        }
        .summary-box{
            background:#efe3ff;
            padding:15px;
            border-radius:10px;
            margin-top:10px;
        }
        .total{
            font-weight:bold;
            font-size:18px;
            color:#5e1ca6;
        }
        img{
            width:120px;
            height:120px;
            border-radius:7px;
        }
        .summary-img{
            width:120px;
            height:120px;
            margin-bottom:12px;
        }
        footer{
            text-align:center;
            margin-top:20px;
            color:#444;
            font-size:14px;
        }
    </style>
</head>

<body>
<div class="container">

<?php require "header.php"; ?>

<?php
$albums = [
    "Taylor Swift (Debut)" => [
        "price"=>300,
        "img"=>"https://upload.wikimedia.org/wikipedia/en/1/1f/Taylor_Swift_-_Taylor_Swift.png"
    ],
    "Fearless" => [
        "price"=>320,
        "img"=>"https://upload.wikimedia.org/wikipedia/en/thumb/8/86/Taylor_Swift_-_Fearless.png/250px-Taylor_Swift_-_Fearless.png"
    ],
    "Speak Now" => [
        "price"=>340,
        "img"=>"https://upload.wikimedia.org/wikipedia/en/thumb/8/8f/Taylor_Swift_-_Speak_Now_cover.png/250px-Taylor_Swift_-_Speak_Now_cover.png"
    ],
    "Red" => [
        "price"=>350,
        "img"=>"https://upload.wikimedia.org/wikipedia/en/e/e8/Taylor_Swift_-_Red.png"
    ],
    "1989" => [
        "price"=>360,
        "img"=>"https://upload.wikimedia.org/wikipedia/en/f/f6/Taylor_Swift_-_1989.png"
    ],
    "Reputation" => [
        "price"=>380,
        "img"=>"https://upload.wikimedia.org/wikipedia/en/f/f2/Taylor_Swift_-_Reputation.png"
    ],
    "Lover" => [
        "price"=>370,
        "img"=>"https://upload.wikimedia.org/wikipedia/en/c/cd/Taylor_Swift_-_Lover.png"
    ],
    "Folklore" => [
        "price"=>350,
        "img"=>"https://upload.wikimedia.org/wikipedia/en/f/f8/Taylor_Swift_-_Folklore.png"
    ],
    "Evermore" => [
        "price"=>350,
        "img"=>"https://upload.wikimedia.org/wikipedia/en/0/0a/Taylor_Swift_-_Evermore.png"
    ],
    "Midnights" => [
        "price"=>390,
        "img"=>"https://upload.wikimedia.org/wikipedia/en/thumb/9/9f/Midnights_-_Taylor_Swift.png/250px-Midnights_-_Taylor_Swift.png"
    ],
    "The Tortured Poets Department" => [
        "price"=>400,
        "img"=>"https://upload.wikimedia.org/wikipedia/en/6/6e/Taylor_Swift_%E2%80%93_The_Tortured_Poets_Department_%28album_cover%29.png"
    ],
    "The Life of a Showgirl" => [
        "price"=>350,
        "img"=>"https://upload.wikimedia.org/wikipedia/en/f/f4/Taylor_Swift_%E2%80%93_The_Life_of_a_Showgirl_%28album_cover%29.png"
    ]
];

$editions = [
    "Standard"=>0,
    "Deluxe"=>50,
    "Signed Edition"=>150
];

$selectedAlbum = "";
$selectedEdition = "";
$qty = "";
$subtotal = "";
$tax = "";
$total = "";
$selectedImg = "";

if(isset($_POST["order"])){
    $selectedAlbum = $_POST["album"];
    $selectedEdition = $_POST["edition"];
    $qty = $_POST["qty"];

    if($qty > 0){
        $subtotal = ($albums[$selectedAlbum]["price"] + $editions[$selectedEdition]) * $qty;
        $tax = $subtotal * .12;
        $total = $subtotal + $tax;
        $selectedImg = $albums[$selectedAlbum]["img"];
    }
}
?>

<h2>Available Albums</h2>

<table>
    <tr><th>Cover</th><th>Album</th><th>Price</th></tr>
    <?php foreach($albums as $name=>$info){ ?>
    <tr>
        <td><img src="<?php echo $info["img"]; ?>"></td>
        <td><?php echo $name; ?></td>
        <td>₱<?php echo $info["price"]; ?></td>
    </tr>
    <?php } ?>
</table>

<h2>Place an Order</h2>

<form method="POST">

<label>Pick Album:</label><br>
<select name="album">
    <?php foreach($albums as $name=>$info){ ?>
    <option value="<?php echo $name; ?>"><?php echo $name." - ₱".$info["price"]; ?></option>
    <?php } ?>
</select><br>

<label>Edition:</label><br>
<select name="edition">
    <?php foreach($editions as $type=>$add){ ?>
    <option value="<?php echo $type; ?>"><?php echo $type." (+".$add.")"; ?></option>
    <?php } ?>
</select><br>

<label>Quantity:</label><br>
<input type="number" name="qty" value="1" min="1"><br>

<button type="submit" name="order">Order Now</button>
<button type="submit" class="reset-btn" name="reset">Reset</button>

</form>

<h2>Order Summary</h2>

<div class="summary-box">
    <?php if($selectedImg){ ?>
        <img class="summary-img" src="<?php echo $selectedImg; ?>">
    <?php } ?>

    <p>Album: <?php echo $selectedAlbum ? $selectedAlbum : "—"; ?></p>
    <p>Edition: <?php echo $selectedEdition ? $selectedEdition : "—"; ?></p>
    <p>Quantity: <?php echo $qty ? $qty : "—"; ?></p>
    <p>Subtotal: <?php echo $subtotal ? "₱".number_format($subtotal,2) : "—"; ?></p>
    <p>Tax (12%): <?php echo $tax ? "₱".number_format($tax,2) : "—"; ?></p>
    <p class="total">Total: <?php echo $total ? "₱".number_format($total,2) : "—"; ?></p>
</div>

<?php require "footer.php"; ?>

</div>
</body>
</html>

