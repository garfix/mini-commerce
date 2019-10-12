<?php

namespace Mini\Frontend\Form;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class Form extends Block
{
    protected $sections = [];

    public function add(FormSection $section)
    {
        $this->sections[] = $section;
        return $section;
    }

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render()
    {
        ?>
        <form>
            <?php foreach ($this->sections as $section): ?>
            <?= $section->render() ?>
            <?php endforeach; ?>
        </form>
        <?php
    }
}