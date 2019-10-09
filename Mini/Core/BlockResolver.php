<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class BlockResolver
{
    /** @var string[][] */
    protected $wrappers = [];

    /** @var Block[] */
    protected $resolvedBlocks = [];

    /**
     * BlockResolver constructor.
     * @param Module[] $modules
     */
    public function __construct(array $modules)
    {
        foreach ($modules as $module) {
            foreach ($module->getBlockWrappers() as $original => $wrapper) {
                $this->wrappers[$original][] = $wrapper;
            }
        }
    }

    public function resolveBlock(string $blockClass)
    {
        if (array_key_exists($blockClass, $this->resolvedBlocks)) {
            return $this->resolvedBlocks[$blockClass];
        } else {
            return $this->getOuterBlock($blockClass);
        }
    }

    protected function getOuterBlock($blockClass)
    {
        $block = new $blockClass();

        if (array_key_exists($blockClass, $this->wrappers)) {
            foreach ($this->wrappers[$blockClass] as $wrapper) {
                $block = new $wrapper($block);
            }
        }

        $this->resolvedBlocks[$blockClass] = $block;

        return $block;
    }
}