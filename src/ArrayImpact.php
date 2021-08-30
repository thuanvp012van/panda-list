<?php

namespace PandaCore\PandaList;

use Exception;

trait ArrayImpact {

    protected array $items;

    public function map($func, $mapItem = true)
    {
        if (is_callable($func)) {
            if($mapItem) {
                $this->items = array_map($func, $this->items);
                return $this;
            } else {
                $items = array_map($func, $this->items);
                return pandaList($items);
            }
        } else {
            throw new Exception('Variable passed in is not a function');
        }
    }

    public function filter($func, $filterItem = true) {
        if (is_callable($func)) {
            if($filterItem) {
                $this->items = array_filter($this->items, $func);
                return $this;
            } else {
                $items = array_filter($this->items, $func, ARRAY_FILTER_USE_BOTH);
                return pandaList($items);
            }
        } else {
            throw new Exception('Variable passed in is not a function');
        }
    }

    private function convertArrToObj($array) {
        return (object) $array;
    }

    public function remove(String $index)
    {
        unset($this->items[$index]);
        return $this;
    }

    public function reverse() {
        return pandaList(array_reverse($this->items));
    }

    public function unique() {
        return pandaList(array_unique($this->items, SORT_REGULAR));
    }
}