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

    <form action="display_results.php" method="post">

        <div class="form-group">
            <label>Investment Amount:</label>
            <input type="text" name="investment">
        </div>

        <div class="form-group">
            <label>Interest Rate:</label>
            <input type="text" name="interest_rate">
            <span>%</span>
        </div>

        <div class="form-group">
            <label>Number of Years:</label>
            <input type="text" name="years">
        </div>

        <div class="button-group">
            <input type="submit" value="Calculate">
        </div>

    </form>

</div>

</body>
</html>