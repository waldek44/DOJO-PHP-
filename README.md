# DOJO PHP


## Podstawy
PHP to język skryptowy wykonywany po stronie serwera (server-side rendering).

Zasada działania
Przeglądarka wysyła żądanie do serwera (serwer potrzebuje interpretera aby przetworzyć żądanie), 
serwer przekazuje kod PHP z przeglądarki do interpretera PHP 
aby go wykonać (pobierając, zapisując lub modyfikując dane w db). 
Interpreter wykonuje żądanie i zwraca go do serwera w postaci gotowego dla przeglądarki pliku HTML.


### 1. ZMIENNE (deklarowanie i wyświetlanie) 

### 2. Tablice w PHP
Tablice to zmienne które wyświetlają wiele wartości

### 3. OPERATORY ARYTMETYCZNE

### 4. INSTRUKCJE WARUNKOWE

### 5. PĘTLE

### 6. FUNKCJE

### 7. OBIEKTOWE ASPEKTY PHP

### 8. FORMULARZE (projekt w folderze FORMS) 

##### 1. Żądania GET i POST

* `$_GET` i `$_POST` to superglobalne tablice zawierające żądania do przeglądarki do których można się odwołać, wyświetlą wtedy zawartość formularza w tablicy

* zmienna superglobalna `$_SERVER` to tablica w której jest między innymi nazwa własnego pliku `PHP_SELF`, dzięki temu odwołując się do niej, możemy dynamicznie wskazać na nazwę pliku w którym jesteśmy 

* W formularzu `<form>` musi być atrybut `action=" "` za jego pomocą określam jaki plik będzie się zajmował przetwarzaniem danych w formularzu). Jeżeli jest pusty to przetwarza się w tym samym pliku w którym się znajduje (plik musi być `.php` a nie `.html`). 

* 	`method=" "` zawiera jedną zmetod: GET lub POST.
* GET - dodaje wszystkie elementy formularza do paska adresu przeglądarki, nadają się tylko do formularzy wyszukiwarek
* POST - przekazuje wartości wewnętrznie, nie widać ich w adresie przeglądarki.
* w PHP każde pole `input` musi posiadać atrybut `name=" "`, ponieważ przekazuje on nazwę klucza do tablicy asocjacyjnej `$_GET` lub `$_POST`
  
##### 2. Walidacja danych

Tworzę Warunkowe komunikaty o błędach:
* w skrypcie `.php` definiuję zmienne które reprezentują komunikaty o błędach
* w formularzu dodaję span wyświetlający komunikat o błędzie. Zmienna `$errorEmail` (zdefiniowana w skrypcie `.php`) jest pusta, dopiero gdy w zmiennej `$errorEmail` pojawi się jakiś komunikat o błędzie to dzięki instrukcji if zostanie on wyświetlony tutaj
  ```
    <?php if ($errorEmail != null) { ?>
    <span class="ui red label"><?php echo $errorEmail ?></span>
    <?php } ?>
  ```

Sprawdzam czy formularz został poprawnie wysłany

* tworzę zmienne które będą reprezentować pola formularza
  ``` 
  $email = '';
  $password = '';
  $terms = '';
  ```

* Sprawdzam instrukcją if z metodą isset czy formularz został wysłany (czy użytkownik kliknął Wyślij) - odwołuję się do tablicy $_POST i sprawdzam czy znalazł się w niej przycisk Wyślij (input o name="send")
  
    ```
  if (isset($_POST['send'])) {
	// do zmiennej $email przypisuję wartość z formularza z pola input name="email", to samo password i terms
	$email = $_POST['email'];
	$password = $_POST['password'];
	$terms = $_POST['terms'];

	// waliduję: jeśli pole $email jest puste wyślij komunikat $errorEmail
	if (! $email) {
		$errorEmail = "Uzupełnij pole email";
	}
	// waliduję: jeśli pole $password jest puste wyślij komunikat $errorPassword
	if (! $password) {
		$errorPassword = "Nie utworzyłeś hasła!";
	}
	// waliduję: checkbox jeśli jest zaznaczony to przyjmuje wartość 'on', dlatego waliduję względem tej wartości
	if ($terms != 'on') {
		$errorTerms = "Zaakceptuj regulamin, zaznacz ten checkbox";
	}
	}
 	```



* Dodaję walidację długości hasła i poprawności email (można to zrobić za pomocą wyrażeń regularnych, ja robię to prostszym sposobem - przy pomocy filtrów)

* Usprawniam formularz aby zapamiętywał wartości wpisane w polu przy odświeżeniu walidacji:
  do tagów `input` dodaję atrybuty `value=""` - a wnich dynamicznie za pomocą PHP wyprowadzam wartość zmiennej tego pola ($email, $password). W przypadku checkboxa muszę dodać atrybut `check` jeżeli wartość była zaznaczona.


##### 3. Wysyłanie danych
Jeżeli dane w formularzu zostały poprawnie zwalidowane, możemy je wysłać przez email. W tym celu tworzę instrukcję warunkową która sprawdza czy wszystkie zmienne z błędami są puste. Jeśli tak jest, można wysłać email.

##### 4. Komunikat potwierdzający wysłanie danych

Za pomoca instrukcji if wyprowadzam potwierdzenie. Jeśli funkcja `mail()` wykonała się, zwraca automatycznie True do zmiennej którą reprezentuje (`$emailSent`), dlatego skorzystamy właśnie z niej.