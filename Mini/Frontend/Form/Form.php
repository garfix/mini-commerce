<?php

namespace Mini\Frontend\Form;

use Mini\Core\Block;
use Mini\Core\Context;

/**
 * @author Patrick van Bergen
 */
class Form extends Block
{
    protected $sections = [];

    protected $action = null;

    public function __construct(Block $inner = null)
    {
        parent::__construct($inner);

        $this->action = Context::getRequest()->getRequestUri();
    }

    public function add(FormSection $section)
    {
        $this->sections[] = $section;
        return $section;
    }

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
        <form action="<?= htmlspecialchars($this->action) ?>" method="post">
            <?php foreach ($this->sections as $section): ?>
            <?= $section->render() ?>
            <?php endforeach; ?>
        </form>
        <?php
    }
}