<?php

namespace SomeCompany\SomeModule\Block;

use Mini\Frontend\Form\Element\InputText;

/**
 * @author Patrick van Bergen
 */
class InputTextDecorator extends InputText
{
    public function render()
    {
        $this->innerBlock->render();
        ?>(<?= $this->label ?>)<?php
        ?>y<?php
    }
}