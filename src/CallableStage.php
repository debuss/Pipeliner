<?php
/**
 * @author debuss-a
 */

namespace Pipeliner;

/**
 * Class CallableStage
 * @package Pipeliner
 */
class CallableStage implements StageInterface
{

    /** @var callable */
    protected $callable;

    /**
     * CallableStage constructor.
     * @param callable $callable
     */
    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    /**
     * @inheritDoc
     */
    public function process($payload, PipelineInterface $pipeline)
    {
        return $pipeline->handle(call_user_func($this->callable, $payload));
    }
}
