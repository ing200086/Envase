<?php

namespace Ing200086\GraphCore\Interfaces;

interface ValueContainerInterface extends ClosedContainerInterface {
    public function add(string $key, $item);

    public function remove(string $id);
}