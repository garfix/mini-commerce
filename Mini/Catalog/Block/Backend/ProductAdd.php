<?php

namespace Mini\Catalog\Block\Backend;

use Mini\Catalog\Lang\CatalogTranslator;
use Mini\Core\Block;
use Mini\Frontend\Form\Element\InputSubmit;
use Mini\Frontend\Form\Element\InputText;
use Mini\Frontend\Form\Form;
use Mini\Frontend\Form\FormSection;

/**
 * @author Patrick van Bergen
 */
class ProductAdd extends Block
{
    public function renderStyleTag()
    {
    }

    public function render()
    {
        $t = CatalogTranslator::resolve();

        $form = Form::resolve();

        $form->add($section = FormSection::resolve());
            $section->add($name = InputText::resolve());
                $name->setLabel("Name");
                $name->setName($t::name);
                $name->setRequired();
            $section->add($price = InputText::resolve());
                $price->setLabel($t::price);
                $price->setName("price");
            $section->add($submit = InputSubmit::resolve());
                $submit->setLabel('Save');

        $form->render();
    }
}