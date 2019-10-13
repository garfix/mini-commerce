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

            $moduleId = Context::getDb()->getAttributeEntityId('module', 'name', $module->getFrontName());
            if (!$moduleId) {
                $moduleId = Context::getDb()->createEntity('module');
                Context::getDb()->setAttribute('module', $moduleId, 'name', $module->getFrontName());
            }

            $storedVersion = Context::getDb()->getAttributeValue('module', $moduleId, 'version');
            if (!$storedVersion) {
                $storedVersion = 0;
            }

            $codeVersion = 0;
            // go through all Setup classes
            while (true) {
                $codeVersion++;
                $class = $module->completeClassname('Setup\\Setup' . $codeVersion);
                if (class_exists($class)) {
                    if ($codeVersion > $storedVersion) {
                        $setup = new $class();
                        $setup->execute();
                        $storedVersion = $codeVersion;
                        Context::getDb()->setAttribute('module', $moduleId, 'version', $storedVersion);
                    }
                } else {
                    break;
                }
            }
        }
    }
}