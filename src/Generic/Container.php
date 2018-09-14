<?php

namespace Ing200086\GraphCore\Generic;

use Ing200086\GraphCore\BaseContainer;

class Container extends BaseContainer implements ContainerInterface {
    public function add(string $key, $item)
    {
        $this->_add($key, $item);
    }

    /**
     * @param string $id
     * @throws \Exception
     */
    public function remove($id)
    {
        $this->_remove($id);
    }
}