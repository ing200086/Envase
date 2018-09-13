<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 9/10/18
 * Time: 6:36 AM
 */

namespace Ing200086\GraphCore\Container\Generic;

interface InterfaceClosedContainer extends InterfaceBaseContainer {
    public function hasThatMatches(callable $closure) : bool;
}