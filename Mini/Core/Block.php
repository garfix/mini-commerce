<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
abstract class Block
{
    /**
     * @return object|$this
     */
    public static function resolve()
    {
        return Context::getBlockResolver()->resolveBlock(get_called_class());
    }

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public abstract function render(): string;
}