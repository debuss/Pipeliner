<?php
/**
 * @author debuss-a
 */

namespace Pipeliner;

use InvalidArgumentException;
use SplStack;

/**
 * Class Pipeline
 * @package Pipeliner
 */
class Pipeline implements PipelineInterface
{

    /** @var SplStack */
    protected $stack;

    /**
     * Pipeline constructor.
     */
    public function __construct()
    {
        $this->stack = new SplStack();
    }

    /**
     * @param StageInterface|callable
     * @return Pipeline
     */
    public function pipe($stage): PipelineInterface
    {
        if (is_callable($stage)) {
            $stage = new CallableStage($stage);
        }

        if (!$stage instanceof StageInterface) {
            throw new InvalidArgumentException(
                'Stage must be a callable or an instance of StageInterface.'
            );
        }

        $this->stack->push($stage);

        return $this;
    }

    /**
     * @param mixed $payload
     * @return mixed
     */
    public function handle($payload)
    {
        if ($this->stack->isEmpty()) {
            return $payload;
        }

        return $this->stack->shift()->process($payload, $this);
    }
}
