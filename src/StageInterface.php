<?php
/**
 * @author debuss-a
 */

namespace Pipeliner;

/**
 * Interface StageInterface
 * @package Pipeliner
 */
interface StageInterface
{

    /**
     * @param mixed $payload
     * @param PipelineInterface $pipeline
     * @return mixed
     */
    public function process($payload, PipelineInterface $pipeline);
}
