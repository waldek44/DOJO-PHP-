<?php

$x = 7;
$y = 2;


// 1
echo "<h1>1 OPERATORY ARYTMETYCZNE
</h1>";
// 1

echo $x + $y . "</br>";
echo $x - $y . "</br>";
echo $x / $y . "</br>";
echo $x * $y . "</br>";
echo $x % $y . "</br>"; // modulo, zwraca resztę z dzielenia
echo $x ** $y . "</br>"; // potęgowanie
echo -$x; // zmiana wyniku na ujemny
echo "</br> </br>";



// 2
echo "<h1>2 OPERATORY KOMBINOWANE
</h1>";
// 2

$value = 10;
$value = $value + 5; // nie najlepszy zapis
$value += 5; // dobry zapis
echo $value . "</br> </br> </br>";


// 3
echo "<h1>3 INKREMENTACJA I DEKREMENTACJA
</h1>";
// 3

$newValue = 10;
$newValue ++;
echo $newValue . "</br>";


?>