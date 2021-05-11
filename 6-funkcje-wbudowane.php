<?php

/////////////////////////////////////////////////////////////////////////////////////
// 
echo "<h1>1 FUNKCJE DO PRZETWARZANIA STRING</h1>";
// 

$price = 44;
$description = 'To jest opis';
$currency = " zł";


// funkcja usuwa puste znaki, spacje
echo  '</br>' . '</br>' . 'trim | usuwa spacje' . '</br>';
echo $price . trim($currency) . '</br>';


// funkcja wycina znaki ze stringa. Pierwszy parametr to zmienna na której pracuję,
// drugi to miejsce od którego wycinam, trzeci to koniec wycinania
echo  '</br>' . '</br>' . 'substr | wycina znaki ze string' . '</br>';
echo substr($description, 0, 7) . '</br>';


// funkcja dzieli string na oddzielne stringi ze słów
// pierszy parametr określa wedłóg czego dzielimy - często jest to spacja " "
// wyświetlam jako print_r bo powstaje tablica
echo  '</br>' . '</br>' . 'explode | dzieli string na oddzielne string' . '</br>';
print_r(explode(' ', $description));
echo '</br>';


// sprawdza długość stringa
echo  '</br>' . '</br>' . 'strlen | sprawdza długość string' . '</br>';
echo strlen($description);


/////////////////////////////////////////////////////////////////////////////////////
// 
echo "</br></br></br><h1>2 FUNKCJE MATEMATYCZNE</h1>";
// 

$x = -23;
$numbers = [21, 33, 44, 50, 59, 345];
$days = 222;

// zwraca wartość absolutną
echo  '</br>' . '</br>' . 'abs | zwraca wartość absolutną' . '</br>';
echo abs($x) . '</br>';

// zwraca najwyższą / najniższą wartość w tablicy
echo  '</br>' . '</br>' . 'max | zwraca najwyższą wartość w tablicy' . '</br>';
echo max($numbers) . '</br>';
echo  '</br>' . '</br>' . 'min | zwraca najniższą wartość w tablicy' . '</br>';
echo min($numbers) . '</br>';

// zwraca zaokrąglony do int wynik dzielenia
echo  '</br>' . '</br>' . 'intdiv | zwraca zaokrąglony do int wynik dzielenia' . '</br>';
echo intdiv($days, 30);


/////////////////////////////////////////////////////////////////////////////////////
// 
echo "</br></br></br><h1>3 FUNKCJE TABLICOWE</h1>";
// 

$products = ['buty', 'skarpety', 'koszulki', 'bluzy', 'czapki'];

// zlicza ilość elementów tablicy
echo  '</br>' . '</br>' . 'count | zlicza ilość elementów tablicy' . '</br>';
print_r(count($products));

// odwraca tablicę
echo  '</br>' . '</br>' . 'array_reverse | odwraca tablicę' . '</br>';
print_r(array_reverse($products));

// sortuje tablicę
echo  '</br>' . '</br>' . 'sort | sortuje tablicę' . '</br>';
sort($products);
foreach($products as $product) {
    echo $product . '</br>';
};

sort($products);


/////////////////////////////////////////////////////////////////////////////////////
// 
echo "</br></br></br><h1>4 FUNKCJE PLIKÓW I KATALOGÓW</h1>";
// 


// tworzy katalog 
// najpierw zaprzeczenie dla funkcji file_exist aby wykonać mkdir tylko gdy katalog jeszcze nie istnieje
echo  '</br>' . '</br>' . 'mkdir | tworzenie katalogu' . '</br>';
/*
if ( ! file_exists('my-katalog') ) {
    mkdir("C:\Users\recli\Desktop\NAUKA\PEHAP\DOJO PHP\ ");
    echo 'Utworzyłeś folder "my-katalog"';
}
else {
    echo 'Katalog "my-katalog" już istnieje';
};
*/


// tworzy plik tekstowy z treścią
echo  '</br>' . '</br>' . 'fopen | otwiera plik oraz tworzy jeśli ten nie istnieje' . '</br>';
/* 
$plik = fopen('tekstowy.txt', 'w');
$text = 'To jest zawartość pliku';
fwrite($plik, $text);
fclose($plik);
*/


/////////////////////////////////////////////////////////////////////////////////////
// 
echo "</br></br></br><h1>5 FUNKCJE ŚRODOWISKOWE PHP</h1>";
// 

// sprawdza wersję PHP
echo  '</br>' . '</br>' . 'phpversion | sprawdza wersję PHP' . '</br>';
print_r(phpversion());

// sprawdza typ zmiennej
echo  '</br>' . '</br>' . 'var_dump | sprawdza typ zmiennej' . '</br>';
echo var_dump($description);


// sprawdza szczegółowe info o środowisku PHP
echo  '</br>' . '</br>' . 'phpinfo | sprawdza szczegółowe info o środowisku PHP' . '</br>';
// print_r(phpinfo());

// pokazuje wszystkie rozszerzenia dostępne w mojej instalacji PHP
echo  '</br>' . '</br>' . 'get_loaded_extensions | pokazuje wszystkie rozszerzenia dostępne w mojej instalacji PHP' . '</br>';
print_r(get_loaded_extensions());

// sprawdza czy rozszerzenie jest dostępne w mojej instalacji PHP
echo  '</br>' . '</br>' . 'extension_loaded | sprawdza szczegółowe info o środowisku PHP' . '</br>';
print_r(extension_loaded('pdo_mysql'));


// nazwa użytkownika (systemu na którym uruchamiamy PHP)
echo  '</br>' . '</br>' . 'php_uname | nazwa systemu na którym uruchamiamy PHP' . '</br>';
echo php_uname();



/////////////////////////////////////////////////////////////////////////////////////
// 
echo "</br></br></br><h1>6 FUNKCJE DLA ZMIENNYCH</h1>";
// 

$a = 23;
$b = '7';
$c = [22, 44, 44];

// sprawdza czy zmienna jest liczbą całkowitą
echo  '</br>' . '</br>' . 'is_int | sprawdza czy zmienna jest liczbą całkowitą' . '</br>';
echo is_int($a);

// sprawdza czy zmienna jest tablicą
echo  '</br>' . '</br>' . 'is_array | sprawdza czy zmienna jest tablicą' . '</br>';
echo is_array($c);

// zwraca typ zmiennej
echo  '</br>' . '</br>' . 'gettype | zwraca typ zmiennej' . '</br>';
echo gettype($c);



// 
// funkcja isset sprawdza czy index istnieje
// 
echo  '</br>' . '</br>' . 'isset | sprawdza czy index istnieje' . '</br>';

$_GET['username'] = 'Waldek';
/*
if(isset($_GET['username'])) {
$username = $_GET['username'];
echo $username;
} else {
    echo 'Jesteś niezalogowany';
}
*/

// nowy zapis instrukcji If
$username = isset($_GET['username']) ?  $_GET['username'] : 'Jesteś niezalogowany';
echo $username;

echo "</br></br>";

// podwójny ?? działa tak samo jak funkcja isset
$_GET['username'] = 'Manolo';
$username2 = $_GET['username'] ?? 'Jesteś niezalogowany';
echo $username2;

// usuwa zmienną
echo  '</br>' . '</br>' . 'unset | usuwa zmienną' . '</br>';
unset($a);
echo $a;


// zwraca typ i wyświetla info o zmiennej
echo  '</br>' . '</br>' . 'var_dump | zwraca typ i wyświetla info o zmiennej' . '</br>';
echo var_dump($b);

?>