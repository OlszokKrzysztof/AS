<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//załaduj Twig
require_once _ROOT_PATH.'/lib/Twig/Autoloader.php';

// 1. pobranie parametrów
include _ROOT_PATH.'/app/security/check.php';

$amount = $_REQUEST ['amount'] ?? "";
$years = $_REQUEST ['years'] ?? "";
$interest = $_REQUEST ['interest'] ?? "";
$messages = [];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($amount) && isset($years) && isset($interest))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $amount == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $years == "") {
	$messages [] = 'Nie podano liczby lat';
}
if ( $interest == "") {
	$messages [] = 'Nie podano oprocentowania';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $amount )) {
		$messages [] = 'Kwota nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $years )) {
		$messages [] = 'Lata nie jest liczbą całkowitą';
	}	

	if (! is_numeric( $interest )) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}	

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$amount = intval($amount);
	$years = intval($years);
	$interest = intval($interest);

	$additionalAmount = $amount * $interest / 100 * $years;
	$result = ($amount + $additionalAmount) / 12 / $years;

}

// 4. Przygotowanie szablonu i zmiennych

//start Twig
Twig_Autoloader::register();
//załaduj szablony (wskazanie folderów z potrzebnymi szablonami)
$loader = new Twig_Loader_Filesystem(_ROOT_PATH.'/templates'); //szablon ogólny
$loader->addPath(_ROOT_PATH.'/app'); //szablon strony kalkulatora
//skonfiguruj folder cache
$twig = new Twig_Environment($loader, array(
    'cache' => _ROOT_PATH.'/twig_cache',
));

//przygotowanie zmiennych dla szablonu
$variables = array(
	'_APP_URL' => _APP_URL,
	'_ROOT_PATH' => _ROOT_PATH,
	'page_title' => 'Przykład 04',
	'page_description' => 'Profesjonalne szablonowanie oparte na bibliotece Twig',
	'page_header' => 'Szablony Smarty',
	'result' => $result ??null,
	'messages' => $messages,
	'amount' => $amount,
	'years'	=> $years,
	'interest' => $interest
);

// 5. Wywołanie szablonu (wygenerowanie widoku)
echo $twig->render('calc_view.html', $variables);