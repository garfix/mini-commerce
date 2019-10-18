<?php

namespace Mini\Backend\Block;

use Mini\Core\Block;

/**
 * @author Patrick van Bergen
 */
class GridAction extends Block
{
    protected $url = '';

    protected $label = '';

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return $this
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
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

    }
}