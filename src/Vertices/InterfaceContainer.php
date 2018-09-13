<?php

namespace Ing200086\GraphCore\Vertices;

use Ing200086\GraphCore\Container\Generic\InterfaceClosedContainer;
use Ing200086\GraphCore\Vertex\UnregisteredInterface;

interface InterfaceContainer extends InterfaceClosedContainer {
    public function add(UnregisteredInterface &$entity);

    public function remove(string $id);
}