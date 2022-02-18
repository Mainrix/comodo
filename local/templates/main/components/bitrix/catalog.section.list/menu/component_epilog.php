<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $templateData
 * @var string $templateFolder
 * @var CatalogSectionComponent $component
 */

global $APPLICATION;
 if($arResult['SECTION']["ID"])
	{
		if (isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != "")
			$APPLICATION->SetTitle($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]);
		else
			$APPLICATION->SetTitle($arResult['SECTION']['NAME']);

		if ($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_META_TITLE"] !== '')
			{
				$APPLICATION->SetPageProperty("title", $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_META_TITLE"]);
			}
		if ($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_META_KEYWORDS"] !== '')
			{
				$APPLICATION->SetPageProperty("keywords", $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_META_KEYWORDS"]);
			}

		if ($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_META_DESCRIPTION"] !== '')
			{
				$APPLICATION->SetPageProperty("description", $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_META_DESCRIPTION"]);
			}
	}
