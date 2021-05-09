<?php


// 
echo "<h1>1 PĘTLA WHILE
</h1>";
// wykonuje warunek dopóki spełniony jest warunek
// 

$i = 10;
while($i <=22) {
    $i++;
    echo $i . '</br>';
}


// 
echo "<h1>2 PĘTLA WHILE alternatywna składnia
</h1>";
// alternatywna składnia while (: i endwhile) | podobnie mogę dla for (: i endfor)
// 

$j = 30;
while($j <=37) :
    $j++;
    echo $j . '</br>';
endwhile;


// 
echo "<h1>3 DO WHILE
</h1>";
// wykonuje warunek dopóki spełniony jest warunek,
// podobno do WHILE tylko warunek dodajemy na końcu, 
// dzięki temu najpierw wykonamy przejście przez pierwszy index i dopiero wykona warunek
// więc nawet jeśli warunek nie jest spełniony to pętla jeden raz się wykona
// 

$i = 10;
do {
    $i++;
    echo $i . '</br>';
} while($i <=22);


// 
echo "<h1>4 OPERACJE NA PĘTLI
</h1>";
// break, continue
//

$i = 10;
while($i <=22) {
    $i++;
    echo $i . '</br>';

if($i == 16) {
    break;
}
};

$i = 10;
while($i <=22) {
    $i++;
if($i % 2) {
continue;
}
echo $i . '</br>';
};



// 
echo "<h1>5 PĘTLA FOR
</h1>";
//

for( $i = 0; $i <= 10; $i++ ) {   // trzeci warunek określa co ile pętla ma iterować, np co czwarty indeks: $i += 4 
    echo $i . '</br>';
}


// 
echo "<h1>6 PĘTLA FOREACH </h1>";
// dobra, żeby wyprowadzić do HTML zbiór wartości z tablicy
// pętlę wyświetlam w HTML poniżej
 
$frameworks = ['Symfony', 'Larwa', 'Zend'];
$features = [
    'id' => '23',
    'price' => 239.99,
    'category' => 'sport',
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Frameworki PHP</h1>
    <p>wyprowadzam z tablicy pętlą foreach</p>
    <ul>
    <?php
        foreach( $frameworks as $framework) {   // $framework pojedyńcza wartość z tablicy
            echo "<li>$framework</li>";
        }
    ?>
    </ul>

    <h1>cechy produktu</h1>
    <p>wyprowadzam z tablicy asocjacyjnej pętlą foreach</p>
    <ul>
    <?php
        foreach( $features as $key => $value) {   // foreach( $features as $key => $value)
            echo "<li>$key produktu to $value</li>";
        }
    ?>
    </ul>
</body>
</html>