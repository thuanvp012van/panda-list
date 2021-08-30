<?php

namespace PandaCore\PandaList;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

class PandaList implements IteratorAggregate
{
    use ArrayImpact;

    protected array $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Render items when foreach class
     */
    public function getIterator(): Traversable
    {
        return $this->convertArrToObj(
            new ArrayIterator($this->items)
        );
    }

    /**
     * Get items
     */
    public function getItems()
    {
        return $this->convertArrToObj($this->items);
    }

    public function toArray() {
        return $this->items;
    }

    /**
     * Add items
     * @param string $items
     */
    public function addItems(Array $items)
    {
        $this->items = array_merge($this->items, $items);
        return $this;
    }

    public function first($func = null) {
        if($func === null) {
            return $this->getFirstArray($this->items);
        } elseif (is_callable($func)) {
            $array = array();
            $array = $this->filter($func, false);
            return $this->getFirstArray($array->toArray());
        }
    }

    private function getFirstArray(Array $array) {
        return array_shift($array);
    }

    public function count() {
        return count($this->items);
    }

    public function each($func) {
        if(is_callable($func)) {
            foreach ($this->items as $key => $item) {
                $func($key, $item);
            }
        }
    }

    public function get($index) {
        return $this->items[$index];
    }

    public function isEmpty() {
        return empty($this->items);
    }

    public function toJson() {
        // Updating coming soon
    }

    public function __toString() {
        return var_export($this->items, true);
    }

    public function dd() {
        dd($this->convertArrToObj($this->items));
    }
}
