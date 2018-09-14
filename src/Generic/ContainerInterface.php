<?php

namespace Ing200086\GraphCore\Generic;

use Ing200086\GraphCore\ClosedContainerInterface;

interface ContainerInterface extends ClosedContainerInterface {
    public function add(string $key, $item);

    public function remove(string $id);
}