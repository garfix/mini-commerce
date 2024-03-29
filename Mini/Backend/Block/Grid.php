<?php

namespace Mini\Backend\Block;

use Mini\Core\Api\Link;
use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class Grid extends Block
{
    protected $id = null;

    protected $columns = [];

    protected $values = [];

    /** @var GridAction[][] */
    protected $actions = [];

    protected $pageNumber = 0;

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

    public function setPageNumber(int $number)
    {
        $this->pageNumber = $number;
        return $this;
    }

    public function getAjaxData(): array
    {
        $data = [];

        $data['values'] = $this->values;
        $data['columns'] = array_keys($this->columns);

        $actions = [];

        foreach ($this->actions as $row) {
            $rowActions = [];
            foreach ($row as $action) {
                $rowActions[] = [
                    'label' => $action->getLabel(),
                    'url' => $action->getUrl()
                ];
            }
            $actions[] = $rowActions;
        }

        $data['actions'] = $actions;

        return $data;
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
            .grid-next {

            }
        </style>
        <?php
    }

    /**
     * @return void
     */
    public function render()
    {
        $gridId = $this->id ?: uniqid('grid');
        $gridUrl = Link::resolve()->create('page=backend/grid/update&class=' . urlencode(get_class($this))) . '&pageNumber=' . $this->pageNumber;

        ?>
        <div class="grid" id="<?= $gridId ?>">
            <script>
                initGrid('<?= $gridId ?>', '<?= $gridUrl ?>');
            </script>
            <table>
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
            <div class="grid-next">Next page</div>
        </div>
        <?php
    }

    /**
     * @return string[]
     */
    public function listJS()
    {
        return ['Mini/Backend/js/grid.js'];
    }
}