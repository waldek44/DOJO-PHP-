<?php

/////////////////////////////////////////////////////////////////////////////////////
// 
echo "<h1>1 FUNKCJA JAKO PARAMETR INNEJ FUNKCJI</h1>";
// przykład z dwoma funkcjami modyfikowania string
// 
echo strtoupper(strrev($my_string));


/////////////////////////////////////////////////////////////////////////////////////
// 
echo "<h1>2 DEFINIOWANIE WŁASNEJ FUNKCJI</h1>";
// robimy to zawsze gdy kod wykorzystujemy wielokrotnie
//

$basicPrice = 300;
$discountRate = 0.1; // czyli 10% z sumy


function rabat( $price, $discount ) {  // funkcję definiujemy słowem kluczowym function
    $discountedPrice = $price - ($price * $discount);
    return $discountedPrice;
}; 

echo rabat($basicPrice, $discountRate);



/////////////////////////////////////////////////////////////////////////////////////
// 
echo "<h1>3 PRZEKAZYWANIE PRZEZ WARTOŚĆ LUB REFERENCJĘ</h1>";
// Do funkcji możemy przekazywać indeks przez wartość lub przez referencję 
// przekazywanie przez referencję  zmienia orginalny indeks
//

// przekazywanie przez wartość nie zmienia orginalnego indeksu (działa na kopii indeksu)
$z = 10;
function dzielenie($numer) {
    return $numer /= 2;
}
echo dzielenie($z) . '</br>';
echo $z;

// Przekazywanie przez referencję
$y = 10;
function dzielenieReferencja(&$numer) {
   return $numer /= 2;
}
echo dzielenieReferencja($y) . '</br>';
echo $y;


/////////////////////////////////////////////////////////////////////////////////////
// 
echo "<h1>4 TYPOWANIE W FUNKCJACH</h1>";
// Typowanie to określanie typu danych dla argumentów, lub typ danych które funkcja ma zwrócić
//

// typuję, że argumenty funkcji muszą być int
function sumNumbers(int $a, int $b) {
return $a * $b;
};

$x = sumNumbers(1.7, 5);
echo $x . '</br>';

/* 
liczby zostaną zaokrąglone do int
aby wyrzucało Error, mogę ustawić dla pliku ścisłe kontrolowanie typów.
Aby to zrobić muszę zaraz po <?php ustanowić deklarację:
declare(strict_typer=1);
*/


// typuję, że wartość parametru zwróconego przez funkcję muszą być int

function dodawanie ($c, $d) : int {
    return $c + $d;
};

echo dodawanie(4.4 , 4) . '</br>';

?>