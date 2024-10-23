<?php
// Function to convert length
function convertLength($value, $fromUnit, $toUnit) {
    // Define conversion rates to meters
    $conversionRates = [
        'meters' => 1,
        'kilometers' => 1000,
        'feet' => 0.3048,
        'miles' => 1609.34,
    ];

    // Convert input value to meters
    $valueInMeters = $value * $conversionRates[$fromUnit];

    // Convert meters to the desired unit
    return $valueInMeters / $conversionRates[$toUnit];
}

// Initialize variables
$result = null;
$error = null;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = $_POST['value'];
    $fromUnit = $_POST['fromUnit'];
    $toUnit = $_POST['toUnit'];

    // Validate input
    if (is_numeric($value) && $value >= 0) {
        // Perform the conversion
        $result = convertLength($value, $fromUnit, $toUnit);
    } else {
        $error = "Please enter a valid positive number.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Length Unit Converter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Length Unit Converter</h1>
        <form method="POST" action="">
            <input type="number" name="value" placeholder="Enter length" required>
            <select name="fromUnit" required>
                <option value="meters">Meters</option>
                <option value="kilometers">Kilometers</option>
                <option value="feet">Feet</option>
                <option value="miles">Miles</option>
            </select>
            <select name="toUnit" required>
                <option value="meters">Meters</option>
                <option value="kilometers">Kilometers</option>
                <option value="feet">Feet</option>
                <option value="miles">Miles</option>
            </select>
            <button type="submit">Convert</button>
        </form>

        <?php if ($result !== null): ?>
            <h2>Result: <?php echo round($result, 2); ?> <?php echo htmlspecialchars($toUnit); ?></h2>
        <?php elseif ($error): ?>
            <h2 style="color:red;"><?php echo htmlspecialchars($error); ?></h2>
        <?php endif; ?>
    </div>
</body>
</html>
