<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
$APPLICATION->AddChainItem('Каталог','/catalog/');
$APPLICATION->SetPageProperty("classContanier", "section-product");

?>

<?php $APPLICATION->IncludeComponent(
	"bitrix:catalog.element", 
	"detail", 
	array(
		"COMPONENT_TEMPLATE" => "detail",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "1",
		"ELEMENT_ID" => "",
		"ELEMENT_CODE" => $_REQUEST["CODE"],
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SHOW_DEACTIVATED" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"OFFERS_LIMIT" => "0",
		"BACKGROUND_IMAGE" => "-",
		"TEMPLATE_THEME" => "blue",
		"PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"MAIN_BLOCK_PROPERTY_CODE" => array(
		),
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => array(
		),
		"DISPLAY_NAME" => "Y",
		"IMAGE_RESOLUTION" => "16by9",
		"SHOW_SLIDER" => "N",
		"DETAIL_PICTURE_MODE" => array(
			0 => "POPUP",
			1 => "MAGNIFIER",
		),
		"ADD_DETAIL_TO_SLIDER" => "N",
		"DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"USE_VOTE_RATING" => "N",
		"USE_COMMENTS" => "N",
		"BRAND_USE" => "N",
		"MESS_PRICE_RANGES_TITLE" => "Цены",
		"MESS_DESCRIPTION_TAB" => "Описание",
		"MESS_PROPERTIES_TAB" => "Характеристики",
		"MESS_COMMENTS_TAB" => "Комментарии",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"CHECK_SECTION_ID_VARIABLE" => "N",
		"SEF_MODE" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "Y",
		"SET_CANONICAL_URL" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"BROWSER_TITLE" => "-",
		"SET_META_KEYWORDS" => "Y",
		"META_KEYWORDS" => "-",
		"SET_META_DESCRIPTION" => "Y",
		"META_DESCRIPTION" => "-",
		"SET_LAST_MODIFIED" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"SHOW_SKU_DESCRIPTION" => "N",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"DISPLAY_COMPARE" => "N",
		"PRICE_CODE" => array(
			0 => "base",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"CONVERT_CURRENCY" => "N",
		"USE_RATIO_IN_RANGES" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"USE_PRODUCT_QUANTITY" => "N",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"ADD_TO_BASKET_ACTION" => array(
			0 => "BUY",
		),
		"ADD_TO_BASKET_ACTION_PRIMARY" => array(
			0 => "BUY",
		),
		"LINK_IBLOCK_TYPE" => "content",
		"LINK_IBLOCK_ID" => "3",
		"LINK_PROPERTY_SID" => "BRAND",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"SET_STATUS_404" => "Y",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"COMPATIBLE_MODE" => "Y",
		"USE_ELEMENT_COUNTER" => "Y",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"SET_VIEWED_IN_COMPONENT" => "N",
		"FILE_404" => ""
	),
	false
);?>

<?php
global $arParamDetail;
$arrFilter = ["!ID"=>$arParamDetail["ID"]];
if($arParamDetail['BRAND'])
	$arrFilter['PROPERTY_BRAND']=$arParamDetail['BRAND'];
?>

