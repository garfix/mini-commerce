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
     * @return void
     */
    public function renderStyleTag()
    {

    }

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render()
    {
        ?>
        <section>
            <?php foreach ($this->elements as $element): ?>
                <div>
                <?= $element->render() ?>
                </div>
            <?php endforeach; ?>
        </section>
        <?php
    }
}