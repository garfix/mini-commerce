<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class BlockResolver
{
    /** @var string[][] */
    protected $decorators = [];

    /** @var Block[] */
    protected $resolvedBlocks = [];

    /**
     * BlockResolver constructor.
     * @param Module[] $modules
     */
    public function __construct(array $modules)
    {
        foreach ($modules as $module) {
            foreach ($module->getBlockDecorators() as $original => $decorator) {
                $this->decorators[$original][] = $decorator;
            }
        }
    }

    public function resolveBlock(string $blockClass)
    {
        return $this->getOuterBlock($blockClass);
    }

    /**
     * @return Block[]
     */
    public function getResolvedBlocks(): array
    {
        return $this->resolvedBlocks;
    }

    protected function getOuterBlock($blockClass)
    {
        $block = new $blockClass();

        if (array_key_exists($blockClass, $this->decorators)) {
            foreach ($this->decorators[$blockClass] as $decorator) {
                $block = new $decorator($block);
            }
        }

        $this->resolvedBlocks[$blockClass] = $block;

        return $block;
    }
}