<? $APPLICATION->IncludeComponent("bitrix:catalog.section", "slider", Array(
	"COMPONENT_TEMPLATE" => ".default",
	"IBLOCK_TYPE" => "content",
	// Тип инфоблока
	"IBLOCK_ID" => "1",
	// Инфоблок
	"SECTION_ID" => $arParamDetail["SECTION_ID"],
	// ID раздела
	"SECTION_CODE" => "",
	// Код раздела
	"SECTION_USER_FIELDS" => array(    // Свойства раздела
									   0 => "",
									   1 => "",
	),
	"FILTER_NAME" => "arrFilter",
	// Имя массива со значениями фильтра для фильтрации элементов
	"INCLUDE_SUBSECTIONS" => "Y",
	// Показывать элементы подразделов раздела
	"SHOW_ALL_WO_SECTION" => "N",
	// Показывать все элементы, если не указан раздел
	"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
	// Фильтр товаров
	"HIDE_NOT_AVAILABLE" => "N",
	// Недоступные товары
	"HIDE_NOT_AVAILABLE_OFFERS" => "N",
	// Недоступные торговые предложения
	"ELEMENT_SORT_FIELD" => $arItemsSort['sort'],
	// По какому полю сортируем элементы
	"ELEMENT_SORT_ORDER" =>  $arItemsSort['order'],
	// Порядок сортировки элементов
	"ELEMENT_SORT_FIELD2" => "id",
	// Поле для второй сортировки элементов
	"ELEMENT_SORT_ORDER2" => "desc",
	// Порядок второй сортировки элементов
	"PAGE_ELEMENT_COUNT" => "18",
	// Количество элементов на странице
	"LINE_ELEMENT_COUNT" => "3",
	// Количество элементов выводимых в одной строке таблицы
	"OFFERS_LIMIT" => "5",
	// Максимальное количество предложений для показа (0 - все)
	"BACKGROUND_IMAGE" => "-",
	// Установить фоновую картинку для шаблона из свойства
	"TEMPLATE_THEME" => "blue",
	// Цветовая тема
	"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
	// Вариант отображения товаров
	"ENLARGE_PRODUCT" => "STRICT",
	// Выделять товары в списке
	"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
	// Порядок отображения блоков товара
	"SHOW_SLIDER" => "Y",
	// Показывать слайдер для товаров
	"SLIDER_INTERVAL" => "3000",
	// Интервал смены слайдов, мс
	"SLIDER_PROGRESS" => "N",
	// Показывать полосу прогресса
	"ADD_PICT_PROP" => "-",
	// Дополнительная картинка основного товара
	"LABEL_PROP" => "",
	// Свойства меток товара
	"PRODUCT_SUBSCRIPTION" => "Y",
	// Разрешить оповещения для отсутствующих товаров
	"SHOW_DISCOUNT_PERCENT" => "N",
	// Показывать процент скидки
	"SHOW_OLD_PRICE" => "N",
	// Показывать старую цену
	"SHOW_MAX_QUANTITY" => "N",
	// Показывать остаток товара
	"SHOW_CLOSE_POPUP" => "N",
	// Показывать кнопку продолжения покупок во всплывающих окнах
	"MESS_BTN_BUY" => "Купить",
	// Текст кнопки "Купить"
	"MESS_BTN_ADD_TO_BASKET" => "В корзину",
	// Текст кнопки "Добавить в корзину"
	"MESS_BTN_SUBSCRIBE" => "Подписаться",
	// Текст кнопки "Уведомить о поступлении"
	"MESS_BTN_DETAIL" => "Подробнее",
	// Текст кнопки "Подробнее"
	"MESS_NOT_AVAILABLE" => "Нет в наличии",
	// Сообщение об отсутствии товара
	"RCM_TYPE" => "personal",
	// Тип рекомендации
	"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
	// Параметр ID продукта (для товарных рекомендаций)
	"SHOW_FROM_SECTION" => "N",
	// Показывать товары из раздела
	"SECTION_URL" => "",
	// URL, ведущий на страницу с содержимым раздела
	"DETAIL_URL" => "",
	// URL, ведущий на страницу с содержимым элемента раздела
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	// Название переменной, в которой передается код группы
	"SEF_MODE" => "N",
	// Включить поддержку ЧПУ
	"AJAX_MODE" => "N",
	// Включить режим AJAX
	"AJAX_OPTION_JUMP" => "N",
	// Включить прокрутку к началу компонента
	"AJAX_OPTION_STYLE" => "Y",
	// Включить подгрузку стилей
	"AJAX_OPTION_HISTORY" => "N",
	// Включить эмуляцию навигации браузера
	"AJAX_OPTION_ADDITIONAL" => "",
	// Дополнительный идентификатор
	"CACHE_TYPE" => "A",
	// Тип кеширования
	"CACHE_TIME" => "36000000",
	// Время кеширования (сек.)
	"CACHE_GROUPS" => "Y",
	// Учитывать права доступа
	"SET_TITLE" => "N",
	// Устанавливать заголовок страницы
	"SET_BROWSER_TITLE" => "N",
	// Устанавливать заголовок окна браузера
	"BROWSER_TITLE" => "-",
	// Установить заголовок окна браузера из свойства
	"SET_META_KEYWORDS" => "N",
	// Устанавливать ключевые слова страницы
	"META_KEYWORDS" => "-",
	// Установить ключевые слова страницы из свойства
	"SET_META_DESCRIPTION" => "N",
	// Устанавливать описание страницы
	"META_DESCRIPTION" => "-",
	// Установить описание страницы из свойства
	"SET_LAST_MODIFIED" => "N",
	// Устанавливать в заголовках ответа время модификации страницы
	"USE_MAIN_ELEMENT_SECTION" => "N",
	// Использовать основной раздел для показа элемента
	"ADD_SECTIONS_CHAIN" => "N",
	// Включать раздел в цепочку навигации
	"CACHE_FILTER" => "N",
	// Кешировать при установленном фильтре
	"ACTION_VARIABLE" => "action",
	// Название переменной, в которой передается действие
	"PRODUCT_ID_VARIABLE" => "id",
	// Название переменной, в которой передается код товара для покупки
	"PRICE_CODE" => array(    // Тип цены
							  0 => "base",
	),
	"USE_PRICE_COUNT" => "N",
	// Использовать вывод цен с диапазонами
	"SHOW_PRICE_COUNT" => "1",
	// Выводить цены для количества
	"PRICE_VAT_INCLUDE" => "Y",
	// Включать НДС в цену
	"CONVERT_CURRENCY" => "N",
	// Показывать цены в одной валюте
	"BASKET_URL" => "/personal/basket.php",
	// URL, ведущий на страницу с корзиной покупателя
	"USE_PRODUCT_QUANTITY" => "N",
	// Разрешить указание количества товара
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	// Название переменной, в которой передается количество товара
	"ADD_PROPERTIES_TO_BASKET" => "Y",
	// Добавлять в корзину свойства товаров и предложений
	"PRODUCT_PROPS_VARIABLE" => "prop",
	// Название переменной, в которой передаются характеристики товара
	"PARTIAL_PRODUCT_PROPERTIES" => "N",
	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
	"ADD_TO_BASKET_ACTION" => "ADD",
	// Показывать кнопку добавления в корзину или покупки
	"DISPLAY_COMPARE" => "N",
	// Разрешить сравнение товаров
	"USE_ENHANCED_ECOMMERCE" => "N",
	// Отправлять данные электронной торговли в Google и Яндекс
	"PAGER_TEMPLATE" => ".default",
	// Шаблон постраничной навигации
	"DISPLAY_TOP_PAGER" => "N",
	// Выводить над списком
	"DISPLAY_BOTTOM_PAGER" => "Y",
	// Выводить под списком
	"PAGER_TITLE" => "Товары",
	// Название категорий
	"PAGER_SHOW_ALWAYS" => "N",
	// Выводить всегда
	"PAGER_DESC_NUMBERING" => "N",
	// Использовать обратную навигацию
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	// Время кеширования страниц для обратной навигации
	"PAGER_SHOW_ALL" => "N",
	// Показывать ссылку "Все"
	"PAGER_BASE_LINK_ENABLE" => "N",
	// Включить обработку ссылок
	"LAZY_LOAD" => "N",
	// Показать кнопку ленивой загрузки Lazy Load
	"MESS_BTN_LAZY_LOAD" => "Показать ещё",
	// Текст кнопки "Показать ещё"
	"LOAD_ON_SCROLL" => "N",
	// Подгружать товары при прокрутке до конца
	"SET_STATUS_404" => "N",
	// Устанавливать статус 404
	"SHOW_404" => "N",
	// Показ специальной страницы
	"MESSAGE_404" => "",
	// Сообщение для показа (по умолчанию из компонента)
	"COMPATIBLE_MODE" => "Y",
	// Включить режим совместимости
	"DISABLE_INIT_JS_IN_COMPONENT" => "N",
	"PAGE_TITLE"=>"Похожие товары",
	// Не подключать js-библиотеки в компоненте
), false); ?>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>