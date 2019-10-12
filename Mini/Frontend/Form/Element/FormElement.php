<?php

namespace Mini\Frontend\Form\Element;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
abstract class FormElement extends Block
{
    protected $label = 'Label';

    public function setLabel($label)
    {
        $this->label = $label;
    }
}