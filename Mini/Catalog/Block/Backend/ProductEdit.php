<?php

namespace Mini\Catalog\Block\Backend;

use Mini\Catalog\ProductPageContext;
use Mini\Core\Block;
use Mini\Core\Context;
use Mini\Frontend\Form\Element\InputSubmit;
use Mini\Frontend\Form\Element\InputText;
use Mini\Frontend\Form\Form;
use Mini\Frontend\Form\FormSection;

/**
 * @author Patrick van Bergen
 */
class ProductEdit extends Block
{
    public function render()
    {
        $nameValue = Context::getDb()->getAttributeValue('product', ProductPageContext::getProductId(), 'name');

        $form = Form::resolve();

        $form->add($section = FormSection::resolve());
            $section->add($name = InputText::resolve());
                $name->setLabel("Name");
                $name->setName("name");
                $name->setValue($nameValue);
            $section->add($submit = InputSubmit::resolve());
                $submit->setLabel('Save');

        echo $form->render();
    }
}