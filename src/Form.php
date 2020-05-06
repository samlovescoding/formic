<?php

namespace Formic;

class Form extends Component{

    use HasAttributes;
    
    protected $method;
    protected $inputs;
    public $closed = true;
    public $slot;
    
    public function __construct($method = "POST", $inputs = []){
        $this->name = "form";
        $this->method = $method;
        $this->inputs = formic_collect($inputs);
        $this->attributes = formic_collect([
            "method" => "POST"
        ]);
        $this->slot = $this->inputs->map(function($id, $input){
            return $input->render();
        })->join();
    }

    public function onSubmit(\Closure $onSuccess, \Closure $onError){
        if(strtolower($_SERVER["REQUEST_METHOD"]) == strtolower($this->method)){
            if(isset($_REQUEST["formic_submit"])){
                try {
                    $validatedData = formic_validate($_REQUEST, $this->inputs->map(function($id, $input){
                        if($input instanceof FormGroup){
                            return [$input->input->id => $input->input->rules];
                        }
                        if(!$input->id == "formic_submit")
                        return [$input->id => $input->rules];
                    }))->validatedData;
                    $onSuccess($validatedData, $this);
                } catch (ValidationException $ve) {
                    $error = $ve->getMessage();
                    $onError($error, $this);
                }
                    
                
            }
        }
        return $this;
    }
}