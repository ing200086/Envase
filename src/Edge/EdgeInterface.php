<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 9/9/18
 * Time: 10:41 AM
 */
namespace Ing200086\GraphCore\Edge;

use Ing200086\GraphCore\Vertex\UnregisteredInterface as VertexInterface;

interface EdgeInterface {
    public static function CreateUnbiased(VertexInterface $start, VertexInterface $end);

    public static function CreateFromTo(VertexInterface $start, VertexInterface $end);

    public static function CreateToFrom(VertexInterface $start, VertexInterface $end);

    public static function Create(VertexInterface $start, VertexInterface $end);

    public function contains(VertexInterface $vertex);

    public function providesEntryTo(VertexInterface $vertex);

    public function providesExitTo(VertexInterface $vertex);
}