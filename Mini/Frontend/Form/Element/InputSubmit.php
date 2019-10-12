<?php

namespace Mini\Frontend\Form\Element;

/**
 * @author Patrick van Bergen
 */
class InputSubmit extends FormElement
{
    /**
     * @return void
     */
    public function renderStyleTag()
    {

    }

    /**
     * @return void
     */
    public function render()
    {
        ?>
        <input type="submit" value="<?= htmlspecialchars($this->label) ?>">
        <?php
    }
}