<?php

$num1 = $_GET['num1'];
$num2 = $_GET['num2'];

if ($num1 === '')
    $num1 = 0;
if ($num2 === '')
    $num2 = 0;

$res = $num1 + $num2;

echo "<h1>$num1 + $num2 = $res</h1>";
?>

<a href="form2.html">Return to the form</a>