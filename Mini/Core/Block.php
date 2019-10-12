<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
abstract class Block
{
    /**
     * @var Block
     */
    public $innerBlock;

    public function __construct(Block $inner = null)
    {
        if ($inner) {
            foreach ($inner as $key => $value) {
                if ($key === 'innerBlock') continue;
                $this->$key = &$inner->$key;
            }
        }

        $this->innerBlock = $inner;
    }

    /**
     * @return object|$this
     */
    public static function resolve()
    {
        return Context::getBlockResolver()->resolveBlock(get_called_class());
    }

    /**
     * @return void
     */
    public abstract function render();
}