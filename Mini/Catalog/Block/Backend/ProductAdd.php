<?php

namespace Mini\Catalog\Block\Backend;

use Mini\Core\Block;
use Mini\Frontend\Form\Element\InputText;
use Mini\Frontend\Form\Form;
use Mini\Frontend\Form\FormSection;

/**
 * @author Patrick van Bergen
 */
class ProductAdd extends Block
{

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render()
    {
        $form = Form::resolve();

        $form->add($section = FormSection::resolve());
        $section->add($name = InputText::resolve());
            $name->setLabel("Name");

        echo $form->render();
    }
}