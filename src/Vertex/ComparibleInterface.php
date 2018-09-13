<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 9/8/18
 * Time: 10:39 PM
 */

namespace Ing200086\GraphCore\Vertex;


interface ComparibleInterface {
    public function isEqualTo($subject);

    public function isSameTo(&$subject);
}