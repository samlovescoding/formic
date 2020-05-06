<?php

namespace Formic;

abstract class Component {
    
    use HasAttributes;

    protected $name;
    protected $slot = "";
    public $closed = false;

    public function setClass($class){
        if($this->attributes->has("class")){
            $oldClass = $this->attributes->get("class") . " ";
            $this->attributes->set("class", $oldClass . $class);
        }else{
            $this->attributes->set("class", $class);
        }
        return $this;
    }
    public function getClass(){
        if($this->attributes->has("class")){
            return $this->attributes->get("class");
        }else{
            return null;
        }
    }

    public function element() {
        if($this->closed){
            return "<{$this->name} {$this->generateAttributeString()}>{$this->slot}</{$this->name}>";
        } else {
            return "<{$this->name} {$this->generateAttributeString()} />";
        }
    }

    public function render() {
        return $this->element();
    }

    public function __toString() {
        return $this->render();
    }
    
}