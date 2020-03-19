<?php
/**
 * @author debuss-a
 */

namespace Pipeliner;

/**
 * Interface PipelineInterface
 * @package Pipeliner
 */
interface PipelineInterface
{

    /**
     * @param mixed $payload
     * @return mixed
     */
    public function handle($payload);
}
