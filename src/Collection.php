<?php

namespace Formic;

class Collection{
    
    protected $array;

    public function __construct(array $array = []) {
        $this->array = $array;
    }

    public function has($key){
        return isset($this->array[$key]);
    }

    public function get($key){
        return $this->array[$key];
    }
    public function set($key, $value){
        $this->array[$key] = $value;
    }

    public function keys(){
        return array_keys($this->array);
    }

    public function values(){
        return array_values($this->array);
    }

    public function map(\Closure $with){
        return new Collection(array_map($with, $this->keys(), $this->values()));
    }

    public function merge(array $with){
        $this->array = array_merge($this->array, $with);
    }

    public function join(){
        return implode(" ", $this->array);
    }

    public function toArray(){
        return $this->array;
    }

    public function remove_null(){
        foreach ($this->array as $index => $value) {
            if($value==null){
                unset($this->array[$index]);
            }
        }
        return $this;
    }
}