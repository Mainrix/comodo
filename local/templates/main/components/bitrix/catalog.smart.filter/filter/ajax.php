<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die(); ?>
<?
use \Site\Main\Helper;
$APPLICATION->RestartBuffer();
unset($arResult["COMBO"]);
if ($arResult["ELEMENT_COUNT"] > 0)
	{
		$arResult["BUTTON_DISABLED"] = false;
		$arResult["BUTTON_TEXT"] = 'Показать '.$arResult["ELEMENT_COUNT"].' '.Helper::numbersWithWords($arResult["ELEMENT_COUNT"],'product');
	}
else
	{
		$arResult["BUTTON_DISABLED"] = true;
		$arResult["BUTTON_TEXT"] = 'Товары не найдены';
	}

echo CUtil::PHPToJSObject($arResult, true);
?>