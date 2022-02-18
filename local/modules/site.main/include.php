<?php
define('IBLOCK_NEWS_ID',1);
\Bitrix\Main\Loader::includeModule('iblock');
\Bitrix\Main\Loader::includeModule('highloadblock');
CModule::AddAutoloadClasses('site.main', []);
\Bitrix\Main\UI\Extension::load('ui.vue');
\Bitrix\Main\UI\Extension::load("ui.vue.vuex");