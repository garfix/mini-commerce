<?php

namespace Mini\Frontend\Form\Element;

/**
 * @author Patrick van Bergen
 */
class InputText extends FormElement
{
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
        <label>
            <?= htmlspecialchars($this->label) ?>:
            <input type="text" name="<?= htmlspecialchars($this->name) ?>" value="<?= htmlspecialchars($this->value) ?>">
        </label>
        <?php
    }
}