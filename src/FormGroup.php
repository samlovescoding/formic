<?php

namespace Formic;

class FormGroup extends Component{
    public function __construct($id, $label = null, $type = 'text', $placeholder ="", $value = "") {
        $this->name = "div";
        $this->closed = true;
        if($label == null){
            $label = ucwords($id);
        }
        $this->label = formic_label($label, $id);
        $this->input = formic_input($id, $type, $placeholder, $value);
        $this->setAttributes([
            "class" => "form-group"
        ]);
    }

    public function setRules($rules){
        $this->input->rules = $rules;
        return $this;
    }
    public function setRule($rule){
        $this->input->rules[] = $rule;
        return $this;
    }
    public function getRules(){
        return $this->input->rules;
    }
    
    public function render(){
        $this->slot = $this->label . $this->input;
        return $this->element();
    }
}