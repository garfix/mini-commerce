<?php

namespace Mini\Core\Api;

use Mini\Backend\Block\BackendShell;
use Mini\Core\Block;
use Mini\Core\Context;
use Mini\Core\Service;
use ReflectionClass;

/**
 * @author Patrick van Bergen
 */
class PageBuilder extends Service
{
    public function buildPage(Block $shell, Block $main): string
    {
        $isBackend = $shell instanceof BackendShell;
        $shellContents = $this->getContents($shell);
        $mainContents = $this->getContents($main);
        $style = $this->getStyle();
        $externalScripts = $this->getExternalScripts($isBackend);
        list($mainContents, $internalScripts) = $this->extractInternalScripts($mainContents);

        $contents = preg_replace('/##main##/', $mainContents, $shellContents);
        $contents = preg_replace('/##style##/', $style, $contents);
        $contents = preg_replace('/##script##/', $externalScripts . $internalScripts, $contents);
        return $contents;
    }

    protected function getStyle()
    {
        ob_start();

        foreach (Context::getBlockResolver()->getResolvedBlocks() as $block) {
            $block->renderStyleTag();
        }

        $style = ob_get_contents();
        ob_end_clean();

        return $style;
    }

    protected function getExternalScripts(bool $isBackend)
    {
        $scripts = "";

        $visited = [];

#todo: versioning tag

        foreach (Context::getBlockResolver()->getResolvedBlocks() as $block) {
            foreach ($block->listJS() as $script) {

                // add each script only once
                if (array_key_exists($script, $visited)) {
                    continue;
                }
                $visited[$script] = true;

                // backend and frontend scripts are located elsewhere
                if ($isBackend) {
                    $publicPath = __DIR__ . '/../../../private/' . $script;
                } else {
                    $publicPath = __DIR__ . '/../../../public/' . $script;
                }

                // quick check if public location exists
                if (!file_exists($publicPath)) {

                    // symlink to public location
                    $privatePath = null;
                    $reflection = new ReflectionClass($block);
                    if (preg_match('#^(.*)/Block/#', $reflection->getFileName(), $matches)) {
                        $privatePath = $matches[1] . '/js/' . basename($script);
                        $publicDir = dirname($publicPath);

                        if (!file_exists($publicDir)) {
                            mkdir($publicDir, 0777, true);
                        }
                        symlink($privatePath, $publicPath);
                    } else {
                        die('Javascript file resolver: block not in Block dir: ' . $reflection->getFileName());
                    }
                }
                $scripts .= "<script src='$script'></script>";
            }
        }

        return $scripts;
    }

    protected function getContents(Block $block)
    {
        ob_start();
        $block->render();
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }

    protected function extractInternalScripts($contents)
    {
        $scripts = '';
        $newContents = preg_replace_callback('#<script>.*?</script>#s', function($match) use (&$scripts) {
            $scripts .= $match[0];
            return '';
        }, $contents);

        return [$newContents, $scripts];
    }
}