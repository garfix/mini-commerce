<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class Db
{
    /** @var  \PDO */
    protected $pdo;

    public function __construct($dbName, $dbHost, $username, $password)
    {
        $this->pdo = new \PDO("mysql:dbname={$dbName};host={$dbHost}", $username, $password);
    }

    public function createAttribute(string $entityType, string $attributeCode, string $dataType, bool $multipleValues, bool $createValueIndex)
    {
        if ($multipleValues) {
            $entityKey = "KEY entity_id";
        } else {
            $entityKey = "PRIMARY KEY entity_id";
        }

        if ($createValueIndex) {
            $valueKey = ", KEY value";
        } else {
            $valueKey = "";
        }

        $this->pdo->query("CREATE TABLE {$entityType}_{$attributeCode} (
            entity_id unsigned int NOT NULL,
            value {$dataType} NOT NULL
            FOREIGN KEY entity_id REFERENCES {$entityType} entity_id ON DELETE CASCADE,
            {$entityKey}
            {$valueKey}
        )");
    }
}