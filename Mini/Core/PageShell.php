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

    public function render(): string
    {
        $html = "
            <html>
                <head>
                " . Header::resolve()->render() . " 
                </head>
                <body>
                    " . Menu::resolve()->render() . "
                    " . $this->mainBlock->render() . "<ul>";

                    for ($i = 0; $i < 5; $i++) {
                        $html .= "<li>" . $i . "</li>";
                    }

        $html .= "
                    </ul>
                </body>
            </html>        
        ";

        return $html;
    }
}