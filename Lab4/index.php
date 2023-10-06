<!DOCTYPE html>
<html>
<head>
    <title>Pizza Order</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $size = $_POST['size'];
    $toppings = isset($_POST['topping']) ? $_POST['topping'] : array();
    
    $basePrices = array(
        "small" => 5,
        "medium" => 7,
        "large" => 9,
    );
    
    $toppingPrices = array(
        "small" => 0.50,
        "medium" => 1,
        "large" => 1.50,
    );
    
    $total = $basePrices[$size];
    
    foreach ($toppings as $topping) {
        $total += $toppingPrices[$size];
    }

    echo "<h2>Your Order:</h2>";
    echo "Size: " . ucfirst($size) . " - $" . $basePrices[$size] . "<br>";
    foreach ($toppings as $topping) {
        echo "Topping: " . ucfirst($topping) . " - $" . $toppingPrices[$size] . "<br>";
    }
    echo "<strong>Total: $" . $total . "</strong>";
} else {
?>

<form action="pizza.php" method="post">
    <h2>Order Your Pizza</h2>
    Size:
    <label><input type="radio" name="size" value="small" required> Small ($5)</label>
    <label><input type="radio" name="size" value="medium"> Medium ($7)</label>
    <label><input type="radio" name="size" value="large"> Large ($9)</label>
    <br>
    Toppings:
    <label><input type="checkbox" name="topping[]" value="pepperoni"> Pepperoni</label>
    <label><input type="checkbox" name="topping[]" value="mushrooms"> Mushrooms</label>
    <label><input type="checkbox" name="topping[]" value="onions"> Onions</label>
    <label><input type="checkbox" name="topping[]" value="sausage"> Sausage</label>
    <br>
    <input type="submit" value="Order Pizza">
</form>

<?php
}
?>

</body>
</html>

