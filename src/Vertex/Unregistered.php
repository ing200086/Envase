<?php

namespace Ing200086\GraphCore\Vertex;

use Ing200086\GraphCore\Exception\InvalidArgumentException;

class Unregistered implements UnregisteredInterface {
    protected $_id;

    public function __construct($id)
    {
        $this->setId($id);
    }

    public function getId() : string
    {
        return $this->_id;
    }

    protected function setId($_id)
    {
        if ( ! $this->isValidId($_id) )
        {
            throw new InvalidArgumentException('Vertex ID has to be of type integer or string');
        }

        $this->_id = $_id;
    }

    public function isEqualTo($subject)
    {
        return ($this == $subject);
    }

    public function isSameTo(&$subject)
    {
        return ($this === $subject);
    }

    protected function validateForComparison($subject)
    {
        if ( ! is_a($subject, get_class($this)) )
        {
            throw new InvalidArgumentException('Comparison invalid - subject must be instance of ' . get_class($this) . '.');
        }
    }

    protected function isValidId($id)
    {
        return is_int($id) || is_string($id);
    }
}
