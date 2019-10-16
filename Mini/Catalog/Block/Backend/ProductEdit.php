<?php

namespace Mini\Catalog\Block\Backend;

use Mini\Catalog\i18n\CatalogTranslator;
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
    public function renderStyleTag()
    {
    }

    public function render()
    {
        $t = CatalogTranslator::resolve();

        $nameValue = Context::getDb()->getAttributeValue('product', ProductPageContext::getProductId(), 'name');
        $priceValue = Context::getDb()->getAttributeValue('product', ProductPageContext::getProductId(), 'price');

        $form = Form::resolve();

        $form->add($section = FormSection::resolve());
            $section->add($name = InputText::resolve());
                $name->setLabel($t::name);
                $name->setName("Name");
                $name->setValue($nameValue);
            $section->add($price = InputText::resolve());
                $price->setLabel($t::price);
                $price->setName("Price");
                $price->setValue($priceValue);
            $section->add($submit = InputSubmit::resolve());
                $submit->setLabel('Save');

        $form->render();
    }
}