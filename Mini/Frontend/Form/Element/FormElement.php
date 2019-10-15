<?php

namespace Mini\Frontend\Form\Element;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
abstract class FormElement extends Block
{
    protected $label = 'Label';
    protected $name = 'name';
    protected $value = '';
    protected $required = false;

    public function setLabel(string $label)
    {
        $this->label = $label;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setValue(string $value)
    {
        $this->value = $value;
    }

    public function setRequired(bool $required = true)
    {
        $this->required = $required;
    }
}