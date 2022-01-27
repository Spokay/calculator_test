<?php
session_start();
include('builder/Calculator.php');
if (isset($_GET) && isset($_GET['value'])){
    $type = $_GET['type'];
    $val = $_GET['value'];
    $firstHistory = $_SESSION['firstHistory'];
    $secondHistory = $_SESSION['secondHistory'];
    $thirdHistory = $_SESSION['thirdHistory'];
    $calc = new Calculator($type, $val, $firstHistory, $secondHistory, $thirdHistory);
    var_dump($calc->output);
    $_SESSION['firstHistory'] = $calc->firstHistory;
    $_SESSION['secondHistory'] = $calc->secondHistory;
    $_SESSION['thirdHistory'] = $calc->thirdHistory;
    var_dump($calc->value.$calc->type);
    var_dump($calc->firstHistory. $calc->secondHistory . $calc->thirdHistory);
    // ouai ouai
    $calcVal = $calc->output;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Calculator app</title>
</head>
<body class="theme-1">

<main class="big-container">
    <div class="calculator-container">
        <section class="calc-themes">
            <h1>calc</h1>
            <h2>theme</h2>
            <div class="themes-container">
                <div class="theme-numbers">
                    <p class="theme-number-1">1</p>
                    <p class="theme-number-2">2</p>
                    <p class="theme-number-3">3</p>
                </div>
                <input type="range" id="RangeFilter" name="points" onchange="filterme(this.value);" min="1" class="rangeActive custom-slider" max="3" value="1">
            </div>
        </section>
        <section class="calc-keypad">
            <p><?php echo $calcVal??'0'; ?></p>
        </section>
        <section class="calc-inputs">
            <a href="?type=number&value=7" class="keyboard-element"><div>7</div></a>
            <a href="?type=number&value=8" class="keyboard-element"><div>8</div></a>
            <a href="?type=number&value=9" class="keyboard-element"><div>9</div></a>
            <a href="?type=tool&value=delete" class="keyboard-element delete"><div>del</div></a>
            <a href="?type=number&value=4" class="keyboard-element"><div>4</div></a>
            <a href="?type=number&value=5" class="keyboard-element"><div>5</div></a>
            <a href="?type=number&value=6" class="keyboard-element"><div>6</div></a>
            <a href="?type=operator&value=plus" class="keyboard-element"><div>+</div></a>
            <a href="?type=number&value=1" class="keyboard-element"><div>1</div></a>
            <a href="?type=number&value=2" class="keyboard-element"><div>2</div></a>
            <a href="?type=number&value=3" class="keyboard-element"><div>3</div></a>
            <a href="?type=operator&value=minus" class="keyboard-element"><div>-</div></a>
            <a href="?type=tool&value=dot" class="keyboard-element"><div>.</div></a>
            <a href="?type=number&value=0" class="keyboard-element"><div>0</div></a>
            <a href="?type=operator&value=slash" class="keyboard-element"><div>/</div></a>
            <a href="?type=operator&value=multiplie" class="keyboard-element"><div>x</div></a>
            <a href="?type=tool&value=reset" class="keyboard-element large-delete"><div>reset</div></a>
            <a href="?type=tool&value=equal" class="keyboard-element equal"><div>=</div></a>
        </section>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>