<?php

namespace Formic;

trait HasAttributes{
    public \Formic\Collection $attributes;

    public function getAttributes(){
        return $this->attributes;
    }

    public function setAttributes($attributes){
        $this->attributes = formic_collect($attributes);
        return $this;
    }

    public function setAttribute($name, $value){
        if(!isset($this->attributes)){
            $this->attributes = formic_collect();
        }
        $this->attributes->merge([$name => $value]);
        return $this;
    }

    public function generateAttributeString(){
        return $this->attributes->map(function($key, $value){
            return <<<HTML
            {$key}="{$value}"
            HTML;
        })->join(" ");
    }
}