<?php
IncludeModuleLangFile(__FILE__);
use Bitrix\Main\Application;
use Bitrix\Main\IO\Directory;
use Bitrix\Main\IO\File;
class site_main extends CModule
{
    const MODULE_ID = 'site.main';
    var $MODULE_ID = 'site.main';
    var $MODULE_GROUP_RIGHTS = "Y";

    function __construct()
    {
        $arModuleVersion = array();
        include(dirname(__FILE__) . "/version.php");
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = "Главный модуль сайта";
        $this->MODULE_DESCRIPTION = "";
        $this->PARTNER_NAME = "";
        $this->PARTNER_URI = "";
    }

    function InstallDB($arParams = array())
    {
        return true;
    }

    function UnInstallDB($arParams = array())
    {
        return true;
    }

    function InstallEvents()
    {

        return true;
    }

    function UnInstallEvents()
    {

        return true;
    }

    function InstallFiles($arParams = array())
    {
        CopyDirFiles(
            __DIR__.'/admin',
            Application::getDocumentRoot().'/bitrix/admin/',
            true,
            true
        );
        return true;
    }

    function UnInstallFiles()
    {
        File::deleteFile(
            Application::getDocumentRoot().'/bitrix/admin/site_simaland_settings.php'
        );
        return true;
    }

    function GetModuleTasks()
    {
        return array();
    }

    function DoInstall()
    {
        global $APPLICATION;
        $this->InstallFiles();
        $this->InstallDB();
        $this->InstallEvents();
        $this->InstallTasks();
        RegisterModule(self::MODULE_ID);
    }

    function DoUninstall()
    {
        global $APPLICATION;
        UnRegisterModule(self::MODULE_ID);
        $this->UnInstallDB();
        $this->UnInstallFiles();
        $this->UnInstallEvents();
        $this->UnInstallTasks();
    }

}
