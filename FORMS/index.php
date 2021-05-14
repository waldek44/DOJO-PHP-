<?php
error_reporting (E_ALL ^ E_NOTICE);  // dzięki temu nie rziga mi errora o Undefined Index
// $_GET i $_POST to superglobalne tablice zawierające żądania do przeglądarki do których można się odwołać,
// wyświetlą wtedy zawartość formularza w tablicy
print_r($_GET);
echo "</br>";
print_r($_POST);


// 1
// definiuję zmienne które reprezentują komunikaty o błędach
$errorEmail = '';
$errorPassword = '';
$errorTerms = '';

// 2
// w formularzu html wyświetlam komunikat o błędzie (nad każdym inputem w form za pomocą instrukcji if)

// 3
// tworzę zmienne które będą reprezentować pola formularza
$email = '';
$password = '';
$terms = '';

// 4
/* 
Sprawdzam instrukcją if (i metodą isset) czy formularz został wysłany (czy użytkownik kliknął Wyślij - odwołuję się do tablicy 
$_POST i sprawdzam czy znalazł się w niej przycisk Wyślij (input o name="send")).

Jeśli tak to do zmiennych reprezentujących pola formularza przypisuję wartości od użytkownika
*/ 

if (isset($_POST['send'])) {
	// do zmiennej $email przypisuję wartość z formularza z pola input name="email", to samo password i terms
	$email = $_POST['email'];
	$password = $_POST['password'];
	$terms = $_POST['terms'];

	// 5 | waliduję: jeśli pole $email jest puste wyślij komunikat $errorEmail
	if (! $email) {
		$errorEmail = "Uzupełnij pole email";
	}
	// 7 | jeśli $email istnieje i jeśli jest poprawnie wpisany (zgodnie z filtrem FILTER_VALIDATE_EMAIL)
	// funkcja filter_var() -filtruje zmienną. Parametr 1 to zmienna którą filtrujemy, użyty filtr
	// FILTER_VALIDATE_EMAIL wbudowany filtr PHP który sprawdza poprawność email
	elseif ($email && ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errorEmail = 'Nieprawidłowy format email';
	}

	// 5 | waliduję: jeśli pole $password jest puste wyślij komunikat $errorPassword
	if (! $password) {
		$errorPassword = "Nie utworzyłeś hasła!";
	} 
	// 6 | jeśli $password istnieje i string hasła jest mniejszy niż 6 znaków
	elseif ($password && strlen($password) < 6) {
		$errorPassword = 'Hasło musi zawierać minimum 6 znaków';
	}

	// 5 | waliduję: checkbox jeśli jest zaznaczony to przyjmuje wartość 'on', dlatego waliduję względem tej wartości
	if ($terms != 'on') {
		$errorTerms = "Zaakceptuj regulamin, zaznacz ten checkbox";
	}

/*
wysyłanie emaila
*/

// sprawdzam czy wszystkie zmienne z błędami są puste i wysyłam za pomocą funkcji PHP mail
if (! $errorEmail && ! $errorPassword && ! $errorTerms) {
	$to = 'waldek@waldek.pl';
	$subject = 'Rejestracja u Waldka';
	$message = 'Przykładowa treść';
	$emailSent = mail($to, $subject, $message); // zmienna sprawdzająca czy email jest wysłany

}

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Title</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/uikit.min.css" />
	<script src="js/uikit.min.js"></script>
	<script src="js/uikit-icons.min.js"></script>
</head>
<body>
	<div class="uk-container uk-margin-top">
		<div class="uk-card uk-card-default uk-card-body uk-width-3-4@m uk-margin-top uk-align-center uk-background-secondary uk-light uk-padding">
			<h3 class="uk-card-title uk-text-warning">Formularz kontaktowy</h3>
			<ul class="uk-list uk-list-bullet">
				<li>1 | definiuję zmienne które reprezentują komunikaty o błędach</li>
				<li>2 | Komunikat o błędzie wyświetlam nad każdym inputem w form za pomocą instrukcji if</li>
				<li>3 | tworzę zmienne które będą reprezentować pola formularza</li>
				<li>4 | Sprawdzam instrukcją if (i metodą isset) czy formularz został wysłany.
				Jeśli tak to do zmiennych reprezentujących pola formularza przypisuję wartości z formularza z pola input (wartość name="").  </li>
				<li>5 | Instrukcje if - zmieniam wartości w zmiennych które reprezentują komunikaty o błędach</li>
				<li>6 | Walidacja długości hasła - dodaję else do instrukcji if w walidacji $password</li>
				<li>7 | Walidacja poprawności Email - dodaję else do instrukcji if w walidacji $email</li>
				<li>8 | Usprawniam formularz aby zapamiętywał wartości wpisane w polu przy odświeżeniu walidacji</li>

			</ul>
			<hr>


			<!-- 
				action=""
			za jego pomocą określam jaki plik będzie się zajmował przetwarzaniem danych w formularzu). 
			Jeżeli jest pusty to przetwarza się w tym samym pliku w którym się znajduje (plik musi być .php a nie .html). 
			-->

			<!-- 
				zmienna superglobalna $_SERVER 
				to tablica w której jest między innymi nazwa własnego pliku PHP_SELF, dzięki temu 
				odwołując się do niej, możemy dynamicznie wskazać na nazwę pliku w którym jesteśmy 
			-->

			<!-- 
				method="post"
				Metody GET i POST
				GET - dodaje wszystkie elementy formularza do paska adresu przeglądarki, nadają się tylko do formularzy wyszukiwarek
				POST - przekazuje wartości wewnętrznie, nie widać ich w adresie.
			-->

			<!-- 
				name=""
				w PHP każde pole input musi posiadać atrybut "name", ponieważ przekazuje on nazwę klucza do tablicy asocjacyjnej GET/POST
			-->


			<!-- FORMULARZ -->
			<!-- FORMULARZ -->
			<!-- FORMULARZ -->
			<form class="uk-form-stacked" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<?php if( $emailSent == 1) { ?>
					<p class="uk-text-lead uk-text-success">Super! Wysłałeś formularz na mój email.</p>
				<?php 
				} else {
					echo 'Wysyłanie formularza nie powiodło się.';
				}
				 ?>

				<!-- EMAIL -->
				<label class="uk-form-label uk-margin-large-top" for="form-stacked-text">Email (login)</label>
				<div class="uk-form-controls">
					<input name="email" id="email" class="uk-input" type="text" value="<?php echo $email; ?>" placeholder="Some text...">
					<!-- 2 | zmienna $errorEmail jest pusta, dopiero gdy w zmiennej $errorEmail pojawi się jakiś 
					komunikat o błędzie to dzięki instrukcji if zostanie on wyświetlony tutaj  -->
					<?php if ($errorEmail != null) { ?>
						<p class="uk-text-danger uk-margin-small"><?php echo $errorEmail ?></p>
					<?php } ?>
				</div>
				<!-- EMAIL -->

				<!-- Hasło -->
				<label class="uk-form-label uk-margin-small-top" for="form-stacked-select">Hasło</label>
				<div class="uk-form-controls">
					<input name="password" id="password" class="uk-input" type="text" value="<?php echo $password; ?>" placeholder="Napisz Hasło...">
					<?php if ($errorPassword != null) { ?>
						<p class="uk-text-danger uk-margin-small"><?php echo $errorPassword ?></p>
					<?php } ?>
				</div>
				<!-- Hasło -->

				<!-- terms -->
				<div class="uk-form-controls uk-margin-medium-top">
					<label><input class="uk-checkbox" type="checkbox" name="terms" <?php echo (isset($_POST['terms']) ? 'checked="checked"' : ''); ?> > Akceptuję Regulamin</label>
					<?php if ($errorTerms != null) { ?>
								<p class="uk-text-danger uk-margin-small"><?php echo $errorTerms ?></p>
					<?php } ?>
				</div>
				<!-- terms -->

				<!-- button -->				
				<button type="submit" id="send" name="send" class="uk-button uk-button-default uk-button-small uk-margin-medium-top">Wyślij</button>
				<!-- button -->	

			</form>
			<!-- FORMULARZ -->
			<!-- FORMULARZ -->
			<!-- FORMULARZ -->
		</div>
	</div>
</body>
</html>