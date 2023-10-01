<!DOCTYPE html>
<html>
<head>
    <title>BMI Result</title>

</head>
<body>
    <h1>BMI Result</h1>
    <div class="result-container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve user input
        $weight = floatval($_POST["weight"]);
        $height = floatval($_POST["height"]);

        // Check if the values are valid
        if ($weight <= 0 || $height <= 0) {
            echo "<p>Invalid input. Weight and height must be greater than zero.</p>";
        } else {
            // Calculate BMI
            $heightInMeters = $height / 100;
            $bmi = $weight / ($heightInMeters * $heightInMeters);

            // Determine BMI status
            $status = "";
            if ($bmi <16.0) {
                $status = "Severely Underweight";
            } elseif($bmi >=16.0 && $bmi< 18.5) {
                $status = "Underweight";
            } elseif ($bmi >= 18.5 && $bmi < 25) {
                $status = "Normal";
            } elseif ($bmi >= 25 && $bmi < 30) {
                $status = "Overweight";
            } else {
                $status = "Obese";
            }

            echo '<p class="result-label">Your BMI is:</p>';
            echo '<p class="result-value">' . number_format($bmi, 2) . '</p>';
            echo '<p class="result-label">Status:</p>';
            echo '<p class="result-status">' . $status . '</p>';
        }
    }
    ?>
           <a class="result-link-box" href="index.html">Calculate Again</a>
     </div>
</body>
</html>
