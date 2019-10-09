<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class BlockWrapper extends Block
{
    /**
     * @var Block
     */
    protected $innerBlock;

    public function __construct(Block $innerBlock)
    {
        $this->innerBlock = $innerBlock;
    }

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render(): string
    {
        return $this->innerBlock->render();
    }
}