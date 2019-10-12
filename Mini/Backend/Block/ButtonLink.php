<?php

namespace Mini\Backend\Block;

use Mini\Core\Api\Link;
use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class ButtonLink extends Block
{
    protected $link;

    protected $label;

    public function setLink(string $link): ButtonLink
    {
        $this->link = $link;
        return $this;
    }

    public function setLabel(string $label): ButtonLink
    {
        $this->label = $label;
        return $this;
    }

    public function renderStyleTag()
    {
        ?>
        <style>
            .button {
                border: 1px solid black;
                display: inline-block;
                padding: 3px;
            }
        </style>
        <?php
    }

    /**
     * @return void
     */
    public function render()
    {
        ?>
        <div class="button"><a href="<?= htmlspecialchars($this->link) ?>">Add product</a></div>
        <?php
    }
}