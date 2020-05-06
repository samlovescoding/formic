<?php

namespace Formic;


class Validator{
    public $validatedData;

    public function __construct($array, $rules) {
        
        $validatedRequest = [];
        foreach ($rules->remove_null()->toArray() as $rule) {
            foreach ($rule as $key => $tests) {
                
                    $validatedRequest[$key] = $array[$key];
                

                foreach ($tests as $test) {
                    if($test == "is_unwanted"){
                        unset($validatedRequest[$key]);
                    }elseif(!$test($array[$key], $key)){
                        unset($validatedRequest[$key]);
                    }
                }
            }
        }

        $this->validatedData = $validatedRequest;
    }
    public function onSuccess(){}
    public function onError(){}
}

