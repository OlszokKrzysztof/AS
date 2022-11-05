<?php

class CalcController
{
    private $config;

    public function __construct()
    {
        global $conf;
        include $conf->root_path.'/app/security/check.php';
   }

   private function generateViewData(): array
   {
    global $conf;
       require_once $conf->root_path.'/app/model/FormModel.php';

       $formModel = new FormModel();

       //konwersja parametrów na int
       
       if ($formModel->isValid()) {
           $postData = $formModel->getPostData();
    
           $amount = intval($postData['amount']);
           $years = intval($postData['years']);
           $interest = intval($postData['interest']);
    
           $additionalAmount = $amount * $interest / 100 * $years;
           $result = ($amount + $additionalAmount) / 12 / $years;
       }
       
       $messages = $formModel->checkErrors();

       return [
           'amount' => $amount ?? null,
           'years' => $years ?? null,
           'interest' => $interest ?? null,
           'result' => $result ?? null,
           'messages' => $messages ?? null,
       ];
   }

    public function render(): void
    {
        global $conf;
        require_once $conf->root_path.'/lib/Twig/Autoloader.php';

        $viewData = $this->generateViewData();
        // var_dump ($viewData);
        // exit;

        Twig_Autoloader::register();
        //załaduj szablony (wskazanie folderów z potrzebnymi szablonami)
        $loader = new Twig_Loader_Filesystem($conf->root_path.'/templates'); //szablon ogólny
        $loader->addPath($conf->root_path.'/app/view'); //szablon strony kalkulatora
        //skonfiguruj folder cache
        $twig = new Twig_Environment($loader, array(
            'cache' => $conf->root_path.'/twig_cache',
        ));

        $variables = array(
            '_APP_URL' => $conf->app_url,
            '_ROOT_PATH' => $conf->root_path,
            'page_title' => 'Przykład 04',
            'page_description' => 'Profesjonalne szablonowanie oparte na bibliotece Twig',
            'page_header' => 'Szablony Smarty',
            'result' => $viewData['result'],
            'messages' => $viewData['messages'],
            'amount' => $viewData['amount'],
            'years'	=> $viewData['years'],
            'interest' => $viewData['interest']
        );

        echo $twig->render('calc_view.html', $variables);

        exit;
    }
}