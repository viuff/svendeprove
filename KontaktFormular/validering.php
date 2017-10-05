<?php

    $fornavn = $_POST['fornavn'];
    $efternavn = $_POST['efternavn'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $besked = $_POST['besked'];

    $fejlbeskeder = array();

    if ($fornavn == ""){
        
        $error_fornavn = true;
        $fejlbeskeder['tomt_fornavn'] = "Navn skal udfyldes!";

    } else {

        if (is_numeric($fornavn)){

            $error_fornavn = true;
            $fejlbeskeder['tal_fornavn'] = "Navnet kan ikke indeholde tal!";
            
        }

    }
    
    if ($efternavn == ""){
        
        $error_efternavn = true;
        $fejlbeskeder['tomt_efternavn'] = "Navn skal udfyldes!";

    } else {

        if (is_numeric($efternavn)){

            $error_efternavn = true;
            $fejlbeskeder['tal_efternavn'] = "Navnet kan ikke indeholde tal!";
            
        }

    }

    if($email == ""){

        $error_email = true;
        $fejlbeskeder['tomt_emailfelt'] = "Der skal angives en E-Mail adresse!";

    } else {

        if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)){

            $error_email = true;
            $fejlbeskeder['invalid_email'] = "Den indtastet E-Mail adresse blev ikke godkendt!";

        }

    }

    if($telefon == ""){

        $error_telefon = true;
        $fejlbeskeder['tomt_telefon'] = "Der skal angives et telefon nummer!";

    } else {

        if(strlen($telefon) < 8 && !is_numeric($telefon)){

            $error_telefon = true;
            $fejlbeskeder['min_tegn_only_numbers'] = "Telefonnummeret skal indeholde 8 tegn, som alle er tal!";

        } if(!preg_match("/^[0-9]+$/", $telefon)){

            $error_telefon = true;
            $fejlbeskeder['otte_tegn_not_numbers'] = "Telefonnummeret må kun indeholde tal!";

        } if(strlen($telefon) < 8 && is_numeric($telefon)){

            $error_telefon = true;
            $fejlbeskeder['min_tegn'] = "Telefonnummeret skal indeholde 8 tegn!";
            
        }

    }

    if($besked == ""){

            $error_besked = true;
            $fejlbeskeder['tom_besked'] = "Dette felt skal udfyldes!";
    }

?>
