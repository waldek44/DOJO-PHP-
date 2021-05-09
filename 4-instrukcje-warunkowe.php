<?php


// 1
echo "<h1>1 INSTRUKCJA WARUNKOWA IF
</h1>";
// 1

// $my_error = 404;
// $my_error = 500;
$my_error = 60;

if ($my_error == 404) {
    echo 'To jest błąd 404' . "</br>";
}
elseif ($my_error == 500) {
    echo 'To jest 500';
}
else {
    echo 'Jakiś inny błąd';
}


// 2
echo "<h1>2 INSTRUKCJA WARUNKOWA IF ZAPIS SKRÓCONY
</h1>";
// 2

$order = 60;
$bon = 0;
// inny przykład if
if ($order >= 100) {
   $bon == 10;
}
else {
    $bon == 5;
}


// 3
echo "<h1>3 nowy zapis skrócony
</h1>";
// 3
// nowy zapis skrócony (PHP7) - przed dwókropkiem jest if, po nim else

$rabat = ($order >= 100) ? 10 : 5;
echo "Wartość rabatu to $rabat%";


// 4
echo "<h1>4 IF WARUNKI ZŁOŻONE
</h1>";
// 4

// operator && to "i"
// operator || to "lub"

// $orderValue = 240;
$orderValue = 440;
$category = 'Tablety';

if ($orderValue >= 300 && $category == 'Tablety') {
    echo 'Masz rabat 10%';
} else {
    echo 'za zamówienie powyżej 300zł w kategorii Tablety dostaniesz rabat!';
}



// 
echo "<h1>5 TRUE | FALSE
</h1>";
// 

// w PHP 0 jest równe FALSE, pusty string i tablica też = FALSE (inny string i tablica to TRUE)
$x = TRUE;

if ($x == TRUE) {
    echo 'tak, to prawda';
} else {
    echo 'nie prawda to jest';
}



// 
echo "<h1>6 SWITCH
</h1>";
// 

$responseCode = 4041;

switch ($responseCode) {
    case '401':
        echo 'Nieautoryzowany dostęp';
        break;  // jeśli pominę break wykona mi kolejne instukcje w dół kodu
    case '404':
        echo 'Nie znaleziono';
        break;
    case '500':
        echo 'Błąd serwera';
        break;
    default:
    echo 'Nieznany błąd';
}

?>