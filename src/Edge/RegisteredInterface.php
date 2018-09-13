<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 9/9/18
 * Time: 10:41 AM
 */
namespace Ing200086\GraphCore\Edge;

use Ing200086\GraphCore\Vertex\RegisteredInterface as VertexInterface;

interface RegisteredInterface {
    public static function CreateDirectionless(VertexInterface $start, VertexInterface $end);

    public static function CreateDirectedFromTo(VertexInterface $start, VertexInterface $end);

    public static function CreateDirectedToFrom(VertexInterface $start, VertexInterface $end);

    public static function Create(VertexInterface $start, VertexInterface $end);

    public function graph();

    public function contains(VertexInterface $vertex);

    public function providesEntryTo(VertexInterface $vertex);

    public function providesExitTo(VertexInterface $vertex);
}