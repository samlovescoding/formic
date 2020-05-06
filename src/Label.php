<?php

namespace Formic;

class Label extends Component{
    public function __construct($label, $for) {
        $this->name = "label";
        $this->closed = true;
        $this->slot = $label;
        $this->setAttributes([
            "for" => $for
        ]);
    }
    public function render(){
        return $this->element();
    }
}