<?php

class Validation {
    public function fullnameValidation($fullname) {
        if (preg_match('/^[A-žÀ-ÿš]+ [A-žÀ-ÿ]+$/', $fullname) > 0 && strlen($fullname) > 3) {
            return true;
        } else {
            return false;
        }

    }

    public function emailValidation($email) {
        if (filter_var(htmlentities($email, ENT_QUOTES), FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function passwordValidation($password) {
        if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', htmlentities($password, ENT_QUOTES)) > 0)
        {
            return true; 
        } else {
            return false;
        }
    }

}




?>