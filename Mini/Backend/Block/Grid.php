<?php

namespace Mini\Backend\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class Grid extends Block
{
    protected $columns = [];

    protected $values = [];

    /** @var GridAction[] */
    protected $actions = [];

    /**
     * @param array $columnNames
     * @return $this
     */
    public function setColumns(array $columnNames)
    {
        $this->columns = $columnNames;
        return $this;
    }

    /**
     * @param array $values
     * @return $this
     */
    public function setValues(array $values)
    {
        $this->values = $values;
        return $this;
    }

    /**
     * @param array $actions
     * @return $this
     */
    public function setActions(array $actions)
    {
        $this->actions = $actions;
        return $this;
    }

    /**
     * @return void
     */
    public function renderStyleTag()
    {
        ?>
        <style>
            .grid td {
                padding: 3px;
            }
            .grid thead td {
                background-color: aquamarine;
            }
            .grid tbody td {
                background-color: antiquewhite;
            }
            .grid tbody td a {
                display: inline-block;
                width: 100%;
            }
            .grid td {
                border-top: 1px solid gray;
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
        <table class="grid">
            <thead>
            <?php foreach ($this->columns as $id => $label): ?>
                <td><?= htmlspecialchars($label) ?></td>
            <?php endforeach ?>
            </thead>
            <tbody>
            <?php foreach ($this->values as $rowIndex => $row): ?>
                <?php
                    $url = null;
                    if (isset($this->actions[$rowIndex])) {
                        $url = $this->actions[$rowIndex] ? reset($this->actions[$rowIndex])->getUrl() : null;
                    } ?>
                <tr>
                    <?php foreach ($this->columns as $id => $label): ?>
                    <td>
                        <?php if ($id === 'actions'): ?>
                            <?php if (isset($this->actions[$rowIndex])): ?>
                                <?php foreach ($this->actions[$rowIndex] as $action): ?>
                                    <a href="<?= $action->getUrl() ?>">
                                        <?= htmlspecialchars($action->getLabel()) ?>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if ($url): ?><a href="<?= $url ?>"><?php endif ?>
                            <?= isset($row[$id]) ? htmlspecialchars($row[$id]) : '' ?>
                            <?php if ($url): ?></a><?php endif ?>
                        <?php endif ?>
                    </td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        <?php
    }
}