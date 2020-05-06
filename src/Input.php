<?php

namespace Formic;

class Input extends Component{

    public $id;
    protected $name;
    protected $type;
    protected $placeholder;
    protected $value;
    public $rules;

    public function setRules($rules){
        $this->rules = $rules;
        return $this;
    }
    public function setRule($rule){
        $this->rules[] = $rule;
        return $this;
    }
    public function getRules(){
        return $this->rules;
    }

    public function __construct($id, $type = 'text', $placeholder ="", $value = "", $rules) {
        $this->id = $id;
        $this->name = "input";
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->rules = $rules;

        if(isset($_REQUEST[$this->id])){
            $this->value = $_REQUEST[$this->id];
        }

        $this->setAttributes([
            "id" => $this->id,
            "name" => $this->id,
            "type" => $this->type,
            "placeholder" => $this->placeholder,
            "value" => $this->value,
            "class" => "form-control bg-danger-2"
        ]);
    }

}