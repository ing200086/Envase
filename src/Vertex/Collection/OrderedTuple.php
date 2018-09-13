<?php


namespace Ing200086\GraphCore\Vertex\Collection;


use Ing200086\GraphCore\Exception\InvalidArgumentException;

class OrderedTuple {
    protected $items;

    protected function __construct(array $items)
    {
        if (count($items) <> 2)
        {
            throw new InvalidArgumentException('Tuple can only be made with 2 items.');
        }

        $this->items = $items;
    }

    public function getItem(int $index = 0)
    {
        return $this->items[$index];
    }

    public function reversed()
    {
        return self::FromArray(array_reverse($this->items));
    }

    public static function Create(... $items)
    {
        return new self($items);
    }

    public static function FromArray(array $items)
    {
        return new self($items);
    }
}