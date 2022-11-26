<?php

use app\controller\CalcController;

// Skrypt kontrolera głównego uruchamiający określoną
// akcję użytkownika na podstawie przekazanego parametru

//każdy punkt wejścia aplikacji (skrypt uruchamiany bezpośrednio przez klienta) musi dołączać konfigurację
global $conf;

//1. pobierz nazwę akcji

$action = $_REQUEST['action'] ??"";

//2. wykonanie akcji
switch ($action) {
	default : // 'calcView'
	    // załaduj definicję kontrolera
		include_once $conf->root_path.'/check.php';
		include_once $conf->root_path.'/app/controller/CalcController.php';

		// utwórz obiekt i uzyj
		$ctrl = new CalcController ();
		$ctrl->render ();
	break;
	case 'calcCompute' :
		// załaduj definicję kontrolera
		include_once $conf->root_path.'/check.php';
		include_once $conf->root_path.'/app/controller/CalcController.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcController ();
		$ctrl->process ();
	break;
	case 'action1' :
		// zrób coś innego ...
	break;
	case 'action2' :
		// zrób coś innego ...
	break;
	case 'login': // akcja PUBLICZNA - brak check.php
		$ctrl = new app\controller\LoginCtrl();
		$ctrl->doLogin();
	break;
}
