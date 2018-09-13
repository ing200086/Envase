<?php

namespace Ing200086\GraphCore\Container\Generic;

interface InterfaceOpenContainer extends InterfaceClosedContainer {
    public function add(string $key, $item);

    public function remove(string $id);
}