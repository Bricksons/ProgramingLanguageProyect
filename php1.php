<!DOCTYPE html>
<html>
<head>
    <body style="background-color: teal;">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <title>PHP programs</title>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['factorial'])) {
            $number = $_POST['number1'];
            $result = 1;

            if ($number < 0) {
                $_POST['number1'] = null;
            } elseif ($number === 0) {
                $_POST['number1'] = 1;
            } else {
                for ($i = 1; $i <= $number; $i++) {
                    $result *= $i;
                }
                $_POST['number1'] = $result;
            }
        } elseif (isset($_POST['celsiusToFahrenheit'])) {
            $celsius = $_POST['number1'];
            $fahrenheit = ($celsius * 1.8) + 32;
            $_POST['number1'] = $fahrenheit;
        } elseif (isset($_POST['decimalToBinary'])) {
            $decimal = $_POST['number1'];
            $bin = 0;
            $rem;
            $i = 1;
            $step = 1;

            while ($decimal != 0) {
                $rem = $decimal % 2;
                $decimal = intval($decimal / 2);
                $bin = $bin + $rem * $i;
                $i = $i * 10;
                $step++;
            }

            $_POST['number1'] = $bin;
        }
    }
    ?>
    <script>
      function myFunction4() {
	    window.location.href = "menu.html";
      }
    </script>

</head>
<body>
<h1 class="title">PHP programs</h1>
<p>The buttons give the result of their operation</p>
<ul>
    <form method="post">
        <label for="number1"></label>
        <input type="number" id="number1" name="number1" value="<?php echo $_POST['number1'] ?? ''; ?>">
        
        <li><button type="submit" name="factorial">Factorial</button></li>
        <li><button type="submit" name="celsiusToFahrenheit">C to F</button></li>
        <li><button type="submit" name="decimalToBinary">Binary</button></li>

    </form>
</ul>
<button onclick="myFunction4()">Back</button>
</body>
</html>
