<?php

$investment_input = filter_input(INPUT_POST, 'investment');
$interest_rate_input = filter_input(INPUT_POST, 'interest_rate');
$years_input = filter_input(INPUT_POST, 'years');

$investment = filter_input(
    INPUT_POST,
    'investment',
    FILTER_VALIDATE_FLOAT
);

$interest_rate = filter_input(
    INPUT_POST,
    'interest_rate',
    FILTER_VALIDATE_FLOAT
);

$years = filter_input(
    INPUT_POST,
    'years',
    FILTER_VALIDATE_INT
);

$error_message = "";

if ($investment_input === null || trim($investment_input) === "") {

    $error_message = "Investment amount is required.";

} elseif ($investment === false || $investment < 0) {

    $error_message = "Investment amount must be a valid number greater than or equal to 0.";

} elseif ($interest_rate_input === null || trim($interest_rate_input) === "") {

    $error_message = "Interest rate is required.";

} elseif ($interest_rate === false) {

    $error_message = "Interest rate must be a valid number.";

} elseif ($interest_rate < 0 || $interest_rate > 15) {

    $error_message = "Interest rate must be less than or equal to 15.";

} elseif ($years_input === null || trim($years_input) === "") {

    $error_message = "Number of years is required.";

} elseif ($years === false || $years <= 0) {

    $error_message = "Number of years must be a whole number greater than 0.";

}

if ($error_message == "") {

    $future_value = $investment;

    for ($i = 1; $i <= $years; $i++) {
        $future_value += $future_value * $interest_rate * 0.01;
    }

    $investment_formatted =
        "$" . number_format($investment, 2);

    $interest_rate_formatted =
        number_format($interest_rate, 1) . "%";

    $future_value_formatted =
        "$" . number_format($future_value, 2);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future Value Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Future Value Calculator</h1>

    <?php if ($error_message != "") { ?>

        <div class="error">
            <?php echo $error_message; ?>
        </div>

        <form action="display_results.php" method="post">

            <div class="form-group">
                <label>Investment Amount:</label>
                <input
                    type="text"
                    name="investment"
                    value="<?php echo htmlspecialchars($investment_input ?? ''); ?>"
                >
            </div>

            <div class="form-group">
                <label>Interest Rate:</label>
                <input
                    type="text"
                    name="interest_rate"
                    value="<?php echo htmlspecialchars($interest_rate_input ?? ''); ?>"
                >
                <span>%</span>
            </div>

            <div class="form-group">
                <label>Number of Years:</label>
                <input
                    type="text"
                    name="years"
                    value="<?php echo htmlspecialchars($years_input ?? ''); ?>"
                >
            </div>

            <div class="button-group">
                <input type="submit" value="Try Again">
            </div>

        </form>

    <?php } else { ?>

        <div class="result">

            <p>
                <strong>Investment Amount:</strong>
                <?php echo $investment_formatted; ?>
            </p>

            <p>
                <strong>Interest Rate:</strong>
                <?php echo $interest_rate_formatted; ?>
            </p>

            <p>
                <strong>Number of Years:</strong>
                <?php echo $years; ?>
            </p>

            <p class="future-value">
                <strong>Future Value:</strong>
                <?php echo $future_value_formatted; ?>
            </p>

            <p>
                This calculation was done on
                <?php echo date('n/j/Y'); ?>.
            </p>

        </div>

        <a href="index.php" class="back-button">
            Calculate Again
        </a>

    <?php } ?>

</div>

</body>
</html>