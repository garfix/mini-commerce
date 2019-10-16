<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Site
{
    /** @var string  */
    protected $code;

    protected $translatorClasses = [];

    public function __construct(string $code)
    {
        $this->code = $code;
    }

    public function getLocale()
    {
        return 'de_DE';
    }

    public function getTranslator(string $class): Translator
    {
        if (!array_key_exists($class, $this->translatorClasses)) {
            $locale = Context::getSite()->getLocale();

            $translatorClass = $class . '_' . $locale;

            $this->translatorClasses[$class] = new $translatorClass();
        }

        return $this->translatorClasses[$class];

    }
}