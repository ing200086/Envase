<?php

namespace Ing200086\GraphCore\Exception;

use Ing200086\GraphCore\Walk;
use Ing200086\GraphCore;

class NegativeCycleException extends UnexpectedValueException implements Graph\Exception
{
    /**
     * instance of the cycle
     *
     * @var Walk
     */
    private $cycle;

    public function __construct($message, $code = NULL, $previous = NULL, Walk $cycle)
    {
        parent::__construct($message, $code, $previous);
        $this->cycle = $cycle;
    }

    /**
     *
     * @return Walk
     */
    public function getCycle()
    {
        return $this->cycle;
    }
}
