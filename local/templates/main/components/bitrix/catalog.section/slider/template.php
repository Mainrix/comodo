<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use \Bitrix\Main\Localization\Loc;
use \Site\Main\Helper;
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |    Attention!
 * |    The following comments are for system use
 * |    and are required for the component to work correctly in ajax mode:
 * |    <!-- items-container -->
 * |    <!-- pagination-container -->
 * |    <!-- component-end -->
 */
$this->setFrameMode(true);
$generalParams = array(
	'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
	'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
	'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
	'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
	'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
	'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
	'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
	'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
	'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
	'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
	'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
	'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
	'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
	'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
	'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
	'COMPARE_PATH' => $arParams['COMPARE_PATH'],
	'COMPARE_NAME' => $arParams['COMPARE_NAME'],
	'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
	'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],

	'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
	'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
	'~BASKET_URL' => $arParams['~BASKET_URL'],
	'~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
	'~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
	'~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
	'~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
	'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
	'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
	'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
	'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
	'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
	'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
	'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
	'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
);
?>
<?php $this->SetViewTarget('detailSliderSimilar'); ?>
<?php if(!empty($arResult['ITEMS'])): ?>
<section class="section section-recommended">
    <div class="container">
        <div class="section-heading --offset-big">
            <h2 class="section-heading__title">
                <?=$arParams['PAGE_TITLE']?>
            </h2>
            <div class="section-heading__sub">
				<?= $arResult["NAV_RESULT"]->NavRecordCount; ?> <?= Helper::numbersWithWords( $arResult["NAV_RESULT"]->NavRecordCount,'product')?>
            </div>
        </div>


        <div class="slider _overflow-off js-slider" data-slider-layout="4">
            <div class="slider-nav js-slider-nav">
                <div class="js-slider-prev slick-prev">
                    <button
                            type="button"
                            aria-label="button"
                            class="btn _icon _round _flat"
                    >
                        <svg class="icon-svg icon-svg_chevron-left btn__icon">
                            <use xlink:href="/assets/images/sprite.svg#chevron-left"></use>
                        </svg>
                    </button>


                </div>
                <div class="js-slider-next slick-next">
                    <button
                            type="button"
                            aria-label="button"
                            class="btn _icon _round _flat"
                    >
                        <svg class="icon-svg icon-svg_chevron-right btn__icon">
                            <use xlink:href="/assets/images/sprite.svg#chevron-right"></use>
                        </svg>
                    </button>


                </div>
            </div>
            <div class="js-slider-container slider-wrapper">
				<?
				foreach ($arResult['ITEMS'] as $item)
					{
						$uniqueId = $item['ID'] . '_' . md5($this->randString() . $component->getAction());
						$areaIds[$item['ID']] = $this->GetEditAreaId($uniqueId);
						$APPLICATION->IncludeComponent('bitrix:catalog.item', 'catalog', array(
								'RESULT' => array(
									'ITEM' => $item,
									'AREA_ID' => $areaIds[$item['ID']],
									'TYPE' => "LINE",
									'BIG_LABEL' => 'N',
									'BIG_DISCOUNT_PERCENT' => 'N',
									'BIG_BUTTONS' => 'N',
									'SCALABLE' => 'N'
								),
								'PARAMS' => $generalParams + array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
							), $component, array('HIDE_ICONS' => 'Y'));
					} ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php $this->EndViewTarget(); ?>