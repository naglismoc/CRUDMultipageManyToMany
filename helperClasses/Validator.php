<?php

class Validator{


public static function validate()
{
    $hasErrors = false;     

    if($_POST['title'] == ""){
        $_SESSION['errors'][] = "Modelis privalo būti nurodytas";
        $hasErrors = true;
    }
    if($_POST['beeCount'] == ""){
        $_SESSION['errors'][] = "Nurodykite kiek avilyje bičių";
        $hasErrors = true;
    }
    if($_POST['year'] == ""){
        $_SESSION['errors'][] = "Nurodykite kelintais metais buvo pagamintas avilys";
        $hasErrors = true;
    }
    if(!is_numeric($_POST['year'])){
        $_SESSION['errors'][] = "Metai turi būti skaičiaus formatas. Pvz 1990";
        $hasErrors = true;
    }


    if($hasErrors){
        foreach ($_POST as $key => $value) {
            $_SESSION['POST'][$key] = $value;
        }
    }

    return $hasErrors;
}











}

?>