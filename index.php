<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kalkulačka v PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1>Kalkulačka</h1>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="number1" placeholder="Číslo 1" required>
    <select name="operation">
        <option value="plus">+</option>
        <option value="minus">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
    </select>
    <input type="text" name="number2" placeholder="Číslo 2" required>
    <input type="submit" value="Spočítat">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number1 = $_POST["number1"];
    $number2 = $_POST["number2"];
    $operation = $_POST["operation"];

    if (is_numeric($number1) && is_numeric($number2)) {
        switch ($operation) {
            case "plus":
                $result = $number1 + $number2;
                break;
            case "minus":
                $result = $number1 - $number2;
                break;
            case "multiply":
                $result = $number1 * $number2;
                break;
            case "divide":
                if ($number2 != 0) {
                    $result = $number1 / $number2;
                } else {
                    echo "Nelze dělit nulou.";
                    exit();
                }
                break;
            default:
                echo "Neplatná operace.";
                exit();
        }

        echo "<div class='result'>Výsledek: $result</div>";
    } else {
        echo "<div class='error'>Zadejte platná čísla.</div>";
    }
}
?>

</body>
</html>
