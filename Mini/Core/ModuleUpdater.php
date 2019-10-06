<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
class ModuleUpdater
{
    public function initialize()
    {
        Context::getDb()->createEntityTable('module');
        Context::getDb()->createAttributeTable('module', 'name', 'varchar(255)', false, true);
        Context::getDb()->createAttributeTable('module', 'version', 'integer', false, false);
    }

    public function update()
    {
        foreach (Context::getModules() as $module) {

            $codeVersion = $module->getVersion();
            if (!$codeVersion) {
                return;
            }

            $moduleId = Context::getDb()->getAttributeEntityId('module', 'name', $module->getFrontName());
            if (!$moduleId) {
                $moduleId = Context::getDb()->createEntity('module');
                Context::getDb()->setAttribute('module', $moduleId, 'name', $module->getFrontName());
            }

            $version = Context::getDb()->getAttributeValue('module', $moduleId, 'version');
            if (!$version) {
                $version = 0;
            }

            while ($version < $codeVersion) {
                $version++;
                $class = $module->completeClassname('Setup\\Setup' . $version);
                $setup = new $class();
                $setup->execute();
                Context::getDb()->setAttribute('module', $moduleId, 'version', $version);
            }
        }
    }
}