<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów
include _ROOT_PATH.'/app/security/check.php';

$amount = $_REQUEST ['amount'] ?? "";
$years = $_REQUEST ['years'] ?? "";
$interest = $_REQUEST ['interest'] ?? "";

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

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';