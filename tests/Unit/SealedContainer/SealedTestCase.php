<?php

namespace Ing200086\Envase\Tests\Unit\SealedContainer;

use Ing200086\Envase\SealedContainer;
use Ing200086\Envase\Tests\Unit\TestCase;

class SealedTestCase extends TestCase {
    protected function setUp()
    {
        parent::setUp();
        $this->_container = SealedContainer::FromArray($this->_entities);
    }

    protected function mock(int $id)
    {
        return strval($id);
    }
}