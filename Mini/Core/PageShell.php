<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class PageShell extends Block
{
    /**
     * @var Block
     */
    protected $mainBlock;

    public function __construct(Block $mainBlock)
    {
        $this->mainBlock = $mainBlock;
    }

    public function getChildren(): array
    {
        return [
            Header::class,
            Menu::class,
            $this->mainBlock
        ];
    }

    public function render(): string
    {
        return "
            <html>
                <head>
                " . Header::resolve()->render() . " 
                </head>
                <body>
                " . Menu::resolve()->render() . "
                " . $this->mainBlock->render() . "
                </body>
            </html>        
        ";
    }
}