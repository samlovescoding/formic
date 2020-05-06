<?php

namespace Formic;

class Message extends Component{
    public function __construct($message, $messageColor) {
        $this->name = "div";
        $this->closed = true;
        $this->slot = $message;
        $this->setAttributes([
            "class" => "alert alert-" . $messageColor
        ]);
    }
    public function render(){
        return $this->element();
    }
}