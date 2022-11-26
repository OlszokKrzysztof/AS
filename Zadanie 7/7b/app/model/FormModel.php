<?php

namespace app\model;

class FormModel {
    public function getPostData()
    {
        return [
            'amount' => $_REQUEST ['amount'] ?? "",
            'years' => $_REQUEST ['years'] ?? "",
            'interest' => $_REQUEST ['interest'] ?? "",
        ];
    }

    public function checkErrors(): array
    {
        $postData = $this->getPostData();
        // var_dump ($_POST);
        // exit;
        $messages = [];

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if ( $postData['amount'] == "") {
            $messages [] = 'Nie podano kwoty';
        }

        if ( $postData['years'] == "") {
            $messages [] = 'Nie podano liczby lat';
        }

        if ( $postData['interest'] == "") {
            $messages [] = 'Nie podano oprocentowania';
        }

        //nie ma sensu walidować dalej gdy brak parametrów
        if (empty( $messages )) {

            // sprawdzenie, czy $x i $y są liczbami całkowitymi
            if (! is_numeric( $postData['amount'] )) {
                $messages [] = 'Kwota nie jest liczbą całkowitą';
            }

            if (! is_numeric( $postData['years'] )) {
                $messages [] = 'Lata nie jest liczbą całkowitą';
            }

            if (! is_numeric( $postData['interest'] )) {
                $messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
            }
        }

        return $messages;
    }

    public function isValid(): bool
    {
        return count($this->checkErrors()) == 0;
    }
}