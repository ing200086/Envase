<?php

namespace Ing200086\Envase\Interfaces;

interface ValueContainerInterface extends CoreContainerInterface {
    public function add(string $key, $item);

    public function remove(string $id);
}