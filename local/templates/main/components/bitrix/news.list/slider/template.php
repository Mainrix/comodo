<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Site\Main\Helper;

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
$this->setFrameMode(true);
?>
<?php if(!empty($arResult["ITEMS"])): ?>
<div class="js-slider-container slider-wrapper section-hero__slider" data-slides-touch="true">

	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		$src = Helper::resizeImageSrc($arItem['PREVIEW_PICTURE'],976,426);
		$srcBig = Helper::resizeImageSrc($arItem['PREVIEW_PICTURE'],2000,1000)

		?>
        <div class="section-hero__slide">
            <div class="card-hero-slider card-lazy">
                <div class="card-hero-slider__img block-placeholder">
                    <img src="null" class="img-placeholder" data-src="<?=$src?>"
                         data-srcset="<?=$srcBig?>" alt="<?=$arItem['NAME']?>">
                </div>
                <div class="card-hero-slider__inner">
                    <h2 class="card-hero-slider__title h-1"><?=$arItem['NAME']?></h2>
                    <? if($arItem['PREVIEW_TEXT']): ?>
                    <div class="card-hero-slider__descr">
                        <?=$arItem['PREVIEW_TEXT']?>
                    </div>
                    <? endif; ?>
                    <? if($arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']): ?>
                    <a aria-label="link" class="card-hero-slider__action" href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>">
                        <button type="button" aria-label="button" class="btn _icon _round _flat">
                            <svg class="icon-svg icon-svg_chevron-right btn__icon">
                                <use xlink:href="/assets/images/sprite.svg#chevron-right"></use>
                            </svg>
                        </button>
                    </a>
                    <? endif; ?>
                </div>
            </div>
        </div>
	<?endforeach;?>
</div>
<?php endif; ?>
