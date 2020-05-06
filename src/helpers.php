<?php


/*
 * Formic Component Helpers
 * 
 * These provide easy instances of Formic Component Library
*/

function formic_redirect($redirect){
    header("Content-Location:" . $redirect);
}

function formic($method = "post", $inputs){
    return new Formic\Form($method, $inputs);
}

function formic_group($id, $label=null, $type = 'text', $placeholder ="", $value = ""){
    return new Formic\FormGroup($id, $label, $type, $placeholder, $value);
}

function formic_input($id, $type = 'text', $placeholder ="", $value = "", $rules = []){
    return new Formic\Input($id, $type, $placeholder, $value, $rules);
}

function formic_collect($array = []){
    return new Formic\Collection($array);
}

function formic_label($label, $for){
    return new Formic\Label($label, $for);
}

function formic_submit($text){
    return formic_input("formic_submit", "submit", "", $text)->setAttribute("class", "btn btn-primary");
}

function formic_message($message, $colorCode){
    return new Formic\Message($message, $colorCode);
}

function formic_validate($array, $rules){
    return new Formic\Validator($array, $rules);
}


/*
*  Form Validation Helpers
* 
*  These methods will allow easy and common types of form validations.
*/

function is_required($value, $key=""){
    $key = ucwords($key);
    if($value == null){
        throw new Formic\ValidationException("$key is a required field.");
        return false;
    }
    return true;
}

function is_alpha($value, $key=""){
    $key = ucwords($key);
    if(!ctype_alpha($value)){
        throw new Formic\ValidationException("$key is not alphabets only.");
        return false;
    }
    return true;
}

function is_alpha_num($value, $key=""){
    $key = ucwords($key);
    if(!ctype_alnum($value)){
        throw new Formic\ValidationException("$key is not alphabets and numbers only.");
        return false;
    }
    return true;
}

function is_email($value, $key=""){
    $key = ucwords($key);
    $key = ucwords($key);
    if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
        throw new Formic\ValidationException("$key is not a valid email");
        return false;
    }
    return true;
}

function is_ip($value, $key=""){
    $key = ucwords($key);
    if(!filter_var($value, FILTER_VALIDATE_IP)){
        throw new Formic\ValidationException("$key is not a valid IP address.");
        return false;
    }
    return true;
}

function is_number($value, $key=""){
    $key = ucwords($key);
    if(!filter_var($value, FILTER_VALIDATE_INT)){
        throw new Formic\ValidationException("$key is not a number");
        return false;
    }
    return true;
}