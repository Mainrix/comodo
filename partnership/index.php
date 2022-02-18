<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("classContanierSub", "-inner");
$APPLICATION->SetTitle("Сотрудничество");
?>

    <div class="card card-partnership card-lazy">
        <div class="card-partnership__img block-placeholder">
	        <?$APPLICATION->IncludeComponent(
		        "bitrix:main.include",
		        ".default",
		        array(
			        "COMPONENT_TEMPLATE" => ".default",
			        "AREA_FILE_SHOW" => "file",
			        "PATH" => "/local/templates/main/inc/image1Partner.php",
			        "EDIT_TEMPLATE" => ""
		        ),
		        false
	        );?>
        </div>
        <div class="card-partnership__inner">
	        <?$APPLICATION->IncludeComponent(
		        "bitrix:main.include",
		        ".default",
		        array(
			        "COMPONENT_TEMPLATE" => ".default",
			        "AREA_FILE_SHOW" => "file",
			        "PATH" => "/local/templates/main/inc/adres1Partner.php",
			        "EDIT_TEMPLATE" => ""
		        ),
		        false
	        );?>

        </div>
    </div>
    <div class="card card-partnership card-lazy">
        <div class="card-partnership__img block-placeholder">
	        <?$APPLICATION->IncludeComponent(
		        "bitrix:main.include",
		        ".default",
		        array(
			        "COMPONENT_TEMPLATE" => ".default",
			        "AREA_FILE_SHOW" => "file",
			        "PATH" => "/local/templates/main/inc/image2Partner.php",
			        "EDIT_TEMPLATE" => ""
		        ),
		        false
	        );?>
        </div>
        <div class="card-partnership__inner">
	        <?$APPLICATION->IncludeComponent(
		        "bitrix:main.include",
		        ".default",
		        array(
			        "COMPONENT_TEMPLATE" => ".default",
			        "AREA_FILE_SHOW" => "file",
			        "PATH" => "/local/templates/main/inc/adres2Partner.php",
			        "EDIT_TEMPLATE" => ""
		        ),
		        false
	        );?>

        </div>
    </div>
    <section class="section _offset-small">
        <div class="container-inner">
	        <?$APPLICATION->IncludeComponent(
		        "bitrix:main.include",
		        ".default",
		        array(
			        "COMPONENT_TEMPLATE" => ".default",
			        "AREA_FILE_SHOW" => "file",
			        "PATH" => "/local/templates/main/inc/textPartner.php",
			        "EDIT_TEMPLATE" => ""
		        ),
		        false
	        );?>
        </div>
        <div class="container-inner --md-small">
            <div class="list-partnership row">
	            <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"partner", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "LINK",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "partner"
	),
	false
);?>



            </div>
        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>