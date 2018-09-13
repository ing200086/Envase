<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 9/8/18
 * Time: 9:11 PM
 */
namespace Ing200086\GraphCore\Vertex;

interface RegisteredInterface extends UnregisteredInterface {
    public function graph();
}