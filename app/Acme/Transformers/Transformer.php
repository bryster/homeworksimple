<?php 
namespace Acme\Transformers;

abstract class Transformer {

    /**
    * Transform a collection of tasks
    *
    *@param $items
    *@return array
    */

    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}