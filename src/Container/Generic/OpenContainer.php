<?php

namespace Ing200086\GraphCore\Container\Generic;

class OpenContainer extends ClosedContainer implements InterfaceOpenContainer {
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