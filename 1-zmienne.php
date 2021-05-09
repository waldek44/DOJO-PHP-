<?php

//
// 1
// ZMIENNE (deklarowanie i wyświetlanie) 
//

$x = 100;
$y = 'dwa';
$z = 'zzz';
$nazwaZmiennej = 'można też $camel_case';
$cena = "cena produktu:";

// echo i print nie potrzebują nawiasów, bo to nie są funkcje tylko konstrukcje językowe
// print potrafi wyświetlić tylko jedną wartość, echo może wiele
// . operator łączenia ciągów tekstowych (konkatenacja)

echo "<h1>1</h1>";
echo $x; 
echo "</br></br>";

echo "<h1>2</h1>";
print $nazwaZmiennej;
echo "</br></br>";

echo "<h1>3</h1>";
echo $x, ' - ', $y, ' - ', $z; 
echo "</br></br>";

echo "<h1>4</h1>";
echo $cena . ' wynosi aktualnie ' . " " . $x;
echo "</br></br>";


// łączenie zmiennych wewnątrz ciągu znaków
echo "<h1>5</h1>";
echo "$cena wynosi aktualnie $y"; 
echo "</br></br>";

echo "<h1>6</h1>";
echo 'It\'s good to type this. WOW :)'; 
echo "</br></br>";

?>

