<?php

require_once 'app/helper/Config.php';
$conf = new app\helper\Config();
include dirname(__FILE__).'/config.php'; //ustaw konfigurację

function &getConf(){ global $conf; return $conf; }

require_once 'app/core/Messages.php';
$msgs = new app\core\Messages();

function &getMessages(){ global $msgs; return $msgs; }

//przygotuj Twig, twórz tylko raz - wtedy kiedy potrzeba
$twig = null;	
function &getTwig(){
	global $twig;
	if (!isset($twig)){
        require_once getConf()->root_path.'/lib/Twig/Autoloader.php';
        
        Twig_Autoloader::register();
        //załaduj szablony (wskazanie folderów z potrzebnymi szablonami)
        $loader = new Twig_Loader_Filesystem(getConf()->root_path.'/templates'); //szablon ogólny
        $loader->addPath(getConf()->root_path.'/app/view'); //szablon strony kalkulatora
        //skonfiguruj folder cache
        $twig = new Twig_Environment($loader, array(
            'cache' => getConf()->root_path.'/twig_cache',
        ));
	}
	return $twig;
}

require_once 'app/core/ClassLoader.php'; //załaduj i stwórz loader klas
$cloader = new app\core\ClassLoader();
function &getLoader() {
    global $cloader;
    return $cloader;
}

require_once getConf()->root_path.'/app/core/functions.php';
session_start(); //uruchom lub kontynuuj sesję
$conf->roles = isset($_SESSION['_roles']) ? unserialize($_SESSION['_roles']) : array(); //wczytaj role
$action = getFromRequest('action');
