<?php

namespace Mini\Frontend\Form\Element;

/**
 * @author Patrick van Bergen
 */
class InputText extends FormElement
{

    /**
     * @param string[] $childBlocks
     * @return string
     */
    public function render()
    {
        ?>
        <label>
            <?= htmlspecialchars($this->label) ?>:
            <input type="text">
        </label>
        <?php
    }
}