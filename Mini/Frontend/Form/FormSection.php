<?php

namespace Mini\Frontend\Form;

use Mini\Core\Block;
use Mini\Frontend\Form\Element\FormElement;

/**
 * @author Patrick van Bergen
 */
class FormSection extends Block
{
    protected $elements = [];

    public function add(FormElement $element)
    {
        $this->elements[] = $element;
        return $element;
    }

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render()
    {
        ?>
        <form>
            <?php foreach ($this->elements as $element): ?>
                <?= $element->render() ?>
            <?php endforeach; ?>
        </form>
        <?php
    }
}