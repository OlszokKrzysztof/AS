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
       $twig = getTwig();
 
        $variables = array(
            '_APP_URL' => $conf->app_url,
            '_ROOT_PATH' => $conf->root_path,
            'page_title' => 'Przykład 04',
            'page_description' => 'Profesjonalne szablonowanie oparte na bibliotece Twig',
            'page_header' => 'Szablony Smarty',
            'conf' => $conf,
        );

        echo $twig->render('calc_view.html', $variables);

        exit;
    }

    public function process(): void
    {
        global $conf;
       $twig = getTwig();

       $viewData = $this->generateViewData();
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
            'interest' => $viewData['interest'],
            'conf' => $conf,
        );

        echo $twig->render('calc_view.html', $variables);

        exit;
    }
}