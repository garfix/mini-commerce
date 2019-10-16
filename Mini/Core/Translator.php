<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Translator
{
    /**
     * @return $this
     */
    public static function resolve() {

        return Context::getSite()->getTranslator(static::class);
    }
}