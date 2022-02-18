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
$APPLICATION->SetPageProperty("classContanier","section-search");
?>

<div class="section-search__inner row">
	<div class="col">
		<div class="section-search__sidebar">

			<? $APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "filter", Array(
				"COMPONENT_TEMPLATE" => ".default",
				"IBLOCK_TYPE" => "content",
				// Тип инфоблока
				"IBLOCK_ID" => "1",
				// Инфоблок
				"SECTION_ID" => $arResult['SECTION']['ID'],
				// ID раздела инфоблока
				"SECTION_CODE" => "",
				// Код раздела
				"PREFILTER_NAME" => "smartPreFilter",
				// Имя входящего массива для дополнительной фильтрации элементов
				"FILTER_NAME" => "arrFilter",
				// Имя выходящего массива для фильтрации
				"HIDE_NOT_AVAILABLE" => "N",
				// Не отображать недоступные товары
				"TEMPLATE_THEME" => "blue",
				// Цветовая тема
				"FILTER_VIEW_MODE" => "vertical",
				// Вид отображения
				"POPUP_POSITION" => "left",
				// Позиция для отображения всплывающего блока с информацией о фильтрации
				"DISPLAY_ELEMENT_COUNT" => "Y",
				// Показывать количество
				"SEF_MODE" => "N",
				// Включить поддержку ЧПУ
				"CACHE_TYPE" => "A",
				// Тип кеширования
				"CACHE_TIME" => "36000000",
				// Время кеширования (сек.)
				"CACHE_GROUPS" => "Y",
				// Учитывать права доступа
				"SAVE_IN_SESSION" => "N",
				// Сохранять установки фильтра в сессии пользователя
				"PAGER_PARAMS_NAME" => "arrPager",
				// Имя массива с переменными для построения ссылок в постраничной навигации
				"PRICE_CODE" => array(    // Тип цены
										  0 => "base",
				),
				"CONVERT_CURRENCY" => "N",
				// Показывать цены в одной валюте
				"XML_EXPORT" => "N",
				// Включить поддержку Яндекс Островов
				"SECTION_TITLE" => "-",
				// Заголовок
				"SECTION_DESCRIPTION" => "-",
				'SORT'=>$_REQUEST['sort']?$_REQUEST['sort']:'name'
				// Описание
			), false); ?>
		</div>
	</div>
	<div class="col _fluid">
		<? global $arItemsSort;
		?>
		<? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"items", 
	array(
		"COMPONENT_TEMPLATE" => "items",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "1",
		"SECTION_ID" => $arResult["SECTION"]["ID"],
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrFilter",
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "N",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"ELEMENT_SORT_FIELD" => $arItemsSort["sort"],
		"ELEMENT_SORT_ORDER" => $arItemsSort["order"],
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"PAGE_ELEMENT_COUNT" => "18",
		"LINE_ELEMENT_COUNT" => "3",
		"OFFERS_LIMIT" => "5",
		"BACKGROUND_IMAGE" => "-",
		"TEMPLATE_THEME" => "blue",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"ENLARGE_PRODUCT" => "STRICT",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => array(
		),
		"PRODUCT_SUBSCRIPTION" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"RCM_TYPE" => "personal",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"SHOW_FROM_SECTION" => "N",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SEF_MODE" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"BROWSER_TITLE" => "-",
		"SET_META_KEYWORDS" => "Y",
		"META_KEYWORDS" => "-",
		"SET_META_DESCRIPTION" => "Y",
		"META_DESCRIPTION" => "-",
		"SET_LAST_MODIFIED" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRICE_CODE" => array(
			0 => "base",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"USE_PRODUCT_QUANTITY" => "N",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"DISPLAY_COMPARE" => "N",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"LAZY_LOAD" => "N",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"LOAD_ON_SCROLL" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"COMPATIBLE_MODE" => "Y",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"PROPERTY_CODE_MOBILE" => array(
		)
	),
	false
); ?>
		<? $APPLICATION->ShowViewContent("seoTextBoottomSection"); ?>

	</div>
</div>
