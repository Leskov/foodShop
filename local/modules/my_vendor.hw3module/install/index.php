<?php

use Bitrix\Main\Application;
use Bitrix\Main\DB\Connection;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Security\Random;
use my_vendor\hw3module\Orm\LectionTable;
use my_vendor\hw3module\Helper\Iblock;

Loc::LoadMessages(__FILE__);

class my_vendor_hw3module extends CModule
{
    public $MODULE_ID = 'my_vendor.hw3module';

    public function __construct()
    {
        $this->MODULE_NAME = Loc::getMessage('MY_VENDOR_HW3MODULE_NAME');
        $this->MODULE_DESCRIPTION = loc::getMessage('MY_VENDOR_HW3MODULE_DESCRIPTION');
        $this->PARTNER_NAME = loc::getMessage('MY_VENDOR_HW3MODULE_PARTNER_NAME');
        $this->PARTNER_URI = loc::getMessage('MY_VENDOR_HW3MODULE_PARTNER_URI');
    }

    public function DoInstall()
    {
        try {
            $this->InstallFiles();
            //$this->InstallDB();
            $this->InstallEvents();

            RegisterModule($this->MODULE_ID);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function InstallFiles()
    {
        CopyDirFiles(__DIR__ . '/bitrix/components/', getenv('DOCUMENT_ROOT') . '/bitrix/components/', true, true);
    }

    public function DoUninstall()
    {
        $this->UnInstallFiles();
        $this->UnInstallDB();
        $this->UnInstallEvents();

        UnRegisterModule($this->MODULE_ID);

    }

    public function UnInstallFiles()
    {
        DeleteDirFilesEx('/bitrix/components/my_vendor/elements.list/');
    }

    public function InstallEvents()
    {
        $eventManager = \Bitrix\Main\EventManager::getInstance();
        $eventManager->registerEventHandlerCompatible("main", "OnBeforeProlog", $this->MODULE_ID);
        AddEventHandler("iblock", "OnBeforeIBlockElementAdd", "UpdateSymbolCode");
        AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "UpdateSymbolCode");
    }

    public function UnInstallEvents()
    {
        $eventManager = \Bitrix\Main\EventManager::getInstance();
        $eventManager->unRegisterEventHandler("main", "OnBeforeProlog", $this->MODULE_ID);
    }

    public function InstallDB()
    {
        $connection = Application::getConnection();
        if (!$connection->isTableExists(LectionTable::getTableName())) {
            LectionTable::getEntity()->createDbTable();
        }
    }

    public function UnInstallDB()
    {
//        $connection = \Bitrix\Main\Application::getConnection();
//        if(!$connection->isTableExists(LectionTable::getTableName())){
//
//        }
    }



}

