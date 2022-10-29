<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<?php	
	if(isset($_SESSION["role"])){
		echo "<p> Jesteś zalogowany jako {$_SESSION['role']} </p>";
	}
?>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="amount">Kwota: </label>
	<input id="amount" type="text" name="amount" value="<?php print($amount ?? ""); ?>" /><br />
	<label for="years">Lata: </label>
	<input id="years" type="text" name="years" value="<?php print($years ?? ""); ?>" /><br />
	<label for="interest">Oprocentowanie: </label>
	<input id="interest" type="text" name="interest" value="<?php print($interest ?? ""); ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata: '.$result; ?>
</div>
<?php } ?>

</body>
</html>