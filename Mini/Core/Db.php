<?php

namespace Mini\Core;

use PDO;

/**
 * @author Patrick van Bergen
 */
class Db
{
    /** @var  PDO */
    protected $pdo;

    public function __construct($dbName, $dbHost, $username, $password)
    {
        $this->pdo = new PDO("mysql:dbname={$dbName};host={$dbHost}", $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function createEntityTable(string $entityType)
    {
        $this->pdo->query("CREATE TABLE IF NOT EXISTS {$entityType} (
            entity_id int NOT NULL AUTO_INCREMENT,
            PRIMARY KEY(entity_id)
        )");
    }


    public function createAttributeTable(string $entityType, string $attributeCode, string $dataType, bool $multipleValues, bool $createValueIndex)
    {
        if ($multipleValues) {
            $entityKey = "KEY(entity_id)";
        } else {
            $entityKey = "PRIMARY KEY(entity_id)";
        }

        if ($createValueIndex) {
            $valueKey = ", KEY(value)";
        } else {
            $valueKey = "";
        }

        $this->pdo->query("CREATE TABLE IF NOT EXISTS {$entityType}_{$attributeCode} (
            entity_id int NOT NULL,
            value {$dataType} NOT NULL,
            FOREIGN KEY (entity_id) REFERENCES {$entityType} (entity_id) ON DELETE CASCADE,
            {$entityKey}
            {$valueKey}
        )");
    }

    public function getAttributeValue(string $entityType, int $entityId, string $attributeCode)
    {
        $query = "SELECT value FROM {$entityType}_{$attributeCode} WHERE entity_id = ?";
        $st = $this->pdo->prepare($query);
        $st->execute([
            $entityId
        ]);
        $column = $st->fetchColumn(0);
        return $column === false ? null : $column;
    }

    public function getAttributeEntityId(string $entityType, string $attributeCode, $value)
    {
        $query = "SELECT entity_id FROM {$entityType}_{$attributeCode} WHERE value = ?";
        $st = $this->pdo->prepare($query);
        $st->execute([
            $value
        ]);
        $column = $st->fetchColumn(0);
        return $column === false ? null : $column;
    }

    public function createEntity(string $entityType): int
    {
        $query = "INSERT INTO {$entityType} SET entity_id = 0";
        $st = $this->pdo->prepare($query);
        $st->execute([]);
        return $this->pdo->lastInsertId();
    }

    public function setAttribute(string $entityType, int $entityId, string $attributeCode, $value)
    {
        $query = "INSERT INTO {$entityType}_{$attributeCode} SET entity_id = ?, value = ? ON DUPLICATE KEY UPDATE value = VALUES(value)";
        $st = $this->pdo->prepare($query);
        $st->execute([
            $entityId,
            $value
        ]);
    }

    public function getEntityIds(string $entityType): array
    {
        $query = "SELECT entity_id FROM {$entityType}";
        $st = $this->pdo->prepare($query);
        $st->execute([]);
        return $st->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getAttributeValues(string $entityType, string $attributeCode): array
    {

    }
}