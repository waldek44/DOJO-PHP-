<?php

//
// TABLICE 
//


// 1
echo "<h1>1 stary sposób zapisywania tablic</h1>";
// 1

$x = array('Symfony', 'Zend', 'Larva');
// tablice wyświetlamy za pomocą funkcji print_r
print_r($x);
echo "</br></br>";


// 2
echo "<h1>2 nowy sposób zapisywania tablic
</h1>";
// 2

$y = ['Symfony5', 'Zend100', 'Larva8'];
// dodaję czwarty element do tablicy
$y[] = 'Cake PHP';
print_r($y);
echo "</br></br>";

// 3
echo "<h1>3 pobieram z tablicy wartość po indeksie</h1>";
// 3

echo "Najlepsze jest " . $y[0];
echo "</br></br> </br>";



//
// TABLICE ASOCJACYJNE (skojarzeniowe - każda wartość ma swój klucz) 
//

// 4
echo "<h1>4 Tablica asocjacyjna</h1>";
// 4
$z = [
    'id' => 1, 
    'tytuł' => 'kurs', 
    'autor' => 'ja sam'
];
$z['wiek'] = '42'; // dodanie kolejnej wartośći do tablicy
print_r($z);
echo "</br></br>";
echo "Pobierana wartość o kluczu 'autor' - " . $z['autor']; //pobieram z tablicy wartość po kluczu


?>