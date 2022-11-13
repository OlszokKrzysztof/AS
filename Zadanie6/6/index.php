<?php
//  var_dump ($_POST);
//  exit;
//przekierowanie przeglądarki klienta (redirect)
//header("Location: "._APP_URL."/app/calc_view.php");

//przekazanie żądania do następnego dokumentu ("forward")



require_once 'app/helper/Config.php';

$conf = new Config();

$conf->root_path = dirname(__FILE__);
$conf->server_name = 'localhost:80';
$conf->server_url = 'http://'.$conf->server_name;
$conf->app_root = '/AS/Zadanie6/6/';
$conf->app_url = $conf->server_url.$conf->app_root;
include $conf->root_path.'/app/controller/core.php';