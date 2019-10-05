<?php

namespace Mini\Core;

use Mini\Core\Db;
use Mini\Core\Logger;

/**
 * @author Patrick van Bergen
 */
class Context
{
    /** @var Context */
    private static $currentContext = null;

    /**
     * @var Db
     */
    protected $db;
    /**
     * @var Logger
     */
    protected $logger;

    public static function setCurrentContext(Context $context)
    {
        self::$currentContext = $context;
    }

    public static function getCurrentContext(): Context
    {
        if (self::$currentContext === null) {
            self::$currentContext = new Context(new Db(), new Logger());
        }

        return self::$currentContext;
    }

    /**
     * Context constructor.
     */
    public function __construct(
        Db $db,
        Logger $logger
    )
    {
        $this->db = $db;
        $this->logger = $logger;
    }

    public function getDb()
    {
        return $this->db;
    }

    public function getLogger(): Logger
    {
        return $this->logger;
    }
}