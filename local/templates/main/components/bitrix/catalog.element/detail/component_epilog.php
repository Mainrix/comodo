<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $templateData
 * @var array $arParams
 * @var string $templateFolder
 * @global CMain $APPLICATION
 */

global $APPLICATION,$arParamDetail;
 $arParamDetail = [
	"ID"=>$arResult["ID"],
	"SECTION_ID"=>$arResult["SECTION"]["ID"],
	"BRAND"=>$arResult['PROPERTIES']['BRAND']['VALUE'],
];
