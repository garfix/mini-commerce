<?php

namespace Mini\Core;

use Mini\Core\Api\Logger;

/**
 * @author Patrick van Bergen
 */
class Context
{
    /** @var Context */
    private static $currentContext = null;

    /** @var ServiceResolver */
    protected $serviceResolver;

    /** @var BlockResolver */
    protected $blockResolver;

    /** @var array */
    protected $modules;

    /** @var Request */
    protected $request;

    /** @var Db */
    protected $db;

    /** @var Logger */
    protected $logger;

    public static function setCurrentContext(Context $context = null)
    {
        self::$currentContext = $context;
    }

    public static function getCurrentContext(): Context
    {
        return self::$currentContext;
    }

    /**
     * Context constructor.
     */
    public function __construct(
        ServiceResolver $serviceResolver,
        BlockResolver $blockResolver,
        array $modules,
        Request $request,
        Db $db,
        Logger $logger
    )
    {
        $this->db = $db;
        $this->logger = $logger;
        $this->request = $request;
        $this->modules = $modules;
        $this->serviceResolver = $serviceResolver;
        $this->blockResolver = $blockResolver;
    }

    /**
     * @param $className
     * @return ServiceResolver
     */
    public static function getServiceResolver(): ServiceResolver
    {
        return self::$currentContext->serviceResolver;
    }

    public static function getBlockResolver(): BlockResolver
    {
        return self::$currentContext->blockResolver;
    }

    /**
     * @return BasicModule[]
     */
    public static function getModules(): array
    {
        return self::$currentContext->modules;
    }

    public static function getDb(): Db
    {
        return self::$currentContext->db;
    }

    public static function getLogger(): Logger
    {
        return self::$currentContext->logger;
    }

    public static function getRequest(): Request
    {
        return self::$currentContext->request;
    }
}