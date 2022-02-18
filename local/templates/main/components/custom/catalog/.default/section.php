<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	{
		die();
	}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
/** @var Bitrix\Main\UI\PageNavigation $tesgt */
$this->setFrameMode(true);
$APPLICATION->SetPageProperty("classContanier", "pb-0");

?>
<?php $APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"menu", 
	array(
		"COMPONENT_TEMPLATE" => "menu",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "1",
		"SECTION_ID" => $arResult["SECTION"]["ID"],
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"TOP_DEPTH" => ($arResult["SECTION"]["ID"])?"2":"1",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "UF_TEXT_PARAMS",
			1 => "UF_TYPE",
			2 => "",
		),
		"FILTER_NAME" => "sectionsFilter",
		"VIEW_MODE" => "LINE",
		"SHOW_PARENT_NAME" => "Y",
		"SECTION_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"CACHE_FILTER" => "N",
		"ADD_SECTIONS_CHAIN" => "Y"
	),
	false
); ?>
