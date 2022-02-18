<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
$arResult['PROPERTIES']['BRAND'] = $arResult['DISPLAY_PROPERTIES']['BRAND'];
// result
unset($arResult['DISPLAY_PROPERTIES']['BRAND']);
if (is_object($component))
	{
		// добавим в arResult компонента поля
		$component->arResult['PROPERTIES'] = $arResult['PROPERTIES'];
		$component->SetResultCacheKeys(array('PROPERTIES'));
	}
$APPLICATION->SetPageProperty('nametobrand', $arResult['PROPERTIES']["NANETOBRAND"]["VALUE"]);

